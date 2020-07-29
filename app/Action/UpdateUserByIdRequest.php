<?php

declare(strict_types=1);

namespace App\Action;

class UpdateUserByIdRequest
{
    private int $id;
    private string $name;
    private string $email;
    private int $age;
    private ?string $password;
    private $avatar;

    public function __construct(
        int $id,
        string $name,
        string $email,
        int $age,
        ?string $password,
        $avatar
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->password = $password;
        $this->avatar = $avatar;
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
}
