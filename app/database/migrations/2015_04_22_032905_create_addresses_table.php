<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('username');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->string('province');
			$table->string('city');
			$table->string('region');
			$table->string('postcode');
			$table->string('mobile');
			$table->string('address');
			$table->boolean('is_default')->default(0);

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
		Schema::drop('addresses');
	}

}
