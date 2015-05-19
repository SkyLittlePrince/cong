<?php

class FriendController extends \BaseController 
{

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

		if($this->isFriendExist($user_id, $friend_id))
			return Response::json(array('errCode' => 2, 'message' => '已经是好友关系'));

		$friend = new Friend();
		$friend->user_id = $user_id;
		$friend->friend_id = $friend_id;
		
		if(!$friend->save())
			return Response::json(array('errCode' => 3,'message' => '添加好友失败!'));

		return Response::json(array('errCode' => 0));
	}

	public function delete()
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

		DB::table('friends')->where('user_id', '=', $user_id)->where("friend_id", "=", $friend_id)->delete();
		
		return Response::json(array('errCode' => 0));
	}

	public function getMyFriends()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));
		}

		$friends = Friend::where("user_id", "=", $user_id)->get();
		
		return Response::json(array('errCode' => 0, 'friends' => $friends));
	}

	private function isFriendExist($user_id, $friend_id)
	{
		$friends = DB::table('friends')->where('user_id', '=', $user_id)->where("friend_id", "=", $friend_id)->get();

		if(count($friends))
			return true;
		else 
			return false;
	}

	public function checkIsFriend()
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

		if($friend_id == $user_id)
			return Response::json(array('isFriend' => 2));

		if($this->isFriendExist($user_id, $friend_id))
			return Response::json(array('isFriend' => 1));
		else
			return Response::json(array('isFriend' => 0));
	}
}






