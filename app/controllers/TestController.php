<?php

class TestController extends \BaseController {

	public function getAscore()
	{
		$aScore = Product::find(1)->aScore();

		return Response::json(array($aScore));
	}

}