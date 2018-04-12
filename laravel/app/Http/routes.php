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
Route::get('/Admin/Login','Admin\Login\LoginController@index');
Route::post('/Admin/Login/getLogin','Admin\Login\LoginController@getLogin');
//用户路由
// Route::resource('/user','Admin\UserController');
//分类路由
// Route::resource('/Admin/Sort','Admin\Sort\SortController');


// 路由组设置 对一组路由进行统一的管理
Route::group(['middleware'=>'login'],function(){
	// Route::resource('/Admin/user','Admin\UserController');

	//后台首页路由
    Route::get('/Admin/Index/Index','Admin\Index\IndexController@index');
    //后台分类路由
    Route::resource('/Admin/Sort','Admin\Sort\SortController');

});