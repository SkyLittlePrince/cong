<?php

class InvitationController extends \BaseController {

	public function sendInvitationCode()
	{
		$email = Input::get('email');
		$user = Sentry::getUser();

		$reg = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/";

		if(!preg_match($reg, $email))
			return Response::json(array('errCode' => 1,'message' => '邮箱格式不正确!'));

		$url = 'cong.laravel.com/user/register?token=' . $user->id;

		try
		{
			Mail::send('invitation',array('token' => $url),function($message) use ($email,$user)
			{
				$message->to($email,'')->subject('你的好友' . $user->name . '邀请你丛丛网!');
			});

			return Response::json(array('errCode' => 0,'message' => '邀请链接发送成功!'));
		}
		catch(Exception $e)
		{
			return Response::json(array('errCode' => 2,'message' => '邀请链接发送失败!'));
		}
	}

}