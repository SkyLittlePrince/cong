<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatmsgsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chatmsgs', function(Blueprint $table)
		{
			$table->timestamps();
			$table->increments('id');
			$table->integer('sender')->unsigned()->index('sender');
			$table->integer('receiver')->unsigned()->index('receiver');
			$table->text("content");
			$table->integer("status")->default(0);  // 消息状态，0为未读，1为已读

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
		Schema::drop('chatmsgs');
	}

}
