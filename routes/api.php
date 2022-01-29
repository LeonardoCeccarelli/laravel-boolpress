<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/posts", "Api\PostController@getAll");
Route::get("/posts/filtered", "Api\PostController@getFiltered");
Route::get("/posts/{id}", "Api\PostController@getSingle");

Route::get("/categories", "Api\CategoryController@getAll");
Route::get("/categories/{id}", "Api\CategoryController@getSingle");

// Route::group(['middleware' => 'auth:api'], function () {
//     Route::get("/user", "Api\UserController@getUser");
// });
