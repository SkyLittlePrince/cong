<?php

use Gregwar\Captcha\CaptchaBuilder;

class UserController extends \BaseController {

	public function captcha()
	{
		$builder = new CaptchaBuilder;
		$builder->build();
		$phrase = $builder->getPhrase();
		Session::put('phrase', $phrase);
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-Type: image/jpeg');
		$builder->output();
		exit;
	}

	public function checkCaptcha()
	{
		$captcha = Input::get('captcha');
		$sessionCaptcha = Session::get('phrase');

		if($captcha != $sessionCaptcha)
			return Response::json(array('errCode' => 1,'message' => '验证码有误!'));

		return Response::json(array('errCode' => 0,'message' => '验证码正确!'));
	}

	public function checkEmail()
	{
		$email = Input::get('email');

		$reg = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/";
		if(!preg_match($reg, $email))
			return Response::json(array('errCode' => 1,'messge' => '邮箱格式不正确!'));

		$user = User::where('email',$email)->first();

		if(isset($user))
			return Response::json(array('errCode' => 2,'message' => '该邮箱已被注册!'));

		return Response::json(array('errCode' => 0,'message' => '该邮箱可用!'));

	}

	public function getCheckRegister()
	{
		$login = Input::get('loginname');

		$possible_charactors = "abcdefghijklmnopqrstuvwxyz0123456789"; //产生随机数的字符串
		$salt  =  "";   //验证码
		while(strlen($salt) < 6)
		{
		 	 $salt .= substr($possible_charactors,rand(0,strlen($possible_charactors)-1),1);
		}

		$reg = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/";
		if(preg_match($reg, $login))
		{
			$user = User::where('email',$login)->first();
			if(isset($user))
				return Response::json(array('errCode' => 2,'message' => '邮箱已被注册.'));

			Session::put('registerSalt',$salt);

			Mail::send('token',array('token' => $salt),function($message) use ($login)
			{
				$message->to($login,'')->subject('丛丛网验证码!');
			});

			return Response::json(array('errCode' => 0,'message' => '验证码已发送到你的邮箱!'));
		}
		else
		{
			$reg = "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/";
			if(preg_match($reg, $login))
			{
				$user = User::where('mobile',$login)->first();
				if(isset($user))
					return Response::json(array('errCode' => 3,'message' => '手机号已被注册.'));

				Session::put('registerSalt',$salt);

				return Response::json(array('errCode' => 0,'message' => '验证码已发送到你的手机!'));
			}
			else
			{
				return Response::json(array('errCode' => 1,'message' => '请填写正确的邮箱或手机号!'));
			}
		}

	}

	public function checkRegister()
	{
		$salt = Input::get('registerSalt');
		$sessionSalt = Session::get('registerSalt');

		if($salt != $sessionSalt)
		{
			return Response::json(array('errCode' => 1,'message' => '验证码有误!'));
		}

		return Response::json(array('errCode' => 0,'message' => '验证码正确!'));

	}

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
		$login = Input::get('loginname');
		$captcha = Input::get('captcha');
		$sessionCaptcha = Session::get('phrase');
		$salt = Input::get('registerSalt');
		$sessionSalt = Session::get('registerSalt');

		if($captcha != $sessionCaptcha || $salt != $sessionSalt)
			return Response::json(array('errCode' => 9,'message' => '验证码错误!'));

		if(strlen($username) < 4)
			return Response::json(array('errCode' => 1,'message' => '用户名长度不能少于4.'));

		if(strlen($username) > 20)
			return Response::json(array('errCode' => 2,'message' => '用户名长度不能长于20.'));

		$user = User::where('username',$username)->first();
		if(isset($user))
			return Response::json(array('errCode' => 3,'message' => '用户名已被注册.'));

		if(!isset($login))
			return Response::json(array('errCode' => 4,'message' => '邮箱和手机号不能都为空.'));

