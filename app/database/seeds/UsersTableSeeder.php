<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'yangfusheng',
	   	'email'    => 'yangfusheng@congcong.com',
	   	'password' => '12345678',
			'gender'   => 0,
			'mobile'   => '13560474456',
			"country" => "中国",
			'province' => "广东",
			"city" => "广州",
			'birthday' => "1998-07-01",
			'address' => '广东省广州市番禺区大学城外环西路',
			'activated' => 1
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'aaa',
	   	'email'    => 'aaa@congcong.com',
	  	'password' => '12345678',
			'gender'   => 1,
			'mobile'   => '13560474456',
			'activated' => 1
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'cyrilzhao',
		  'email'    => 'cyrilzhao@congcong.com',
			'password' => '12345678',
			'gender'   => 1,
			'mobile'   => '12434931123',
			'activated' => 1
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'cyrilzhaoa',
			'email'    => 'cyrilzhaoa@congcong.com',
			'password' => '12345678',
			'gender'   => 1,
			'mobile'   => '12434931123',
			'activated' => 1
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'cyrilzhaob',
			'email'    => 'cyrilzhaob@congcong.com',
			'password' => '12345678',
			'gender'   => 1,
			'mobile'   => '12434931123',
			'activated' => 1
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'cyrilzhaoc',
			'email'    => 'cyrilzhaoc@congcong.com',
			'password' => '12345678',
			'gender'   => 1,
			'mobile'   => '12434931123',
			'activated' => 1
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'cyrilzhaod',
			'email'    => 'cyrilzhaod@congcong.com',
			'password' => '12345678',
			'gender'   => 1,
			'mobile'   => '12434931123',
			'activated' => 1
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => '丛丛网小管家',
			'email' => '13660543593@163.com',
			'password' => '12345678',
			'gender' => 0,
			'mobile' => '13560474456',
			'activated' => 1,
			'role_id' => 3
		));

		Sentry::register(array(
			'avatar' => 'http://7sbxao.com1.z0.glb.clouddn.com/login.jpg',
			'username' => 'turtle',
			'email'    => '930030895@qq.com',
			'password' => '12345678',
			'gender'   => 1,
			'mobile'   => '12434931123',
			'activated' => 1
		));
	}

}
