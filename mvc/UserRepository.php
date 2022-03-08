<?php

declare(strict_types=1);

require 'QueryBuilder.php';
require 'User.php';



final class UserRepository
{
    private PDO $connection;
    private QueryBuilder $qb;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=Mysql',  'root', '77143031');
        $this->qb = new QueryBuilder($this->connection);
    }

    /**
     * @return User[]
     */
    public function getAll(): array
    {
        $users = $this->qb
            ->select('*')
            ->from('users')
            ->fetchAll();

        return array_map(
            static function(array $user): User {
                return new User(
                    $user['id'],
                    $user['name'],
                    $user['bio'],
                    $user['birth'],
                );
            },
            $users,
        );
    }
}