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
        $_SESSION['user_id'] = $user->getId();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function logout() {
        session_start();

        unset($_SESSION['user_email']);
        unset($_SESSION['user_id']);

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

    public function editProfile()
    {
        session_start();

        if (!$this->isPost()) {
            if (isset($_SESSION['user_email'])) {
                return $this->render('edit-profile', ['user' => $this->userRepository->getUser($_SESSION['user_email'])]);
            } else if (isset($_SESSION['timeout']) && $_SESSION['timeout'] <= time()) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/logout");
            } else {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/welcome");
            }
        } else {
            $user_id = $_SESSION['user_id'];
            $email = $_POST['email'];
            $password = $_POST['currentPassword'];
            $new_password = $_POST['password'] ?? null;
            $confirm_new_password = $_POST['confirmedPassword'] ?? null;
            $login = $_POST['login'] ?? null;
            $user = $this->userRepository->getUserById($user_id);

            if (!isset($email) || !$email) {
                return $this->render('edit-profile', ['user' => $this->userRepository->getUserById($_SESSION['user_id']), 'messages' => 'Email is required!']);
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->render('edit-profile', ['user' => $this->userRepository->getUserById($_SESSION['user_id']), 'messages' => 'Invalid email address!']);
            }

            if (!isset($password) || !$password) {
                return $this->render('edit-profile', ['user' => $this->userRepository->getUserById($_SESSION['user_id']), 'messages' => 'Password is required!']);
            }

            if (!password_verify($password, $user->getPassword())) {
                return $this->render('edit-profile', ['user' => $this->userRepository->getUserById($_SESSION['user_id']), 'messages' => 'Wrong password!']);
            }

            if (isset($new_password) && isset($confirm_new_password) && $new_password !== $confirm_new_password) {
                return $this->render('edit-profile', ['user' => $this->userRepository->getUserById($_SESSION['user_id']), 'messages' => 'Passwords do not match!']);
            }

            if (!$user) {
                return $this->render('edit-profile', ['user' => $this->userRepository->getUserById($_SESSION['user_id']), 'messages' => 'Something went wrong!']);
            }

            $message = $this->userRepository->editUserData($user, $email, $new_password, $login) ? 'Profile updated successfully!' : 'Something went wrong, please try again.';
            return $this->render('edit-profile', ['messages' => $message, 'user' => $this->userRepository->getUserById($_SESSION['user_id'])]);
        }
    }
}