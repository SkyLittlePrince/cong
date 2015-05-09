<?php

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		Product::create([
			"name" => "商品名称一",
			"price" => 15.04,
			"shop_id" => 1,
			"sellNum" => 5,
			"favorNum" => 1,
			"intro" => "商品一介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);

		Product::create([
			"name" => "商品名称二",
			"price" => 18.04,
			"shop_id" => 1,
			"sellNum" => 3,
			"favorNum" => 2,
			"intro" => "商品二介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);

		Product::create([
			"name" => "商品名称三",
			"price" => 20.04,
			"shop_id" => 1,
			"sellNum" => 2,
			"favorNum" => 6,
			"intro" => "商品三介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);
	}
}