<?php

class TestController extends \BaseController {

	public function getUser()
	{
		$user = Test::find(1)->user()->first();
		return Response::json($user);
	}

	public function getTest()
	{
		$tests = User::find(1)->tests()->get();
		return Response::json($tests);
	}

	public function testSertInto()
	{
		$ids = DB::table('tags')->insert(array(
				array('name' => 'sdadada'),
				array('name' => 'sdad')
			));

		return Response::json($ids);
	}

}