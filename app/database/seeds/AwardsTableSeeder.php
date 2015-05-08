<?php

class AwardsTableSeeder extends Seeder {

	public function run()
	{
		Award::create([
			"user_id" => 1,
			"time" => "2015-01-01",
			"description" => "Award_aaaaaaaaaaa"
		]);

		Award::create([
			"user_id" => 1,
			"time" => "2015-02-02",
			"description" => "Award_bbbbbbbbbbb"
		]);

		Award::create([
			"user_id" => 1,
			"time" => "2015-03-03",
			"description" => "Award_ccccccccccc"
		]);
	}
}