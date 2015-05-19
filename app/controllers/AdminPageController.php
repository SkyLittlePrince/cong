<?php

class AdminPageController extends BaseController {

	public function userManager()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.user-manager');
	}

	public function productManager()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.product-manager');
	}

	public function IndentManager()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.indent-manager');
	}

	public function productReport()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.product-report');
	}
}
