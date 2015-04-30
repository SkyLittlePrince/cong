<?php

class TasksTableSeeder extends Seeder {

	public function run()
	{
		for($i = 1; $i < 11; $i ++) 
		{
			if($i % 3 == 0)
			{
				$personNum = 2;
			} 
			else
			{
				$personNum = 1;
			}

			if ($i % 2 == 0) 
			{
				$isAuction = true;
				$auctionPrice = 100 * $i;
				$auctionDeadline = "2015-04-12";
			}
			else 
			{
				$isAuction = false;
				$auctionPrice = 100 * $i;
				$auctionDeadline = "2015-04-12";
			}

			Task::create([
				"title" => "task-" . $i,
				"user_id" => 1,
				"price" => $auctionPrice,
				"isAuction" => $isAuction,
				"personNum" => $personNum,
				"auctionPrice" => $auctionPrice,
				"auctionDeadline" => $auctionDeadline,
				"description" => "xxxxxx",
				"files" => $i . ".png," . ($i+1) . ".png"
			]);
		}
	}
}