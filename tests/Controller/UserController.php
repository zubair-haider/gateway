<?php
namespace App\Tests\Controller;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testLoginUser()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/login',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{"email":"test2@test.com","password":"test"}'
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
