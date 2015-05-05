<?php

class IndentController extends BaseController {
	
	public function create()
	{
		$taskId = Input::get("taskId");

		if(!Sentry::check())
			return Response::json(array('errCode' => 1,'message' => '请登录!', 'newIndentId' => $indent->id));

		$userId = Sentry::getUser()->id;

		$indent = new Indent();
		$indent->task_id = $taskId;
		$indent->user_id = $userId;
 		$indent->save();

		return Response::json(array('errCode' => 0,'message' => '创建订单成功!', 'newIndentId' => $indent->id));
	}

	public function cancel()
	{
		if(!Sentry::check())
			return Response::json(array('errCode' => 1,'message' => '请登录!', 'newIndentId' => $indent->id));
		
		$indentId = Input::get("indentId");

		Indent::destroy($indentId);

		return Response::json(array('errCode' => 0,'message' => '取消订单成功!'));
	}

	public function getIndent()
	{
		if(!Sentry::check()) {
			return Response::json(array('errCode' => 1,'message' => '请登录!'));
		}

		$indentId = Input::get("indentId");

		$indent = Indent::find($indentId);
		if(is_null($indent)) 
		{
			return Response::json(array('errCode' => 1,'message' => "订单未找到"));
		}
		else 
		{
			return Response::json(array('errCode' => 0,'indent' => $indent));
		}
	}

	public function getMyIndents()
	{
		if(!Sentry::check())
			return Response::json(array('errCode' => 1,'message' => '请登录!', 'newIndentId' => $indent->id));
		
		$tasks = Task::where("user_id", "=", Sentry::getUser()->id)->get();
		$indents = [];

		foreach ($tasks as $key => $task) {
			array_push($indents, $task->indent);
		}

		return Response::json(array('errCode' => 0,'indents' => $indents));
	}
}
