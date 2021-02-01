<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

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
    "/\/FraisVisiteur\/?(\d+)?\/?(\d+)?/" => ['visiteurController', 'detailsBill'],
    "/\/detailsVisiteur\/?(\d+)?/" => ['visiteurController', 'details'],
    "/\/deleteVisiteur\/?(\d+)?/" => ['visiteurController', 'delete'],
    "/\/register/" => ['RegisterController', 'index'],
    "/\/login/" => ['LoginController', 'index'],
    "/\/home\/?/" => ['HomeController', 'index'],
    "/\/?/" => ['HomeController', 'index'],
];

foreach ($routes as $route => $action) {

    $params = null;
    $elementsUrl = [];
    $elementsUrl = explode('/', $_SERVER["REQUEST_URI"]);

    $match = preg_match($route, $_SERVER["REQUEST_URI"], $params);

    if ($match > 0) {
        if (!empty($elementsUrl[2])) {
            if (!empty($elementsUrl[3])) {
                $params1 = $elementsUrl[2];
                $params2 = $elementsUrl[3];
                $controller = new $action[0];
                $controller->{$action[1]}($params1, $params2);
            } else {
                $params = $elementsUrl[2];
                $controller = new $action[0];
                $controller->{$action[1]}($params);
            }
        } else {
            $controller = new $action[0];
            $controller->{$action[1]}();
        }
        break;
    }
}
