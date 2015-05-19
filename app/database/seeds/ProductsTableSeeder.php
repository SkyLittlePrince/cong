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
			"avatar" => "http://7sbxao.com1.z0.glb.clouddn.com/login.jpg",
			"intro" => "商品一介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);

		Product::create([
			"name" => "商品名称二",
			"price" => 18.04,
			"shop_id" => 1,
			"sellNum" => 3,
			"favorNum" => 2,
			"avatar" => "http://7sbxao.com1.z0.glb.clouddn.com/login.jpg",
			"intro" => "商品二介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);

		Product::create([
			"name" => "商品名称三",
			"price" => 20.04,
			"shop_id" => 2,
			"sellNum" => 2,
			"favorNum" => 6,
			"avatar" => "http://7sbxao.com1.z0.glb.clouddn.com/login.jpg",
			"intro" => "商品三介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);

		Product::create([
			"name" => "商品名称四",
			"price" => 24.04,
			"shop_id" => 2,
			"sellNum" => 2,
			"favorNum" => 6,
			"avatar" => "http://7sbxao.com1.z0.glb.clouddn.com/login.jpg",
			"intro" => "商品四介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);

		Product::create([
			"name" => "商品名称五",
			"price" => 28.04,
			"shop_id" => 3,
			"sellNum" => 2,
			"favorNum" => 6,
			"avatar" => "http://7sbxao.com1.z0.glb.clouddn.com/login.jpg",
			"intro" => "商品五介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍"
		]);
	}
}