<?php

use Illuminate\Http\Request;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use CloudCreativity\LaravelJsonApi\Routing\ApiGroup as Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::group(['middleware' => 'auth:api'], function () {
    JsonApi::register('default', ['namespace' => 'Api', 'as' => 'api.', 'middleware' => [\App\Http\Middleware\IpMiddleware::class]], function (Api $api, $router) {
        $router->resource('streams', 'StreamsController', ['only' => ['viewersCount']]);
        $api->resource('streams', ['only' => ['index']]);
        $router->get('streams/viewersCount', 'StreamsController@viewersCount');
    });
//});