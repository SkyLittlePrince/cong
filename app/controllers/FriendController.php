<?php

class FriendController extends \BaseController {

	public function add()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));
		}

		$friend_id = Input::get("friend_id");		
	}

}






