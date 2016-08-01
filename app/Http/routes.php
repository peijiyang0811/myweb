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
//路由别名
Route::get('/admin/user/add',[
	'as'=>'uadd',
	'uses'=>function(){
		// echo Route::CurrentRouteName();当前路由名称   指的是路由别名
		echo '用户添加界面';
	},
]);
/*Route::get('test',function(){
	// echo route('uadd');//使用 路由别名 的路径
	//重定向路由
	return redirect()->route('uadd');
});*/
//路由组
Route::group([],function(){
	Route::get('/admin/add',function(){
		return view('add');
	});
	Route::post('/admin/insert',function(){
		echo '用户添加数据处理页面';
	});
});
//中间件设置  创建中间件  注册中间件  使用中间
Route::get('admin/delete',function(){
	echo '用户删除界面';
})->middleware('login');
/*中间件的使用
	Route::get('/',[
		'middleware'=>'login',
		'uses'=>function(){
			echo '中间件';
		}

	]);

	//路由组使用中间件
	Route::group(['middleware'=>'login'],function(){});

*/
	//404 页面
	Route::get('t1',function(){
		abort(404);//直接抛出 404页面
	});
/*控制器 controller  
	创建 php artisan make:contronller TestController   资源控制器 类中已经定义了一些方法
	创建 php artisan make:contronller TestController --plain  隐式控制器  类中是空的
	使用 
*/
//普通路由 访问 控制器     控制器名称   对应的方法
// Route::get('/user/add','TestController@add');
//带参数的 访问 
Route::get('/user/del/{id}','TestController@del')->where('id','\d+');
/*//设置路由控制器别名
Route::get('user/add',[
	'as'=>'uadd',
	'uses'=>'TestController@add',
]);*/
//使用控制器别名
Route::get('k1',function(){
	echo route('uadd');
});
//以上两种 一般不使用
//资源路由  Route::resource();
//隐式路由  在 控制方法前 要添加上  请求方式 ,驼峰命名法  getIdex
Route::controller('/user','TestController');//以 user 开头的 路径,都是用  TestController 控制器来控制