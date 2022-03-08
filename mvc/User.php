<?php

declare(strict_types=1);

final class User
{
    private string $id;
    private string $name;
    private string $bio;
    private string $birth;

    public function __construct(string $id, string $name, string $bio, string $birth)
    {
        $this->id = $id;
        $this->name = $name;
        $this->bio = $bio;
        $this->birth = $birth;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function getBirth(): string
    {
        return $this->birth;
    }
}