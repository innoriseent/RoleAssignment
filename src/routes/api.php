<?php

$router = app()->router;

$router->get("module/check", ['middleware' => 'auth', function (\Illuminate\Http\Request $request){
    dd("Hello from package",$request);
}]);
