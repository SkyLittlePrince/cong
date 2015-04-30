<?php
	
class TaskTest extends TestCase {

    public function testCreateTask()
    {
	    $user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

        $params = array(
        	"title" => "task-11",
        	"price" => 700,
        	"deadline" => "2015-05-18",
        	"isAuction" => false,
        	"personNum" => -1,
        	"description" => "xxxx",
        	"files" => "a.jpg,b.jpg"
		);

		$crawler = $this->client->request('POST', '/task/create', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals($this->client->getResponse()->getData()->newTaskId, 11);
    }

    public function testCancelTask()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

	    $taskId = 1;

	    $this->testGetTask($taskId);

	    $params = array(
			"taskId" => $taskId
		);

		$crawler = $this->client->request('POST', '/task/cancel', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);

		$this->testGetTaskNotExist($taskId);
    }

    public function testGetTask($taskId = 2)
    {
    	$params = array(
			"taskId" => $taskId
		);

		$crawler = $this->client->request('GET', '/task/get-info', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals($this->client->getResponse()->getData()->task->id, $taskId);
    }

	public function testGetTaskNotExist($taskId = 200)
	{
		$params = array(
			"taskId" => $taskId
		);

		$crawler = $this->client->request('GET', '/task/get-info', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 1);
		$this->assertEquals($this->client->getResponse()->getData()->message, "任务不存在");
    }

	public function testGetMyTasks($userId = 1)
	{
		$params = array(
			"userId" => $userId
		);

		$crawler = $this->client->request('GET', '/task/get-published-tasks-by-user', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals(count($this->client->getResponse()->getData()->taskList), 10);
    }
}