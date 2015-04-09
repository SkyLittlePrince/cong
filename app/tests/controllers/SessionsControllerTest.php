<?php

# app/tests/controllers/SessionsControllerTest.php

class SessionsControllerTest extends TestCase {

    public function testGetLogin()
    {
        $this->client->request('GET', 'login');
        $this->assertResponseOk();
    }
}