<?php
include "./autoload.php";
// use src\System\DatabaseConnector;
// use src\service\iServices;
// use src\service\DeviceService;
// use src\System\RequestMapping;
// use src\controller\RestController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$mt=$_SERVER['REQUEST_METHOD'];
$ur=$_SERVER['REQUEST_URI'];
$uri_data = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uri = explode( '/', $uri );
// $dbConnection = (new DatabaseConnector())->getConnection();

$post_data = file_get_contents('php://input');


$requestMethod = $_SERVER["REQUEST_METHOD"];
$rest = new RestController($requestMethod, $uri_data);
$rest->requestMapping();
