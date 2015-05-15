<?php

class UserSkillsTableSeeder extends Seeder {

	public function run()
	{
		UserSkill::create([
			"user_id" => 1,
			"skill_id" => 1
		]);

		UserSkill::create([
			"user_id" => 1,
			"skill_id" => 2
		]);

		UserSkill::create([
			"user_id" => 1,
			"skill_id" => 3
		]);
	}
}