<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSkillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_skill', function(Blueprint $table)
		{
			$table->integer('skill_id')->unsigned()->index('skill_id');
			$table->integer('user_id')->unsigned()->index('user_id');

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

				$table->primary(array('user_id','skill_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_skill');
	}

}
