<?php

class EvaluationController extends \BaseController {

	public function addEvaluation()
	{
		$user = Sentry::getUser();
		$product_id = Input::get('product_id');
		$content = Input::get('content');
		$score = Input::get('score');

		$product = Product::find($product_id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该商品不存在!'));
		$score = intval($score);
		if($score < 1 || $score > 5)
			return Response::json(array('errCode' => 2,'message' => '评分只能为1到5!'));
		
		$evaluation = Evaluation::create(array(
				'product_id' => $product_id,
				'content' => $content,
				'score' => $score,
				'user_id' => $user->id
			));

		if(!isset($evaluation))
			return Response::json(array('errCode' => 3,'message' => '评价失败!'));

		return Response::json(array('errCode' => 0,'message' => '评价成功!'));
	}

}