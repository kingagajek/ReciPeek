<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('home', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('welcome', 'DefaultController');
Routing::get('result', 'DefaultController');
Routing::get('recipe', 'DefaultController');
Routing::run($path);

/*
$actions = explode("/", $path);

//var_dump($actions);



if($actions[0] === 'register') {
    //var_dump("login", __DIR__);
    include(__DIR__."/src/views/register.html");
}

if($actions[0] === 'dashboard') {
    var_dump("dashboard");
    include(__DIR__."/src/views/dashboard.html");
}

if($actions[0] === 'welcome') {
    include(__DIR__."/src/views/welcome.html");
}

if($actions[0] === 'home') {
    include(__DIR__."/src/views/home.html");
}

if($actions[0] === 'result') {
    include(__DIR__."/src/views/result.html");
}

if($actions[0] === 'recipe') {
    include(__DIR__."/src/views/recipe.html");
}*/