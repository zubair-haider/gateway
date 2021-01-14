<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AuthController extends ApiController
{
    public function login(Request $request, HttpClientInterface $client)
    {
        try {
            $request = $this->transformJsonBody($request);
            $password = $request->get('password');
            $email = $request->get('email');
            $url = $_ENV['AUTH_URL'] . "login";
            $response = $client->request(
                'POST',
                $url,
                [
                    'json' => ['email' => $email, "password" => $password],
                ]
            );
            $data = $response->toArray();
            return $this->respondWithSuccess($data['success']);
        } catch (\Exception $e) {
            return $this->respondValidationError($e->getMessage());
        }
    }

    public function register(Request $request, HttpClientInterface $client)
    {
        try {
            $request = $this->transformJsonBody($request);
            $password = $request->get('password');
            $email = $request->get('email');
            if (empty($password) || empty($email)) {
                return $this->respondValidationError("Invalid Password or Email");
            }
            $url = $_ENV['AUTH_URL'] . "register";
            $response = $client->request(
                'POST',
                $url,
                [
                    'json' => ['email' => $email, "password" => $password],
                ]
            );
            $data = $response->toArray();
            return $this->respondWithSuccess($data['success']);

        } catch (\Exception $e) {
            return $this->respondValidationError($e->getMessage());
        }
    }
}
