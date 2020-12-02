<?php

require 'vendor/autoload.php';

$url = $_SERVER["REQUEST_URI"];

if (!isset($_SESSION)) {
    session_start();
}

$routes = [
    "/\/logout/" => ['LogoutController', 'logout'],
    "/\/ajout\/?/" => ['AjoutController', 'index'],
    "/\/frais\/?/" => ['VisiteurController', 'index'],
    "/\/register/" => ['RegisterController', 'index'],
    "/\/login/" => ['LoginController', 'index'],
    "/\/home\/?/" => ['HomeController', 'index'],
    "/\/?/" => ['HomeController', 'index'],
];

foreach ($routes as $route => $action) {
    $match = preg_match($route, $url);
    if ($match == true) {
        $controller = new $action[0];
        $controller->{$action[1]}();
        break;
    }
}
