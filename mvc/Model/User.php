<?php

declare(strict_types=1);

final class User
{
    private string $id;
    private string $email;
    private string $pass;
    private string $name;

    public function __construct(string $id, string $email, string $pass, string $name)
    {
        $this->id = $id;
        $this->email = $email;
        $this->pass = $pass;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function getName(): string
    {
        return $this->name;
    }
}