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
            $user['id']
        );
    }

    public function getUserById(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "users" WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['login'],
            $user['email'],
            $user['password'],
            $user['id']
        );
    }

    public function addUser(User $user): void
    {
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

    public function editUserData(User $user, $email, $password, $login): bool {
        $user_id = $user->getId();

        $stmt = $this->database->connect()->prepare("
            UPDATE users SET email=?, password=?, login=? WHERE id = ".$user_id."
        ");

        return $stmt->execute([
            $email ?: $user->getEmail(),
            $password ? password_hash($password, PASSWORD_BCRYPT) : $user->getPassword(),
            $login ? htmlspecialchars($login, ENT_QUOTES, 'UTF-8') : $user->getLogin()
        ]);
    }
}