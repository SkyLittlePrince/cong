<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shops', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->string('name');
			$table->string('description');
			$table->string('avatar');
			$table->integer("dealNum")->default(0);  // 店铺交易量
			$table->integer("visitNum")->default(0); // 店铺访问量
			$table->integer("credit")->default(1);   // 店铺信用度 
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
		Schema::drop('shops');
	}

}
