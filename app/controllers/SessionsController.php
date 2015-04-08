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
		$_SESSION['phrase'] = $phrase;
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-Type: image/jpeg');
		$builder->output();
		exit;
	}

	public function getLogin()
	{
		return View::make('login');
	}

	public function postLogin()
	{
		$captcha = Input::get('captcha');
		$builder = new CaptchaBuilder;
		$builder->build();
		if($builder->testPhrase($captcha)) {
			$email = Input::get('email');
			$password = Input::get('password');
		    if (Auth::attempt(array('email' => $email, 'password' => $password)))
		    {
		        return Redirect::intended('/')->with('message', '成功登录');
		    } else {
		        return Redirect::to('login')
		        	->with('message', '用户名密码不正确')
		        	->withInput();
		    }
		} else {
		    return Redirect::to('login')
		        	->with('message', '验证码有误')
		        	->withInput();
		}
	}

	public function getLogout(){  
        if(Auth::check()){ 
            Auth::logout();
        } 
        return Redirect::to('login'); 
    }

}