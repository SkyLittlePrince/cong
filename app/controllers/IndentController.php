<?php

class IndentController extends BaseController {
	
	public function create()
	{
		$taskId = Input::get("taskId");

		$indent = new Indent();
		$indent->task_id = $taskId;
		$indent->save();

		return Response::json(array('errCode' => 0,'message' => '创建订单成功!', 'newIndentId' => $indent->id));
	}

	public function cancel()
	{
		$indentId = Input::get("indentId");

		Indent::destroy($indentId);

		return Response::json(array('errCode' => 0,'message' => '取消订单成功!'));
	}

	public function getIndent()
	{
		$indentId = Input::get("indentId");

		$indent = Indent::find($indentId)->get();

		return Response::json(array('errCode' => 0,'indent' => $indent));
	}

	public function getMyIndents()
	{
		// $tasks = Task::where("user_id", "=", 1)->get();
		$tasks = Task::where("user_id", "=", Sentry::getUser()->id)->get();
		$indents = [];

		foreach ($tasks as $key => $task) {
			array_push($indents, $task->indent);
		}

		return Response::json(array('errCode' => 0,'indents' => $indents));
	}
}
