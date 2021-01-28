<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$uri = $_SERVER["REQUEST_URI"];
$url = new Url();
$app = new App($url->getUrlInfo()[0]);


if (!isset($_SESSION)) {
    session_start();
}

$routes = [
    "/\/logout/" => ['LogoutController', 'logout'],
    "/\/ajout\/?/" => ['AjoutController', 'index'],
    "/\/detailsFrais\/?/" => ['FraisController', 'index'],
    "/\/frais\/?/" => ['VisiteurController', 'index'],
    "/\/gestionVisiteur\/?/" => ['visiteurController', 'gestion'],
    "/\/detailsVisiteur\/?(\d+)?/" => ['visiteurController', 'details'],
    "/\/register/" => ['RegisterController', 'index'],
    "/\/login/" => ['LoginController', 'index'],
    "/\/home\/?/" => ['HomeController', 'index'],
    "/\/?/" => ['HomeController', 'index'],
];

foreach ($routes as $route => $action) {

    $params = null;
    $elementsUrl = [];
    $elementsUrl = explode('/', $uri);
    
    $match = preg_match($route, $uri, $params);

    
    if ($match >0) {
        if (!empty($elementsUrl[2])) {
            $params = $elementsUrl[2];
            $controller = new $action[0];
            $controller->{$action[1]}($params);
        } else {
            $controller = new $action[0];
            $controller->{$action[1]}();
        }
        break;
    }
}
