<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		Sentry::register(array(
			'username' => 'yangfusheng',
		    'email'    => 'yangfusheng@congcong.com',
		    'password' => '12345678',
        	'gender'   => 0,
        	'mobile'   => '13560474456',
        	'activated' => 1
		));

		Sentry::register(array(
			'username' => 'aaa',
		    'email'    => 'aaa@congcong.com',
		    'password' => '12345678',
        	'gender'   => 1,
        	'mobile'   => '13560474456',
        	'activated' => 1
		));
	}

}