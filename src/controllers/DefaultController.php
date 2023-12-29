<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function home() {
        $this->render('home');
    }

    public function login() {
        //TODO display login.html
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function welcome() {
        $this->render('welcome');
    }
    
    public function result() {
        $this->render('result');
    }

    public function recipe() {
        //TODO display recipes.html
        $this->render('recipe');
    }

    public function add_recipe() {
        //TODO display recipes.html
        $this->render('add-recipe');
    }
}