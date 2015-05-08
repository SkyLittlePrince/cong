<?php

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		Product::create([
			"name" => "aaa",
			"price" => 15.04,
			"shop_id" => 1,
			"intro" => "aaaa_1"
		]);

		Product::create([
			"name" => "bbb",
			"price" => 18.04,
			"shop_id" => 1,
			"intro" => "aaaa_2"
		]);

		Product::create([
			"name" => "ccc",
			"price" => 20.04,
			"shop_id" => 1,
			"intro" => "aaaa_3"
		]);
	}
}