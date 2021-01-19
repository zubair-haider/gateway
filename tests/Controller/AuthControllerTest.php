<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthControllerTest extends WebTestCase
{
    public function testRegisterUser()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/register',
            [],
            [],
            [],
            '{"email":"test4@test.com","password":"test"}'
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLoginUser()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/login',
            [],
            [],
            [],
            '{"email":"test2@test.com","password":"test"}'
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
