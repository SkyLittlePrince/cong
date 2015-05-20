<?php

class ShopTagsTableSeeder extends Seeder {

	public function run()
	{
		ShopTag::create([
			"shop_id" => 1,
			"tag_id" => 1
		]);

		ShopTag::create([
			"shop_id" => 1,
			"tag_id" => 2
		]);

		ShopTag::create([
			"shop_id" => 1,
			"tag_id" => 3
		]);

		ShopTag::create([
			"shop_id" => 2,
			"tag_id" => 1
		]);

		ShopTag::create([
			"shop_id" => 2,
			"tag_id" => 2
		]);
	}
}