<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->timestamps();
			$table->increments('id');
			$table->integer('sender')->unsigned()->index('sender');
			$table->integer('receiver')->unsigned()->index('receiver');
			$table->string("title");
			$table->text("content");
			$table->integer("type")->default(0);
			$table->integer("status")->default(0);

			$table
				->foreign('sender')
				->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                        
				->foreign('receiver')
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
		Schema::drop('messages');
	}

}
