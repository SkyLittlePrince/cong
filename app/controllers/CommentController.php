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
			return Response::json(array('errCode' => 2,'message' => '不能评论自己的产品!'));

		$indent = Indent::where('user_id',$user->id)
			->where('product_id',$product_id)
			->first();

		if(!$indent)
			return Response::json(array('errCode' => 3,'message' => '你还没对此产品下单!'));

		if(!isset($title))
			return Response::json(array('errCode' => 4,'message' => '标题不能为空!'));

		if(!isset($content))
			return Response::json(array('errCode' => 5,'message' => '内容不能为空!'));

		$comment = Comment::create(array(
				'user_id' => $user->id,
				'product_id' => $product_id,
				'title' => $title,
				'content' => $content
			));

		if(!isset($comment))
			return Response::json(array('errCode' => 6,'message' => '评论失败!'));

		return Response::json(array('errCode' => 0,'message' => '评论成功!'));
	}

}