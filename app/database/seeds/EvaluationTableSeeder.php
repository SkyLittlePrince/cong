<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EvaluationTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Evaluation::create([
				'product_id' => 1,
				'user_id' => 2,
				'content' => '好评!!!!',
				'score' => $index % 5 + 1
			]);
		}
	}

}