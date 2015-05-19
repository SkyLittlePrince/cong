<?php

class FriendsTableSeeder extends Seeder {

  	public function run()
  	{
		Friend::create([
			'user_id' => 1,
			'friend_id' => 2
		]);

		Friend::create([
			'user_id' => 1,
			'friend_id' => 3
		]);

		Friend::create([
			'user_id' => 1,
			'friend_id' => 4
		]);

		Friend::create([
			'user_id' => 1,
			'friend_id' => 5
		]);

		Friend::create([
			'user_id' => 1,
			'friend_id' => 6
		]);

		Friend::create([
			'user_id' => 1,
			'friend_id' => 7
		]);

		Friend::create([
			'user_id' => 2,
			'friend_id' => 1
		]);

		Friend::create([
			'user_id' => 2,
			'friend_id' => 3,
		]);
  	}
}
