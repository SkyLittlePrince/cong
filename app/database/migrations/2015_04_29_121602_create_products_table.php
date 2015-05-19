<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->double('price');
			$table->integer('sellNum')->default(0);
			$table->integer('favorNum')->default(0);
			$table->integer('visiteNum')->default(0);
			$table->integer('shop_id')->unsigned()->index('shop_id');
			$table->longText('intro');
			$table->string('avatar');

			$table
				->foreign('shop_id')
				->references('id')->on('shops') 
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
		Schema::drop('products');
	}
}
