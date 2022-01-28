<?php

require './../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = "example_key";
$payload = array(
    "iss" => "user_id",
    "iat" => 1356999524,
    "name" => "manon"
);

$jwt = JWT::encode($payload, $key, 'HS256');
$decoded = JWT::decode($jwt, new Key($key, 'HS256'));

// print_r($jwt);
// print_r($decoded);


(new \App\Core\Route\Router())->getRoutesFromAnnotations('./../src/Controller')->run();


//$p = $_SERVER["REQUEST_URI"];
//$d = str_replace('?' . $_SERVER['QUERY_STRING'], '', $p);
//var_dump($d);


//$path = explode('/', $_SERVER["REQUEST_URI"])[1] !== '' ? explode('/', $_SERVER["REQUEST_URI"])[1] : '/';
//
//switch ($path) {
//    case "/" :
//        $controller = new \App\Controller\PostController();
//        $controller->home();
//        break;
//    case "show" :
//        $controller = new \App\Controller\PostController();
//        $controller->show();
//        break;
//    default :
//        echo 'rien trouvé';
//}





