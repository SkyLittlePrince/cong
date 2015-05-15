<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned()->index('user_id');
			// $table->integer('task_id')->unsigned()->index('task_id');
			$table->integer('product_id')->unsigned()->index('product_id');
			$table->integer("status")->default(0);

		   	$table                          
				->foreign('product_id')
				->references('id')->on('products') ;

			$table                          
				->foreign('user_id')
				->references('id')->on('users') 
				->onDelete('cascade')
				->onUpdate('cascade');
	   	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('indents');
	}

}
