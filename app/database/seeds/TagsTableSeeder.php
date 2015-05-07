<?php

class TagsTableSeeder extends Seeder {

	public function run()
	{
		Tag::create([
			"name" => "日语家教"
		]);

		Tag::create([
			"name" => "平面设计"
		]);

		Tag::create([
			"name" => "动画3D"
		]);
	}
}