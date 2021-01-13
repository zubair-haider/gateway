<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserController extends ApiController
{
    private $client;
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function login(Request $request, HttpClientInterface $client)
    {
        $request = $this->transformJsonBody($request);
        $password = $request->get('password');
        $email = $request->get('email');

        $response = $client->request(
            'POST',
            "http://127.0.0.1:8001/login",
            [
                'json' => ['email' => $email, "password" => $password],
            ]
        );
        $data = $response->toArray();
        return $this->respondWithSuccess($data['success']);
    }

}
