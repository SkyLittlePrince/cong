<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class IndentProductTableSeeder extends Seeder {

	public function run()
	{
		UserSkill::create([
			"indent_id" => 1,
			"product_id" => 1
		]);

		UserSkill::create([
			"indent_id" => 2,
			"product_id" => 2
		]);
	}

}