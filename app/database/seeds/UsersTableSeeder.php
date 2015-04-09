<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		User::create(
			array(
				"username" => "yangfusheng",
            	"password" => Hash::make("12345678"),
            	"email" => "1459232621@qq.com",
            	"gender" => "male",
            	"mobile" => "13560474456",
            	"role_id" => 1
            )
		);
	}

}