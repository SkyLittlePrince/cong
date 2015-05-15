<?php

class InvitationPageController extends \BaseController {

	public function inviteFriends()
	{
		$user = Sentry::getUser();
		$url = 'cong.laravel.com/user/register?invitationCode=' . $user->id;

		return View::make('tradingCenter.buyer-center.invite-friends',array('url' => $url));
	}

}