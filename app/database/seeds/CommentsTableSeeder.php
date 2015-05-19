<?php

use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Comment::create([
				'user_id' => 2,
				'content' => '好评!!!!!!!',
				'product_id' => 1
			]);
		}
	}

}