<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_configs', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->boolean("acceptance")->default(0);			// 当买家验收完稿时,请通知我
			$table->boolean("finishConfirmed")->default(0);			// 当买家确认完成工作时,请通知我
			$table->boolean("addPriceOrDelay")->default(0);		// 当我参与的需求加价或者延期时,请通知我
			$table->boolean("publishSuccess")->default(0);			// 当我的需求发布成功时,请通知我
			$table->boolean("publishFail")->default(0);			// 当我的需求发布失败时,请通知我
			$table->boolean("nearDeadline")->default(0);			// 当我的需求交稿期即将结束时时,请通知我

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
		Schema::drop('message_configs');
	}

}
