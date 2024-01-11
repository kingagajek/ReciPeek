<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "users" WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['login'],
            $user['email'],
            $user['password'],
        );
    }

    public function addUser(User $user): void
    {
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT);

        $stmt = $this->database->connect()->prepare('
        INSERT INTO "users" (email, password, created_at, login)
        VALUES (?, ?, ?, ?)
    ');
        $date = new DateTime();
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $date->format('Y-m-d H:i:s'),
            $user->getLogin()
        ]);
    }
}