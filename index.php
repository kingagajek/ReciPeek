<?php

require 'Routing.php';

require_once 'Database.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('home', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('welcome', 'DefaultController');
Routing::get('result', 'DefaultController');
Routing::get('recipe', 'RecipeController');
Routing::post('login', 'SecurityController');
Routing::post('addRecipe', 'RecipeController');
Routing::post('search', 'RecipeController');
Routing::get('rate', 'RecipeController');

Routing::run($path);