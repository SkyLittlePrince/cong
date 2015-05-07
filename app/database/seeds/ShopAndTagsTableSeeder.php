<?php

class ShopAndTagsTableSeeder extends Seeder {

	public function run()
	{
		ShopAndTag::create([
			"shop_id" => 1,
			"tag_id" => 1
		]);

		ShopAndTag::create([
			"shop_id" => 1,
			"tag_id" => 2
		]);

		ShopAndTag::create([
			"shop_id" => 1,
			"tag_id" => 3
		]);
	}
}