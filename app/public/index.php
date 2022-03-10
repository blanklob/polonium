<?php

require './../vendor/autoload.php';

// use Firebase\JWT\JWT;
// use Firebase\JWT\Key;

// $key = "example_key";
// $payload = array(
//     "iss" => "user_id",
//     "iat" => 1356999524,
//     "name" => "manon"
// );

// $jwt = JWT::encode($payload, $key, 'HS256');
// $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

// print_r($jwt);
// print_r($decoded);

(new \App\Core\Route\Router())->getRoutesFromAnnotations('./../src/Controller')->run();