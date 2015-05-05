<?php

class IndentTest extends TestCase {

    public function testCreateIndent()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

        $params = array(
        	"taskId" => 3
		);

		$crawler = $this->client->request('POST', '/indent/create', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals($this->client->getResponse()->getData()->newIndentId, 4);
    }

    public function testCancelIndent()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

		$this->testGetIndentInfo(1);

        $params = array(
        	"indentId" => 1
		);

		$crawler = $this->client->request('POST', '/indent/cancel', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals($this->client->getResponse()->getData()->message, "取消订单成功!");
    
		$this->testGetIndentNotExist(1);
    }

    public function testGetIndentInfo($indentId = 2)
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

    	$params = array(
			"indentId" => $indentId
		);

		$crawler = $this->client->request('GET', '/indent/get-info', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals($this->client->getResponse()->getData()->indent->id, $indentId);
    }

    public function testGetIndentNotExist($indentId = 9999)
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

  		$params = array(
			"indentId" => $indentId
		);

		$crawler = $this->client->request('GET', '/indent/get-info', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 1);
		$this->assertEquals($this->client->getResponse()->getData()->message, "订单未找到");
    }

    public function testGetMyIndents()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

  		$params = array();

		$crawler = $this->client->request('GET', '/indent/get-my-indents', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals(count($this->client->getResponse()->getData()->indents), 3);
    }
}



