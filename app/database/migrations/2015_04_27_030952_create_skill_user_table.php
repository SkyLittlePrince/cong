<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skill_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('skill_id')->unsigned()->index('skill_id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->timestamps();

			$table                          
		                ->foreign('user_id')
		                ->references('id')->on('users') 
		                ->onDelete('cascade')
		                ->onUpdate('cascade');

		                $table                          
		                ->foreign('skill_id')
		                ->references('id')->on('skills') 
		                ->onDelete('cascade')
		                ->onUpdate('cascade');

		                $table->unique(array('user_id','skill_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('skill_user');
	}

}
