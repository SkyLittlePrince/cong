<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerAuthenticationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seller_authentications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id')->unsigned()->unique()->index('user_id');
			$table->integer("gender")->default(1);  
			$table->string("phone", 20); 
			$table->string("credit_id", 30);    
			$table->string("credit_front");     
			$table->string("credit_behind");    
			$table->string("address");
			$table->integer("status")->default(0);	// 0为待审核，1为审核通过，－1为审核不通过
			$table->string("fail_reason")->nullable();	// 审核不通过原因

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
		Schema::drop('seller_authentications');
	}

}
