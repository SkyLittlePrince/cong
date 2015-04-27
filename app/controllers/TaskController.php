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
		$newTask->isAuction = $isAuction;
		$newTask->personNum = $personNum;
		$newTask->description = $description;
		$newTask->files = $files;
		if($isAuction) {
			$newTask->auctionPrice = $auctionPrice;
			$newTask->auctionDeadline = $auctionDeadline;
		}
		$newTask->save();
	} 

	public function cancelPublish()
	{
		$taskId = Input::get("taskId");

		Task::destroy($taskId);
	}

	public function receive()
	{
		
	}

	public function cancelReceive()
	{

	}

	public function getTaskInfo()
	{

	}

	public function getReceivedTasks()
	{

	}

	public function getPublishedTasks()
	{

	}

	public function getTasksByUser()
	{

	}

}
