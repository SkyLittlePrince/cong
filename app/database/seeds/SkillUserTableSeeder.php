<?php

class SkillUserTableSeeder extends Seeder {

	public function run()
	{
		SkillUser::create([
			"user_id" =>"1"
			"skill_id" => "1"
		]);

		SkillUser::create([
			"user_id" =>"2"
			"skill_id" => "1"
		]);
	}
}