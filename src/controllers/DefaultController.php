<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function welcome() {
        $this->render('welcome');
    }
    
    public function result() {
        $this->render('result');
    }

    public function editProfile() {
        $this->render('edit-profile');
    }

}