<?php

use Gregwar\Captcha\CaptchaBuilder;

class UserController extends \BaseController {

	public function getRegister()
	{

		$builder = new CaptchaBuilder;
		$builder->build();

		$phrase = $builder->getPhrase();	
		Session::put('phrase', $phrase);

		return View::make('register')->with('captcha', $builder);
	}

	public function postRegister()  //user register
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

	public function getLogin()
	{
		$builder = new CaptchaBuilder;
		$builder->build();

		$phrase = $builder->getPhrase();	
		Session::put('phrase', $phrase);

		return View::make('login')->with('captcha', $builder);
	}

	public function postLogin() //user login
	{
		$login = Input::get('loginname');  //login token
		$password = Input::get('password');
		$captcha = Input::get('captcha');
		$sessionCaptcha = Session::get('phrase');

		if($captcha != $sessionCaptcha)
			return Redirect::to('user/login')->with('message', '验证码有误!')->withInput(); 

		$reg = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/";
		$user = null;
		if(preg_match($reg, $login))
		{
			$user = User::where('email',$login)->first();
		}
		else
		{
			$user = User::where('mobile',$login)->first();
		}

		if(!isset($user))
		{
			return Response::json(array('errCode' => '1','message' => '用户不存在!'));
		}

		$cred = array(
				'username' => $user->username,
				'password' => $password
			);

		try
		{
			$user = Sentry::authenticate($cred,false);
			if(isset($user))
			{
				return Response::json(array('errCode' => '0','message' => '登陆成功!'));
			}
			else
			{
				return Response::json(array('errCode' => '2','message' => '密码错误!')); 
			}
		}
		catch(Exception $e)
		{
			return Response::json(array('errCode' => '3','message' => '用户名或密码错误!'));
		}
	}

	public function getDelete()  //admin delete user
	{
		$id = Input::get('id');
		$user = User::find($id);
		$admin = Sentry::getUser();

		if($admin->role_id != 3)
			return Response::json(array('errCode' => 1,'message' => '你没有该操作权限!'));

		if(!isset($user))
			return Response::json(array('errCode' => '1','message' => '用户不存在!'));

		$user->delete();
		return Response::json(array('errCode' => 0,'message' => '删除成功!'));
	}
}