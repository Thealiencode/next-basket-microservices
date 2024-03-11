<?php

namespace App\Controller;

use App\Entity\User;
use App\Message\UserCreatedMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    #[Route('/users', methods: ["POST"], name: 'create_user')]
    public function index(MessageBusInterface $messageBus, Request $request, ValidatorInterface $validator, LoggerInterface $logger): JsonResponse
    {
        // Extract user data from request
        $data = json_decode($request->getContent(), true);

        $user = new User;
        $user->setFirstName($data['firstName'] ?? '');
        $user->setLastName($data['lastName'] ?? '');
        $user->setEmail($data['email'] ?? '');

        $errors = $validator->validate($user);


        if (count($errors) > 0) {
            // Handle validation errors
            return $this->json(['status' => 'error', 'message' => 'Validation failed', 'errors' => $errors], 400);
        }


        // log the user 
        $logger->info('Handling UserCreatedMessage', get_object_vars($user));


        $userMessage = new UserCreatedMessage($user);

        $messageBus->dispatch($userMessage);


        return $this->json([
            'status'    => 'success',
            'message' => 'User created successfully',
        ]);
    }
}
