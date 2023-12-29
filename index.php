<?php

require 'Routing.php';

require_once 'Database.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('home', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('welcome', 'DefaultController');
Routing::get('result', 'DefaultController');
Routing::get('recipe', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addRecipe', 'RecipeController');

Routing::run($path);