<?php

class TaskController extends BaseController {

	public function create() 
	{
		$title = Input::get("title");
		$price = Input::get("price");
		$isAuction = Input::get("isAuction", false);
		$auctionPrice = Input::get("auctionPrice");
		$auctionDeadline = Input::get("auctionDeadline");
		$personNum = Input::get("personNum");
		$description = Input::get("description");
		$files = Input::get("files");

		$newTask = new Task();
		$newTask->title = $title;
		$newTask->price = $price;
		$newTask->user_id = Sentry::getUser()->id;
		$newTask->isAuction = $isAuction;
		$newTask->personNum = $personNum;
		$newTask->description = $description;
		$newTask->files = $files;
		if($isAuction) {
			$newTask->auctionPrice = $auctionPrice;
			$newTask->auctionDeadline = $auctionDeadline;
		}
		$newTask->save();

		return Response::json(array('errCode' => 0,'newTaskId' => $newTask->id));
	}

	public function cancelPublish()
	{
		$taskId = Input::get("taskId");

		Task::destroy($taskId);

		return Response::json(array('errCode' => 0,'message' => "取消任务成功"));
	}

	public function getTaskInfo()
	{
		$taskId = Input::get("taskId");

		$task = Task::find($taskId);
		if(!is_null($task)) 
		{
			return Response::json(array('errCode' => 0,'task' => $task));
		} 
		else 
		{
			return Response::json(array('errCode' => 1,'message' => "任务不存在"));
		}
	}

	// 获取我发布的task
	public function getTasksByUser()
	{
		if(Input::has("userId")) 
		{
			$user_id = Input::get("userId");
		} 
		else if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Response::json(array('errCode' => 1,'message' => "[参数错误]缺少用户id"));
		}

		$tasks = Task::where("user_id", "=", $user_id)->get();
	
		return Response::json(array('errCode' => 0,'taskList' => $tasks));
	}
}
