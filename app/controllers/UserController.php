<?php

use Gregwar\Captcha\CaptchaBuilder;

class UserController extends \BaseController {

	//生成验证码
	public function captcha()
	{
		Session_start();
		$builder = new CaptchaBuilder;
		$builder->build();
		$phrase = $builder->getPhrase();
		$_SESSION['phrase'] = $phrase;
		//Session::put('phrase', $phrase);
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-Type: image/jpeg');
		$builder->output();
		exit;
	}

	//验证验证码
	public function checkCaptcha()
	{
		Session_start();
		$captcha = Input::get('captcha');
		//$sessionCaptcha = Session::get('phrase');
		$sessionCaptcha = $_SESSION['phrase'];

		if($captcha != $sessionCaptcha)
			return Response::json(array('errCode' => 1,'message' => '验证码有误!'));

		return Response::json(array('errCode' => 0,'message' => '验证码正确!'));
	}

	//验证邮箱的格式和是否可用
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

	//获取邮箱或手机号的验证码
	public function getCheckRegister()
	{
		Session_start();
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

			//Session::put('registerSalt',$salt);
			$_SESSION['registerSalt'] = $salt;

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

				//Session::put('registerSalt',$salt);
				$_SESSION['registerSalt'] = $salt;

				return Response::json(array('errCode' => 0,'message' => '验证码已发送到你的手机!'));
			}
			else
			{
				return Response::json(array('errCode' => 1,'message' => '请填写正确的邮箱或手机号!'));
			}
		}
	}

	//验证注册时发到邮箱或手机的验证码是否正确
	public function checkRegister()
	{
		Session_start();
		$salt = Input::get('registerSalt');
		//$sessionSalt = Session::get('registerSalt');
		$sessionSalt = $_SESSION['registerSalt'];

		if($salt != $sessionSalt)
		{
			return Response::json(array('errCode' => 1,'message' => '验证码有误!'));
		}

		return Response::json(array('errCode' => 0,'message' => '验证码正确!'));

	}

	//获取注册页面和生成验证码
	public function getRegister()
	{
		Session_start();
		$builder = new CaptchaBuilder;
		$builder->build();

		$phrase = $builder->getPhrase();
		//Session::put('phrase', $phrase);
		$_SESSION['phrase'] = $phrase;

		$invitationCode = Input::get('invitationCode');
		$_SESSION['invitationCode'] = $invitationCode;

		return View::make('register')->with('captcha', $builder);
	}

	//用户注册
	public function postRegister()  
	{
		Session_start();
		$username = Input::get('username');
		$password = Input::get('password');
		$login = Input::get('loginname');
		//$captcha = Input::get('captcha');
		//$sessionCaptcha = Session::get('phrase');
		$salt = Input::get('registerSalt');
		//$sessionSalt = Session::get('registerSalt');
		$sessionSalt = $_SESSION['registerSalt'];
		$invitationCode = $_SESSION['invitationCode'];

		if($salt != $sessionSalt)
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
		{
			try
			{
				$friendship = new Friend;
				$friendship->friend_id = $user->id;
				$friendship->user_id = $invitationCode;
				$friendship->save();
			}
			catch(Exception $e)
			{

			}
			return Response::json(array('errCode' => 0,'message' => '注册成功!'));
		}
		
		return Response::json(array('errCode' => 10,'message' => '注册失败!'));	
	}

	//获取登录页面和生成验证码
	public function getLogin()
	{
		Session_start();
		$builder = new CaptchaBuilder;
		$builder->build();

		$phrase = $builder->getPhrase();
		//Session::put('phrase', $phrase);
		$_SESSION['phrase'] = $phrase;

		return View::make('login')->with('captcha', $builder);
	}

	//用户登录
	public function postLogin() //user login
	{
		Session_start();
		$login = Input::get('loginname');  //login token
		$password = Input::get('password');
		$captcha = Input::get('captcha');
		//$sessionCaptcha = Session::get('phrase');
		$sessionCaptcha = $_SESSION['phrase'];

		if($captcha != $sessionCaptcha)
			return Response::json(array('errCode' => 4,'messge' => '验证码有误!'));

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
				return Response::json(array('errCode' => 0,'message' => '登陆成功!', 'intendedUrl' => Session::pull('url.intended', "/")));
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

	//管理员删除用户
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

	//更新用户基本资料
	public function postUpdate()
	{
		$user = Sentry::getUser();
		$qq = Input::get('qq');
		$gender = Input::get('gender');
		$wechat = Input::get('wechat');
		$province = Input::get('province');
		$city = Input::get('city');
		$region = Input::get('region');
		$address = Input::get('address');
		$birthday = Input::get('birthday');

		if(isset($gender) && $gender != 0)
			$gender = 1;
		else
			$gender = 0;

		$user = User::find($user->id);
		$user->qq = $qq;
		$user->gender = $gender;
		$user->wechat = $wechat;
		$user->province = $province;
		$user->city = $city;
		$user->region = $region;
		$user->address = $address;
		$user->birthday = $birthday;

		if($user->save())
			return Response::json(array('errCode' => 0,'message' => '修改成功!'));

		return Response::json(array('errCode' => 1,'message' => '修改失败!'));
		
	}

	//查看某个用户的基本资料
	public function getInformation()     
	{
		$id = Input::get('id');
		$user = User::find($id);

		if(!isset($user))
			return Response::json(array('errCode' => 1,'message' => '该用户不存在!'));

		return Response::json(array('errCode' => 0,'user' => $user)); 
	}

	//修改用户简介
	public function editDescription()
	{
		$user = Sentry::getUser();
		$description = Input::get('description');

		$user->description = $description;

		if($user->save())
		{
			return Response::json(array('errCode' => 0,'message' => '保存成功！')); 
		}
		else
		{
			return Response::json(array('errCode' => 1,'message' => '保存失败！'));
		}
	}

	//更改密码
	public function postChangePassword()
	{
		//Session_start();
		$user = Sentry::getUser();
		$oldPwd = Input::get('oldPwd');
		$newPwd = Input::get('newPwd');
		//$captcha = Input::get('captcha');
		//$sessionCaptcha = Session::get('phrase');
		//$sessionCaptcha = $_SESSION['phrase'];

		// if($captcha != $sessionCaptcha)
		// 	return Response::json(array('errCode' => 5,'message' => '验证码错误!'));

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

	//忘记密码
	public function postForgetPassword()
	{
		Session_start();
		$sessionSalt = $_SESSION['registerSalt'];

		$email = Input::get('email');
		$salt = Input::get('registerSalt');
		$password = Input::get('password');

		$user = User::where('email',$email)->first();

		if(!isset($user))
			return Response::json(array('errCode' => 1,'message' => '该邮箱不存在!'));

		if($sessionSalt != $salt)
			return Response::json(array('errCode' => 2,'message' => '验证码不正确!'));

		if(strlen($password) < 6)
			return Response::json(array('errCode' => 3,'messge' => '密码长度不能少于6位!'));

		$user = Sentry::findUserById($user->id);
		$resetCode = $user->getResetPasswordCode();
		if($user->attemptResetPassword($resetCode, $password))
			return Response::json(array('errCode' => 0,'message' => '重置密码成功!'));

		return Response::json(array('errCode' => 4,'message' => '重置密码失败!'));
	}

	//退出登录
	public function getLogout()
	{
		if(Sentry::check())
		{
			Sentry::logout();
			return Response::json(array('errCode' => 0,'message' => '退出成功!'));
		} 
		else 
		{
			return Response::json(array('errCode' => 1,'message' => '用户未登录'));
		}
	}

	public function updateAbout()
	{
		$content = Input::get('content');
		$user_id = Sentry::getUser()->id;

		$about = About::where("user_id", "=", $user_id);

		if(count($about->get()) == 0)
		{
			$about = new About();
			$about->user_id = $user_id;
			$about->content = $content;

			if(!$about->save()) 
			{
				return Response::json(array('errCode' => 1,'message' => '保存失败!', "about" => $about));
			}
		} 
		else 
		{
			$about->update(array('content' => $content));
		}
		

		return Response::json(array('errCode' => 0,'message' => '保存成功!', "about" => $about));
	}
	
	public function updateContact()
	{
		$mobile = Input::get('mobile');
		$qq = Input::get('qq');
		$email = Input::get('email');

		if(!Sentry::check())
			return Response::json(array('errCode' => 1,'message' => '请登录!'));

		$user_id = Sentry::getUser()->id;

		$user = User::find($user_id);

		$user->mobile = $mobile;
		$user->qq = $qq;
		$user->email = $email;

		if($user->save())
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));

		return Response::json(array('errCode' => 3,'message' => '保存失败!'));
	}
	
	//添加工作经历
	public function addWorkExperience()
	{
		$user = Sentry::getUser();
		$start_time = Input::get('start_time');
		$end_time = Input::get('end_time');
		$description = Input::get('description');

		if($start_time > $end_time) {
			return Response::json(array('errCode' => 4, "message" => "起始时间不得小于终止时间"));
		}

		$validator = Validator::make(
			array(
				'start_time' => $start_time,
				'end_time' => $end_time,
				'description' => $description
			),
			array(
				'start_time' => 'required|date_format:Y-m-d',
				'end_time' => 'required|date_format:Y-m-d',
				'description' => 'required|size:50'
			)
		);

		if($validator->fails()){
			return Response::json(array('errCode' => 4, "message" => "参数格式错误", "validateMes" => $validator->messages()));
		}

		$workExperience = new WorkExperience;
		$workExperience->user_id = $user->id;
		$workExperience->start_time = $start_time;
		$workExperience->end_time = $end_time;
		$workExperience->description = $description;

		if($workExperience->save())
		{
			return Response::json(array('errCode' => 0,'message' => '保存成功!', 'newWorkExperienceId' => $workExperience->id));
		}
		else
		{
			return Response::json(array('errCode' => 1,'message' => '保存失败!'));
		}
	}

	//更新工作经历
	public function updateWorkExperience()
	{
		$id = Input::get('id');
		$start_time = Input::get('start_time');
		$end_time = Input::get('end_time');
		$description = Input::get('description');
		$user = Sentry::getUser();

		$workExperience = WorkExperience::find($id);
		
		if(!isset($workExperience))
			return Response::json(array('errCode' => 1,'message' => '该记录不存在!'));

		if($user->id != $workExperience->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		$workExperience->start_time = $start_time;
		$workExperience->end_time = $end_time;
		$workExperience->description = $description;

		if($workExperience->save())
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));

		return Response::json(array('errCode' => 3,'message' => '保存失败!'));
	}

	//删除工作经历
	public function deleteWorkExperience()
	{
		$id = Input::get('id');
		$user = Sentry::getUser();
		$workExperience = WorkExperience::find($id);
		
		if(!isset($workExperience))
			return Response::json(array('errCode' => 1,'message' => '该id不存在!'));

		if($user->id != $workExperience->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有该操作权限!'));

		if($workExperience->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}

	//增加教育经历
	public function addEduExperience()
	{
		$user = Sentry::getUser();
		$start_time = Input::get('start_time');
		$end_time = Input::get('end_time');
		$description = Input::get('description');

		$educationExperience = new EduExperience;
		$educationExperience->user_id = $user->id;
		$educationExperience->start_time = $start_time;
		$educationExperience->end_time = $end_time;
		$educationExperience->description = $description;

		if($educationExperience->save())
		{
			return Response::json(array('errCode' => 0,'message' => '保存成功!', "newEduExperienceId" => $educationExperience->id));
		}
		else
		{
			return Response::json(array('errCode' => 1,'message' => '保存失败!'));
		}
	}

	//更新教育经历
	public function updateEduExperience()
	{
		$id = Input::get('id');
		$start_time = Input::get('start_time');
		$end_time = Input::get('end_time');
		$description = Input::get('description');
		$user = Sentry::getUser();

		$educationExperience = EduExperience::find($id);
		
		if(!isset($educationExperience))
			return Response::json(array('errCode' => 1,'message' => '该记录不存在!'));

		if($user->id != $educationExperience->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		$educationExperience->start_time = $start_time;
		$educationExperience->end_time = $end_time;
		$educationExperience->description = $description;

		if($educationExperience->save())
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));

		return Response::json(array('errCode' => 3,'message' => '保存失败!'));
	}

	//删除教育经历
	public function deleteEduExperience()
	{
		$id = Input::get('id');
		$user = Sentry::getUser();
		$educationExperience = EduExperience::find($id);

		if(!isset($educationExperience))
			return Response::json(array('errCode' => 1,'message' => '该id不存在!'));

		if($educationExperience->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有该操作权限!'));

		if($educationExperience->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));	
			
		return Response::json(array('errCode' => 3,'message' => '删除失败!'));	
	}

	//增加个人奖项
	public function addAward()
	{
		$user = Sentry::getUser();
		$time = Input::get('time');
		$description = Input::get('description');

		$award = new Award;
		$award->user_id = $user->id;
		$award->time = $time;
		$award->description = $description;

		if($award->save())
		{
			return Response::json(array('errCode' => 0, 'message' => '保存成功!', 'newAwardId' => $award->id));
		}
		else
		{
			return Response::json(array('errCode' => 1, 'message' => '保存失败!'));
		}
	}

	//更新个人奖项
	public function updateAward()
	{
		$id = Input::get('id');
		$time = Input::get('time');
		$description = Input::get('description');
		$user = Sentry::getUser();

		$award = Award::find($id);
		
		if(!isset($award))
			return Response::json(array('errCode' => 1,'message' => '该记录不存在!'));

		if($user->id != $award->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		$award->time = $time;
		$award->description = $description;

		if($award->save())
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));

		return Response::json(array('errCode' => 3,'message' => '保存失败!'));
	}

	//删除个人奖项
	public function deleteAward()
	{
		$id = Input::get('id');
		$user = Sentry::getUser();
		$award = Award::find($id);

		if(!isset($award))
			return Response::json(array('errCode' => 1,'message' => '该id不存在!'));

		if($user->id != $award->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有该操作权限!'));

		if($award->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));	

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}
}