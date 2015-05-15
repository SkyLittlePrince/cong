<?php

class DescriptionTableSeeder extends Seeder {

	public function run()
	{
		Description::create([
			"user_id" => 1,
			"content" => "我简直是叼啊"
		]);
	}
}