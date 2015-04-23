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
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->boolean('isAuction');
			$table->integer('auctionPrice');
			$table->string('auctionDeadline');
			$table->integer('personNum');
			$table->text('personNum');
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
