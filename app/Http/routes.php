<?php
use App\Admin\Wzkg;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//前台首页
Route::get('/','Home\IndexController@index');
//后台首页
Route::get('/admin','Admin\IndexController@index');
//后台登录
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/login/ratio','Admin\LoginController@ratio');
//忘记密码
Route::get('/admin/login/forget','Admin\LoginController@forget');

Route::group([],function(){
	//后台用户管理
	Route::resource('/admin/users','Admin\UsersController');
	Route::resource('/admin/password','Admin\PasswordController');
	//后台分类管理
	Route::resource('/admin/cate','Admin\Cate\CateController');
	//后台文章管理
	Route::resource('/admin/article','Admin\Article\ArticleController');
	//后台轮播图管理
	Route::resource('/admin/broadcast','Admin\Broadcast\BroadcastController');
	//后台评论管理
	Route::resource('/admin/evaluate','Admin\Evaluate\EvaluateController');
	//后台网站设置
	Route::resource('/admin/wzsz','Admin\Wzsz\WzszController');
	Route::post('/admin/wzsz/store1','Admin\Wzsz\WzszController@store1');
	//后台公告管理
	Route::resource('/admin/notice','Admin\Notice\NoticeController');
	//后台友情链接
	Route::resource('/admin/link','Admin\Link\LinkController');
	///后台回收站
	Route::resource('/admin/recovery','Admin\Recovery\RecoveryController');
	Route::get('/admin/recovery/delete/{id}','Admin\Recovery\RecoveryController@delete');
	Route::get('/admin/recovery/huifu/{id}','Admin\Recovery\RecoveryController@huifu');
});
//前台首页
$wzkg = Wzkg::find(1);
if($wzkg['kg'] == 1){
	Route::get('/','Home\IndexController@index');
}else{
	Route::get('/','Home\IndexController@modify');
}