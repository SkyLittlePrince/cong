<?php

class CommentController extends \BaseController {

	public function addComment()
	{
		$user = Sentry::getUser();
		$product_id = Input::get('product_id');
		$content = Input::get('content');

		$product = Product::with('shop')->find($product_id);
		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该产品不存在!'));

		if($product->shop->user_id == $user->id)
			return Response::json(array('errCode' => 2,'message' => '不能评论自己的产品!'));

		$indent = Indent::where('user_id',$user->id)
			->where('product_id',$product_id)
			->first();

		if(!isset($indent))
			return Response::json(array('errCode' => 3,'message' => '你还没对此产品下单!'));

		if(!isset($title))
			return Response::json(array('errCode' => 4,'message' => '标题不能为空!'));

		if(!isset($content))
			return Response::json(array('errCode' => 5,'message' => '内容不能为空!'));

		$comment = Comment::create(array(
				'user_id' => $user->id,
				'product_id' => $product_id,
				'content' => $content
			));

		if(!isset($comment))
			return Response::json(array('errCode' => 6,'message' => '评论失败!'));

		return Response::json(array('errCode' => 0,'message' => '评论成功!'));
	}

	public function deleteComment()
	{
		$user = Sentry::getUser();
		$id = Input::get('id');

		$comment = Comment::find($id);

		if($user->role_id != 3)
			return Response::json(array('errCode' => 1,'message' => '你没有管理员权限!'));

		if(!isset($comment))
			return Response::json(array('errCode' => 2,'message' => '该评论不存在!'));

		if($comment->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));
		else
			return Response::json(array('errCode' => 3,'message' => '删除失败!'));

	}

	public function getComment()
	{
		$product_id = Input::get('product_id');
		$pageNum = Input::get('pageNum');

		$comments = Comment::where('product_id',$product_id)
				->orderBy('created_at','desc')
				->paginate($pageNum);

		return View::make('')->with('comments',$comments);

	}

}