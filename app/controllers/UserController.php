<?php

class UserController extends \BaseController {

	public function postCreate()  //user register
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$email = Input::get('email');
		$mobile = Input::get('mobile');
		$gender = Input::get('gender');

		if(strlen($user) < 4)
			return Response::json(array('errCode' => '1','message' => '用户名长度不能少于4.'));  

		if(strlen($user) > 20)
			return Response::json(array('errCode' => '2','message' => '用户名长度不能长于20.'));

		$user = User::where('username',$username)->first();
		if(isset($user))
			return Response::json(array('errCode' => '3','message' => '用户名已被注册.'));  

		if(!isset($email) && !isset($moblie))
			return Response::json(array('errCode' => '4','message' => '邮箱和手机号不能都为空.')); 

		if(isset($email))
		{
			$reg = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/";
			if( !preg_match($reg, $email))
				return Response::json(array('errCode' => '5','message' => '邮箱格式不正确.')); 

			$user = User::where('email',$email)->first();
			if(isset($user))
				return Response::json(array('errCode' => '6','message' => '邮箱已被注册.'));
		}			

		if(isset($mobile) )
		{
			if(strlen($mobile) != 11)
				return Response::json(array('errCode' => '7','message' => '手机号格式不正确.')); 

			$user = User::where('mobile',$mobile)->first();
			if(isset($user))
				return Response::json(array('errCode' => '8','message' => '手机号已被注册.'));
		}

		if(strlen($password) < 6)
			return Response::json(array('errCode' => '9','message' => '密码长度不能少于6位'));

		$user = Sentry::createUser(array(
				'email' => $email,
				'password' => $password,
				'username' => $username,
				'gender' => $gender,
				'mobile' => $mobile,
				'activated' => true
			));

		if(isset($user))
			return Response::json(array('errCode' => '0','message' => '注册成功!'));
	}

}