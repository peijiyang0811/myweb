<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
	//用户列表也
	public function getIndex(){
		echo '用户列表页';
	}
    //用户添加页面
    public function getAdd(){
    	return view('add');
    }

    //测试添加页面
    public function postInsert(Request $request){
    	// dd($request); // request 请求头信息的 对象
    	//获取 当前 路由
    	echo $request->path().'<br>';
    	//获取请求的绝对路由
    	echo $request->url().'<br>';
    	//检测路径  是否由  /user  过来的
    	// dd($request->is('user/*'));  //dd   =  var_dump + exit
    	//获取请求方法
    	echo $request->method().'<br>';
    	$fangfa = $request->method();
    	
    	//检测是否是什么方法请求的
    	// dd($request->isMethod('get'));
    	//获取指定类型的参数
    	// echo \Input::get('uname');  //此处必须是  get   是获取的意思   不是请求方式
    	//--------------------------- 基本信息的获取 ---------------------
    	//获取指定字段
    	echo $request->input('uname');
    }


    //用户删除操作
    public function del($id){
    	echo $id;
    }
}
