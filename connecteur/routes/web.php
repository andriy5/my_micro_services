<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// Connexion
$router->get('/connect', function() {
    $client = new \GuzzleHttp\Client();
    // $client = new \GuzzleHttp\Client([
    //     'curl' => [CURLOPT_SSL_VERIFYPEER => false]
    // ]);
    $response = $client->request('GET', 'http://localhost:8000/test/users', ['debug' => false]);

    // echo $response->getStatusCode(); // 200
    // echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
    echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

});
