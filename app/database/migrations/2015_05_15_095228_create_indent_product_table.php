<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndentProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indent_product', function(Blueprint $table)
		{
			$table->integer('indent_id')->unsigned()->index('indent_id');
                          		$table->integer('product_id')->unsigned()->index('product_id');

                          		$table                          
		                          ->foreign('indent_id')
		                          ->references('id')->on('indents') 
		                          ->onDelete('cascade')
		                          ->onUpdate('cascade');

	                          $table                          
		                          ->foreign('product_id')
		                          ->references('id')->on('products') 
		                          ->onDelete('cascade')
		                          ->onUpdate('cascade');

	                          $table->primary(array('indent_id', 'product_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('indent_product');
	}

}
