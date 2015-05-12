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
		Schema::create('messageConfigs', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->boolean("acceptance")->default(0);
			$table->boolean("finishConfirmed")->default(0);
			$table->boolean("addPriceOrDelay")->default(0);
			$table->boolean("publishSuccess")->default(0);
			$table->boolean("publishFail")->default(0);
			$table->boolean("nearDeadline")->default(0);
			$table->timestamps();

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
		Schema::drop('messageConfigs');
	}

}
