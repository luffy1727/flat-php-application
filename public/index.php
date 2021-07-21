<?php

use Boozt\Controller\AnalyticController;

require "../bootstrap.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists('QUERY_STRING', $_SERVER)) {
    $paramsUri = $_SERVER['QUERY_STRING'];
    $params = explode( '&', $paramsUri);
    if (array_key_exists('0' , $params) && $params[0] == '') {
        $params = [];
    }
} else {
    $params = [];
}

$uri = explode( '/', $uri );

if ($uri[1] !== 'analytics' || ($uri[2] !== 'graph' && $uri[2] !== 'number')) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
$requestMethod = $_SERVER["REQUEST_METHOD"];
$controller = new AnalyticController($connection, $requestMethod, $uri[2], $params);
$controller->processRequest();