<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('product_id')->unsigned()->index('product_id');
			$table->longText('content');
			$table->integer('score')->default(5);
			$table->integer('user_id')->unsigned()->index('user_id');

			$table
				->foreign('product_id')
				->references('id')->on('products') 
				->onDelete('cascade')
				->onUpdate('cascade');

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
		Schema::drop('evaluations');
	}

}
