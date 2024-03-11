<?php

namespace App\Message;

use App\Entity\User;

class UserCreatedMessage
{

    public function __construct(private User $user)
    {
    }

    public function getUser()
    {
    }
}
