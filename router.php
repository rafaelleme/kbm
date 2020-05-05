<?php

use Config\Router\Router;

$router = new Router('\\App\\');

$router->post('/login', 'Login\\LoginController@index');

$router->get('/users', 'User\\UserController@index');
$router->get('/users/{user}', 'User\\UserController@show');
$router->put('/users/{user}', 'User\\UserController@update');
$router->post('/users', 'User\\UserController@store');
$router->delete('/users/{user}', 'User\\UserController@destroy');

$router->get('/clients', 'Client\\ClientController@index');
$router->get('/clients/{client}', 'Client\\ClientController@show');
$router->post('/clients', 'Client\\ClientController@store');
$router->put('/clients/{client}', 'Client\\ClientController@update');
$router->delete('/clients/{client}', 'Client\\ClientController@destroy');

try {
    $router->run();
} catch (\Exception $e) {
    header('Content-Type: text/html; charset=utf-8;');
   	http_response_code($e->getCode());
    echo "<div style='top: 45%; left: 45%; position: absolute; font-family: arial,serif;'>" . $e->getMessage() . "</div>";
}
