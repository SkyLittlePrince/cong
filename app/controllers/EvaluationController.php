<?php

class EvaluationController extends \BaseController {

	public function addEvaluation()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));
		}

		$user = Sentry::getUser();
		$product_id = Input::get('product_id');
		$content = Input::get('content');
		$score = Input::get('score');

		$product = Product::with(array('indents' => function($q) {
			$q->where('user_id',$user->id);
		}))->find($product_id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该商品已下架!'));

		if(count($product->indents) == 0)
			return Response::json(array('errCode' => 2,'message' => '你还没对该商品下单!'));

		$flag = 0;
		foreach ($product->indents as $indent) {
			if($indent->status == 2)
			{
				$flag = 1;
				break;
			}
		}

		if($flag == 0)
			return Response::json(array('errCode' => 3,'message' => '交易完成才能评价!'));

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