		$reg = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/";
		if(preg_match($reg, $login))
		{
			$user = User::where('email',$login)->first();
			if(isset($user))
				return Response::json(array('errCode' => 5,'message' => '邮箱已被注册.'));

			$email = $login;
			$mobile = null;
		}
		else
		{
			$reg = "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/";
			if(preg_match($reg, $login))
			{
				$user = User::where('mobile',$login)->first();
				if(isset($user))
					return Response::json(array('errCode' => 6,'message' => '手机号已被注册.'));

				$email = null;
				$mobile = $login;
			}
			else
			{
				return Response::json(array('errCode' => 7,'messge' => '邮箱或手机号格式不正确!'));
			}
		}

		if(strlen($password) < 6)
			return Response::json(array('errCode' => 8,'message' => '密码长度不能少于6位'));

		$user = Sentry::createUser(array(
				'email' => $email,
				'password' => $password,
				'username' => $username,
				'mobile' => $mobile,
				'activated' => true
			));

		if(isset($user))
			return Response::json(array('errCode' => 0,'message' => '注册成功!'));
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
			$reg = "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/";
			if(preg_match($reg, $login))
			{
				$user = User::where('mobile',$login)->first();
			}
			else
			{
				$user = User::where('username',$login)->first();
			}
		}

		if(!isset($user))
		{
			return Response::json(array('errCode' => 1,'message' => '用户不存在!'));
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
				return Response::json(array('errCode' => 0,'message' => '登陆成功!'));
			}
			else
			{
				return Response::json(array('errCode' => 2,'message' => '密码错误!'));
			}
		}
		catch(Exception $e)
		{
			return Response::json(array('errCode' => 3,'message' => '用户名或密码错误!'));
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
			return Response::json(array('errCode' => 1,'message' => '用户不存在!'));

		$user->delete();
		return Response::json(array('errCode' => 0,'message' => '删除成功!'));
	}

	public function postUpdate()
	{
		$qq = Input::get('qq');
		$gender = Input::get('gender');
		$user = Sentry::getUser();

		if(isset($qq))
		{
			if(!is_numeric($qq))
				return Response::json(array('errCode' => 1,'message' => 'qq号格式不正确!'));
		}
		else
		{
			$qq = $user->qq;
		}

		if(isset($gender))
		{
			if($gender != 1)
			{
				$gender = 0;
			}
		}
		else
		{
			$gender = $user->gender;
		}

		if($user->save())
		{
			return Response::json(array('errCode' => 0,'message' => '修改成功!'));
		}
		else
		{
			return Response::json(array('errCode' => 2,'message' => '修改失败,请稍后再试!'));
		}
	}

	public function postChangePassword()
	{
		$user = Sentry::getUser();
		$oldPwd = Input::get('oldPwd');
		$newPwd = Input::get('newPwd');
		$captcha = Input::get('captcha');
		$sessionCaptcha = Session::get('phrase');

		if($captcha != $sessionCaptcha)
			return Response::json(array('errCode' => 5,'message' => '验证码错误!'));

		if(strlen($newPwd) < 6)
			return Response::json(array('errCode' => 1,'message' => '密码长度不能少于6位!'));

		try
		{
			if($user->checkPassword($oldPwd))
			{
				$resetCode = $user->getResetPasswordCode();
				if($user->attemptResetPassword($resetCode, $newPwd))
				{
					return Response::json(array('errCode' => 0,'message' => '修改密码成功！'));
				}
				else
				{
					return Response::json(array('errCode' => 2,'message' => '修改密码失败！'));
				}
			}

			return Response::json(array('errCode' => 3,'message' => '旧密码输入错误！'));
		}
		catch(Exception $e)
		{
			return Response::json(array('errCode' => 4,'message' => '修改密码失败,请稍后再试！'));
		}

	}

	public function getLogout()
	{
		Sentry::logout();
		return Response::json(array('errCode' => 0,'message' => '退出成功!'));
	}
}
