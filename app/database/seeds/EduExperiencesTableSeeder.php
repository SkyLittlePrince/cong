<?php

class EduExperiencesTableSeeder extends Seeder {

	public function run()
	{
		EduExperience::create([
			"user_id" => 1,
			"start_time" => "2015-01-01",
			"end_time" => "2015-01-02",
			"description" => "aaaaaaaaaaa"
		]);

		EduExperience::create([
			"user_id" => 1,
			"start_time" => "2015-02-02",
			"end_time" => "2015-02-03",
			"description" => "bbbbbbbbbbb"
		]);

		EduExperience::create([
			"user_id" => 1,
			"start_time" => "2015-03-03",
			"end_time" => "2015-03-04",
			"description" => "ccccccccccc"
		]);
	}
}