<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAndTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shopAndTags', function(Blueprint $table)
		{
			$table->integer('tag_id')->unsigned()->index('tag_id');
			$table->integer('shop_id')->unsigned()->index('shop_id');
			
			$table
				->foreign('tag_id')
				->references('id')->on('tags') 
				->onDelete('cascade')
				->onUpdate('cascade');

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
		Schema::drop('shopAndTags');
	}
}
