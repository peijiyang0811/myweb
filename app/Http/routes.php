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
Route::get('/test/aa',function(){
	echo '第一个框架';
});
Route::post('/post',function(){
	// post请求 表单中的必须添加 _token ,因为 laravel 框架 默认会有 csrf 保护,
});
//带单一参数的路由
Route::get('/canshu/{id}',function($id){
	echo $id;
});
//多个参数的路由
Route::get('duoluyou/{name}-{id}',function($name, $id){
	echo $name.$id;
});
//限制 多个参数的类型
Route::get('xianzhi/{id}-{name}',function($id, $name){
	echo $id;
})->where(['id'=>'\d+','name'=>'\w+']);
//多参数限制
