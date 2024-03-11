<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Request;
use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class UsersControllerTest extends ApiTestCase
{
    public function testCreateUser(): void
    {
        $client = self::createClient();

        $requestData = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
        ];


        $client->request('POST', '/users', ['json' => $requestData]);

        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);

        $this->assertSame('success', $responseData['status']);
        $this->assertSame('User created successfully', $responseData['message']);
    }

    public function testInvalidUserData(): void
    {
        $client = self::createClient();

        // Arrange: Invalid data (missing required fields)
        $requestData = [
            'firstName' => 'John',
        ];

        $client->request('POST', '/users', ['json' => $requestData]);
        $response = $client->getResponse();

        // Assert
        $this->assertSame(400, $response->getStatusCode());
    }
}
