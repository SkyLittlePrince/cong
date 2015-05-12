<?php

class ScoreController extends \BaseController {

	public function addScore()
	{
		$user = Sentry::getUser();
		$scoreNum = Input::get('score');
		$product_id = Input::get('product_id');

		$product = Product::find($product_id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该产品不存在!'));

		if($product->user_id == $user->id)
			return Response::json(array('errCode' => 2,'message' => '不能给自己的产品评分'));

		$indent = Indent::where('user_id',$user->id)
			->where('product_id',$product_id)
			->first();

		if(!isset($indent))
			return Response::json(array('errCode' => 3,'message' => '你还没对此产品下单!'));

		$scoreNum = intval($scoreNum);
		if(1 <= $scoreNum && $scoreNum <= 5)
		{
			try
			{
				$score = Score::create(array(
						'user_id' => $user->id,
						'product_id' => $product->id,
						'score' => $scoreNum
					));

				$aScore = Score::where('user_id',$user->id)
						->where('product_id',$product_id)
						->avg('score');

				return Response::json(array('errCode' => 0,'aScore' => $aScore));
			}catch(Exception $e)
			{
				return Response::json(array('errCode' => 4,'message' => '评分失败!'));
			}
		}
		else
		{
			return Response::json(array('errCode' => 4,'message' => '分数格式不正确!'));
		}
	}

}