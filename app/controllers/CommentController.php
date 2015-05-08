<?php

class CommentController extends \BaseController {

	public function addComment()
	{
		$user = Sentry::getUser();
		$product_id = Input::get('product_id');
		$title = Input::get('title');
		$content = Input::get('content');

		$product = Product::find($product_id);
		if(!$product)
			return Response::json(array('errCode' => 1,'message' => '该产品不存在!'));

		if($product->user_id == $user->id)
			return Response::json(array('errCode' => 2,'message' => '不能评论自己的产品!'))
	}

}