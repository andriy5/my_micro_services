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

// TEST
// ⚠ without jwt verification ⚠
$router->get('/test/users',  ['uses' => 'MemberController@showAllMembers']);


// USER
// $router->post('/sign-in', ['uses' => 'MemberController@loginMember']);
$router->post('/sign-up', ['uses' => 'MemberController@registerMember']);

$router->post('/auth/login', ['uses' => 'AuthController@authenticate']);

// with jwt verification
$router->group(['middleware' => 'jwt.auth'], function() use ($router) {
    $router->get('users', function() {
        $users = \App\Models\Member::all();
        return response()->json($users);
    });
});


// MESSAGE
$router->get('/message', ['uses' => 'MessageController@showOne']);

$router->get('/messages', ['uses' => 'MessageController@showAll']);

$router->post('/message', ['uses' => 'MessageController@create']);

$router->put('/message', ['uses' => 'MessageController@update']);

$router->delete('/message', ['uses' => 'MessageController@delete']);
