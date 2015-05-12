<?php

class SkillsTableSeeder extends Seeder {

	public function run()
	{
		Skill::create([
			"name" => "日语家教"
		]);

		Skill::create([
			"name" => "平面设计"
		]);

		Skill::create([
			"name" => "动画3D"
		]);
	}
}