<?php
	
class MessageTest extends TestCase {

    public function testCreateMessage()
    {
	    $user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

        $params = array(
			'title' => '题目4',
			'content' => '内容4',
			'type' => 0,
			'receiver' => 2
		);

		$crawler = $this->client->request('POST', '/message/create', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
    }

    public function testGetMessageContent()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

    	$params = array(
            'messageId' => 1
        );
 
        $crawler = $this->client->request('GET', '/message/get', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals($this->client->getResponse()->getData()->message->title, "题目1");
		$this->assertEquals($this->client->getResponse()->getData()->message->content, "内容1");
		$this->assertEquals($this->client->getResponse()->getData()->message->type, 0);
		$this->assertEquals($this->client->getResponse()->getData()->message->status, 0);
		$this->assertEquals($this->client->getResponse()->getData()->message->sender, 2);
		$this->assertEquals($this->client->getResponse()->getData()->message->receiver, 1);
    }

    public function testReadMessage()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

        $params = array(
			'messageId' => 2,
			'status' => 1
		);

		$crawler = $this->client->request('POST', '/message/read', $params);
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
    }

    public function testDeleteMessage()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

        $params = array(
			'messageId' => 2
		);

		$crawler = $this->client->request('POST', '/message/delete', $params);
		
		$this->testGetMyMessages(2, 1);
    }

    public function testGetMyMessages($num = 2, $userid = 1)
    {
    	$user = Sentry::findUserById($userid); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

	    $crawler = $this->client->request('GET', '/message/get-my-messages', array());
		$this->assertResponseOk();
		$this->assertEquals($this->client->getResponse()->getData()->errCode, 0);
		$this->assertEquals(count($this->client->getResponse()->getData()->messagesList), $num);
    }

    public function testClearMessage()
    {
    	$user = Sentry::findUserById(1); // 通过 user id 查找用户
	    Sentry::login($user, false);	// 登录用户

        $params = array();

		$crawler = $this->client->request('POST', '/message/clear', $params);

		$this->testGetMyMessages(0);
    }
}