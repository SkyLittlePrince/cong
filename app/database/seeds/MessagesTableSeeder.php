<?php

class MessagesTableSeeder extends Seeder {

	public function run()
	{
		Message::create([
			"title" => "题目1",
			"content" => "内容1",
			"sender" => 2,
			"receiver" => 1,
			"type" => 1
		]);

		Message::create([
			"title" => "题目2",
			"content" => "内容2",
			"sender" => 2,
			"receiver" => 1,
			"type" => 1
		]);

		Message::create([
			"title" => "题目3",
			"content" => "内容3",
			"sender" => 2,
			"receiver" => 1,
			"type" => 2
		]);
	}
}