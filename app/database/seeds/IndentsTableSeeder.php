<?php

class IndentsTableSeeder extends Seeder {

	public function run()
	{
		Indent::create([
			"user_id" => 1
		]);

		Indent::create([
			"user_id" => 1
		]);
	}
}