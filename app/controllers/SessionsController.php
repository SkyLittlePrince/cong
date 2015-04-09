<?php

use Gregwar\Captcha\CaptchaBuilder;

class SessionsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Sessions Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'SessionsController@showWelcome');
	|
	*/

	public function captcha()
	{	
		$builder = new CaptchaBuilder;
		$builder->build();
		$phrase = $builder->getPhrase();
		Log::info('captcha is '.$phrase);
		Session::put('phrase', $phrase);
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-Type: image/jpeg');
		$builder->output();
		exit;
	}

	public function login()
	{	
		$builder = new CaptchaBuilder;
		$builder->build();
		
		Log::info('request method is '.$_SERVER['REQUEST_METHOD']);
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$phrase = $builder->getPhrase();
			Log::info('captcha is '.$phrase);
			Session::put('phrase', $phrase);
			return View::make('login')->with('captcha', $builder);
		} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$captcha = Input::get('captcha');
			Log::info('$captcha is '.$captcha);
			$sessionCaptcha = Session::get('phrase');
			if($captcha == $sessionCaptcha) {
				$email = Input::get('email');
				$password = Input::get('password');
				$hashedPassword = Hash::make($password);
				Log::info('auth is '.Auth::attempt(array('email' => $email, 'password' => $password)));
			    if (Auth::attempt(array('email' => $email, 'password' => $password), false))
			    {
			        return Redirect::intended('/')->with('message', '成功登录');
			    } else {
			        return Redirect::to('login')->with('message', '用户名密码不正确')->withInput();
			    }
			} else {
			    return Redirect::to('login')->with('message', '验证码有误')->withInput();
			}
		}
	}

	public function getLogout(){  
        if(Auth::check()){ 
            Auth::logout();
        } 
        return Redirect::to('login'); 
    }

}