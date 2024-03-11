<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class User
{
    #[Assert\NotBlank]
    #[Assert\Email]
    protected string $email;

    #[Assert\NotBlank]
    protected string $firstName;

    #[Assert\NotBlank]
    protected string $lastName;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
