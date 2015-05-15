<?php

class SellerAuthenticationTableSeeder extends Seeder {

  	public function run()
  	{
		Authentication::create([
			"user_id"  => 1,
			"name" => "无名氏",
			"credit_id" => "460035199004280312",
			"gender" => 1,
			"credit_front" => "aaa.jpg",
			"credit_behind" => "bbb.jpg",
			"address" => "广州市番禺区大学城外环西路100号广州国家集成电路基地",
			"phone" => "15902084760"
		]);

		Authentication::create([
			"user_id" => 2,
			"name" => "脑残无名氏",
			"credit_id" => "460035198805160576",
			"gender" => 1,
			"credit_front" => "111.jpg",
			"credit_behind" => "222.jpg",
			"address" => "广州市番禺区大学城外环西路100号广州国家集成电路基地",
			"phone" => "15902084650"
		]);
  	}
}
