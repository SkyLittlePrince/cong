<?php

class WorkExperiencesTableSeeder extends Seeder {

	public function run()
	{
		WorkExperience::create([
			"user_id" => 1,
			"start_time" => "2015-01-01",
			"end_time" => "2015-01-02",
			"description" => "work_11111111"
		]);

		WorkExperience::create([
			"user_id" => 1,
			"start_time" => "2015-02-02",
			"end_time" => "2015-02-03",
			"description" => "work_22222222"
		]);

		WorkExperience::create([
			"user_id" => 1,
			"start_time" => "2015-03-03",
			"end_time" => "2015-03-04",
			"description" => "work_33333333"
		]);
	}
}