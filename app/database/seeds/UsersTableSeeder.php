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

		Sentry::register(array(
			'username' => 'cyrilzhao',
		    'email'    => 'cyrilzhao@congcong.com',
		    'password' => '12345678',
        	'gender'   => 1,
        	'mobile'   => '12434931123',
        	'activated' => 1
		));

		Sentry::register(array(
			'username' => 'cyrilzhaoa',
		    'email'    => 'cyrilzhaoa@congcong.com',
		    'password' => '12345678',
        	'gender'   => 1,
        	'mobile'   => '12434931123',
        	'activated' => 1
		));

		Sentry::register(array(
			'username' => 'cyrilzhaob',
		    'email'    => 'cyrilzhaob@congcong.com',
		    'password' => '12345678',
        	'gender'   => 1,
        	'mobile'   => '12434931123',
        	'activated' => 1
		));

		Sentry::register(array(
			'username' => 'cyrilzhaoc',
		    'email'    => 'cyrilzhaoc@congcong.com',
		    'password' => '12345678',
        	'gender'   => 1,
        	'mobile'   => '12434931123',
        	'activated' => 1
		));

		Sentry::register(array(
			'username' => 'cyrilzhaod',
		    'email'    => 'cyrilzhaod@congcong.com',
		    'password' => '12345678',
        	'gender'   => 1,
        	'mobile'   => '12434931123',
        	'activated' => 1
		));
	}

}