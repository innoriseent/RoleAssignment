<?php

$router = app()->router;

$router->group(['prefix' => 'v1', 'middleware' => 'auth', 'namespace' => 'Codeex\\RoleAssignment\\Http\\Controllers'], function () use ($router) {
    $router->group(['prefix' => 'ra'], function () use ($router) {
        $router->group(['prefix' => 'roles'], function () use ($router) {
            $router->get('/', 'RoleController@index');
        });
        $router->group(['prefix' => 'role'], function () use ($router) {
            $router->get('/', 'RoleController@get');
            $router->post('/', 'RoleController@create');
            $router->put('/', function () {
                dd("Start updating role");
            });
            $router->delete('/{role_code}', function () {
                dd("Start deleting role");
            });

        });
        $router->group(['prefix' => 'resources'], function () use ($router) {
            $router->get('/', 'ResourceController@index');
        });
        $router->group(['prefix' => 'resource'], function () use ($router) {
            $router->get('/', 'ResourceController@get');
            $router->post('/', 'ResourceController@create');
            $router->put('/', function () {
                dd("Start updating role");
            });
            $router->delete('/{role_code}', function () {
                dd("Start deleting role");
            });

        });
    });
});


