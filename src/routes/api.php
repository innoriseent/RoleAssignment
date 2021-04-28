<?php

$router = app()->router;

$router->get("module/check", ['middleware' => 'auth', function (\Illuminate\Http\Request $request){
    dd("Hello from package",$request);
}]);

$router->get("module/check2", ['middleware' => 'auth', function (\Illuminate\Http\Request $request){
    dd("This is another check from same place");
}]);
