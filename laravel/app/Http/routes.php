<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//登录路由
// Route::resource('/login','Admin\LoginController');
//用户路由
// Route::resource('/user','Admin\UserController');
//分类路由
Route::resource('/admin/sort','Admin\Sort\SortController');