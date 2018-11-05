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
//后台首页
Route::get('/admin','Admin\IndexController@index');
//后台登录
Route::get('/admin/login','Admin\LoginController@login');
//忘记密码
Route::get('/admin/login/forget','Admin\LoginController@forget');
//后台注册
Route::get('/admin/login/register','Admin\LoginController@register');
//后台用户管理
Route::resource('/admin/users','Admin\UsersController');
//后台分类管理
Route::resource('/admin/cate','Admin\Cate\CateController');
//后台文章管理
Route::resource('/admin/article','Admin\Article\ArticleController');