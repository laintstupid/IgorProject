<?php

declare(strict_types=1);

final class user
{
    private string $id;
    private string $email;
    private string $pass;

    public function __construct(string $id, string $email, string $pass)
    {
        $this->id = $id;
        $this->email = $email;
        $this->pass = $pass;
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
}