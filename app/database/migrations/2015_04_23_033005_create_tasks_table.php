<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->integer('price');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->boolean('isAuction');
			$table->integer('auctionPrice')->nullable();
			$table->string('auctionDeadline')->nullable();
			$table->integer('personNum');
			$table->text('description');
			$table->text('files');

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
		Schema::drop('tasks');
	}

}
