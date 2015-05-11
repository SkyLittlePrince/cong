<?php

class FriendsTableSeeder extends Seeder {

  	public function run()
  	{
		Friend::create([
			'user_id' => 1,
			'friend_id' => 2
		]);

		Friend::create([
			'user_id' => 2,
			'friend_id' => 3,
		]);
  	}
}
