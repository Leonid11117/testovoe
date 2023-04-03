<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'lots', 'name' => 'lots'], static function (\Illuminate\Routing\Router $router) {
    $router->post('/', \App\Http\Controllers\Lots\CreateController::class);
    $router->get('/', \App\Http\Controllers\Lots\IndexController::class);
    $router->get('/{id}', \App\Http\Controllers\Lots\ViewController::class)->whereNumber('id');
    $router->put('/{id}', \App\Http\Controllers\Lots\UpdateController::class)->whereNumber('id');
    $router->delete('/{id}', \App\Http\Controllers\Lots\DeleteController::class)->whereNumber('id');
});

Route::group(['prefix' => 'categories', 'name' => 'categories'], static function (\Illuminate\Routing\Router $router) {
    $router->post('/', \App\Http\Controllers\Categories\CreateController::class);
    $router->get('/', \App\Http\Controllers\Categories\IndexController::class);
    $router->get('/{id}', \App\Http\Controllers\Categories\ViewController::class)->whereNumber('id');
    $router->put('/{id}', \App\Http\Controllers\Categories\UpdateController::class)->whereNumber('id');
    $router->delete('/{id}', \App\Http\Controllers\Categories\DeleteController::class)->whereNumber('id');
});
