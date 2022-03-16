<?php

declare(strict_types=1);

final class UserRepository
{
    private PDO $connection;
    private QueryBuilder $qb;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=Mysql', 'root', '77143031');
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
            static function (array $user): User {
                return new User(
                    $user['id'],
                    $user['email'],
                    $user['pass'],
                    $user['name']
                );
            },
            $users,
        );
    }

    public function getByEmail(string $email): ?User
    {
        $users = $this->qb
            ->select('*')
            ->from('users')
            ->where('email=:email')
            ->setParameter('email', $email)
            ->fetchAll();
        if (count($users) === 0) {
            return null;
        }
        return new User(
            $users[0]['id'],
            $users[0]['email'],
            $users[0]['pass'],
            $users[0]['name'],
        );
    }
}