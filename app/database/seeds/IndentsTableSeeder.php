<?php

class IndentsTableSeeder extends Seeder {

	public function run()
	{
		foreach(range(1, 10) as $index)
		{
			Indent::create([
				"user_id" => 1,
				"status" =>  $index % 3
			]);
		}
	}
}