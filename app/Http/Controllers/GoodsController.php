<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //商品列表
    public function getIndex(){
    	echo '商品列表首页';
    }
    //商品添加页面
    public function getAdd(){
    	echo '商品添加页面';
    	return view('goodsAdd');
    }
    //商品添加到数据库的操作
    public function postInsert(Request $request){
    	echo '商品添加数据操作';
    	//所有请求头信息
    	var_dump($request->all());
    	//部分请求信息
    	var_dump($request->except('_token'));
    	var_dump($request->only('gname'));
    	var_dump($request->is('goods/*'));
    	var_dump($request->method());
    	//-------获取指定信息----------------
    	echo \Input::get('gname').'<br>';
    	echo $request->input('gname').'<br>';
    	// echo $request->input('gname','aaa');//设置默认值  ?  :  
    	//检测值是否存在  has
    	var_dump($request->has('gname'));
    	echo '<br>';
    	var_dump($request->only('dest'));
    	echo '<br>';
    	//------------------ 闪存 flash 只保存一次  保存在 session 中 ----------------------
    	// $request->flash();//闪存全部信息
   		// if($request->input('gname') != 'admin'){
   		// 	// return back();
   		// 	// 简便用法 
   		// 	return back()->withInput();
   		// }
   		//------------------- 文件操作 -----------------
   		if($request->hasFile('gpic')){
   			// echo 'aaa';
   			// $request->file('photo')->move('./uploads/', 'iloveyou.jpg');
   			/*
				限制上传文件的类型  获取 文件的后缀  getClientOriginalExtension() 
设置一个 文件后缀数组  in_array()
  				文件大小  getClientSize()
   			*/
   			$request->file('gpic')->move('./uploads','404.jpg');
   		}else{
   			//没上传文件
   			return back()->withInput();
   		}
    }
    //商品编辑页面
    public function getEdit(Request $request){
    	// Request $request
    	// echo '商品编辑页面'.$id;
    	echo $request->input('id',120);//设置默认值  ?  :  /edit/1111  显示的是默认值   不是 传递的值
    }
     //商品数据更新操作 
    public function postUpdate(){
    	echo '商品数据更新操作';
    }
    //商品删除操作
    public function getDel($id){
    	echo '商品删除页面'.$id;
    }

}
