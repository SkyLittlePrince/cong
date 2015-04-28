<?php

class TasksTableSeeder extends Seeder {

	public function run()
	{
		Task::create([
			"title" => "aaa",
			"user_id" => 1,
			"isAuction" => false,
			"personNum" => 1,
			"files" => "1.png,1.png"
		]);

		Task::create([
			"title" => "bbb",
			"user_id" => 1,
			"isAuction" => false,
			"personNum" => 1,
			"files" => "1.png,1.png"
		]);

		Task::create([
			"title" => "ccc",
			"user_id" => 2,
			"isAuction" => false,
			"personNum" => 2,
			"files" => "1.png,1.png"
		]);
	}
}