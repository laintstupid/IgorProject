<?php

declare(strict_types=1);

require 'queryBuilder.php';
require 'user.php';

final class userRepository
{
    private PDO $connection;
    private queryBuilder $qb;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=Mysql',  'root', '77143031');
        $this->qb = new queryBuilder($this->connection);
    }

    /**
     * @return user[]
     */
    public function getAll(): array
    {
        $users = $this->qb
            ->select('*')
            ->from('users')
            ->fetchAll();

        return array_map(
            static function(array $user): user {
                return new user(
                    $user['id'],
                    $user['email'],
                    $user['pass'],
                );
            },
            $users,
        );
    }
}