<?php

class User {
    private $id;
    private $login;
    private $email;
    private $password;

    public function __construct (string $login, string $email, string $password, int $id = null) {
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
