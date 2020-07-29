<?php

declare(strict_types=1);

namespace App\Action;

class CreateUserRequest
{
    private string $name;
    private string $email;
    private int $age;
    private string $password;
    private $avatar;

    public function __construct(
        string $name,
        string $email,
        int $age,
        string $password,
        $avatar
    ) {
       $this->name = $name;
       $this->email = $email;
       $this->age = $age;
       $this->password = $password;
       $this->avatar = $avatar;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
}
