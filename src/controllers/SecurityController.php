<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        session_start();
        $_SESSION['user_email'] = $email;
        $_SESSION['timeout'] = time() + 60;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/editProfile");
    }

    public function logout() {
        session_start();

        unset($_SESSION['user_email']);
        unset($_SESSION['timeout']);

        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = $_POST['login'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->render('register', ['messages' => ['Invalid email address!']]);
        }

        $sanitizedLogin = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');

        if ($this->userRepository->getUser($email)) {
            return $this->render('register', ['messages' => ['User with this email already exists!']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $user = new User($sanitizedLogin, $email, $hashedPassword);

        $this->userRepository->addUser($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
        exit;
    }

    public function editProfile() {
        session_start();

        if (isset($_SESSION['user_email']) && isset($_SESSION['timeout']) && $_SESSION['timeout'] > time()) {
            return $this->render('edit-profile');
        } else if (isset($_SESSION['timeout']) && $_SESSION['timeout'] <= time()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/logout");
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }
}