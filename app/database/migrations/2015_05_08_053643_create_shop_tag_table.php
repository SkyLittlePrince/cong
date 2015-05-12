<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_tag', function(Blueprint $table)
		{
			$table->integer('shop_id')->unsigned()->index('shop_id');
			$table->integer('tag_id')->unsigned()->index('tag_id');

			$table
				->foreign('shop_id')
				->references('id')->on('shops') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table
				->foreign('tag_id')
				->references('id')->on('tags') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->primary(array('shop_id','tag_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shop_tag');
	}

}
