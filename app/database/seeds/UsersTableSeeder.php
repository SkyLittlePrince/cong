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
		));
	}

}