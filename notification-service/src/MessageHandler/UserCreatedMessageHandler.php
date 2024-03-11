<?php

namespace App\MessageHandler;

use Psr\Log\LoggerInterface;
use App\Message\UserCreatedMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class UserCreatedMessageHandler
{

    public function __construct(private LoggerInterface $logger)
    {
    }


    #[AsMessageHandler]
    public function __invoke(UserCreatedMessage $message)
    {
        dump($message->getUser());
        $this->logger->info('Handling User Created Message', get_object_vars($message->getUser()));

        dump('Sending notification for UserCreatedMessage', $message);
    }
}
