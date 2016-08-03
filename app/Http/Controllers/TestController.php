<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
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
    	echo $request->input('uname').'<br>';
        //设置默认值   相当于 ?  :  三元运算符
        echo  $request->input('uname','morenzhi');
        // echo $a.'<br>';
        var_dump($request->has('uname'));//检测值是否存在
        //提取所有参数
        var_dump($request->all());
        //提取部分参数   only   except除去谁
        var_dump($request->only('uname','pwd'));
        var_dump($request->except('_token'));
        //---------------------------------- 闪存   只闪存一次, 闪存到  session 中--------
        // 开启闪存 flash() 闪存全部  flashOnly 只闪存谁   flashExcept   除了谁都闪存
        // $request->flashExcept('pwd');
        // if($request->input('uname') != 'admin'){
        //     return back();
        // }
        //闪存的简便实用 return back()->withInput();

        //-------------------------------------- 文件上传 -----------------
        // $request->hasFile('photo') 检测是否有文件上传  
        //使用$request->hasFile('photo')->isValid()方法判断文件在上传过程中是否出错：
        //$request->file('photo')->move('./uploads/', 'iloveyou.jpg'); 将文件上传到指定位置
        if($request->hasfile('pic')){
            
            // var_dump($request->hasFile('photo')->isValid());
            /*
                'pic' => 
                    object(Symfony\Component\HttpFoundation\File\UploadedFile)[30]
                      private 'test' => boolean false
                      private 'originalName' => string 'B2C网站构架全景图.jpg' (length=28)
                      private 'mimeType' => string 'image/jpeg' (length=10)
                      private 'size' => int 501234
                      private 'error' => int 0
                      private 'pathName' (SplFileInfo) => string 'F:\worktools\wamp\tmp\php5C4D.tmp' (length=33)
                      private 'fileName' (SplFileInfo) => string 'php5C4D.tmp' (length=11)
                都是私有属性
            */
            // echo $request->except('_token')['pic']->size;
           // 获取文件的后缀名 
                $hz = '.'.$request->file('pic')->getClientOriginalExtension();
            echo $request->file('pic')->getClientOriginalExtension().'<br>';
             // 获取文件的 mime  类型
            echo $request->file('pic')->getClientMimeType().'<br>';
            // 获取文件的 mime  大小
            echo $request->file('pic')->getClientSize().'<br>';
            // 随机文件名
            
            // echo $filename;
            //移动文件到指定目录
            do{
                $filename = date('YmdHis',time()).rand(10000,99999).$hz;
            }while(file_exists('./uploads/'.$filename));
            $request->file('pic')->move('./uploads',$filename);
        }
    }   


    //用户删除操作
    public function del($id){
    	echo $id;
    }
    //获取 cookie
    public function cookie(Request $request){
        echo $request->cookie('uid');
    }
    /**
     * 响应 response
     */
    public function responseText(){
        // echo 'aaa';
        //响应模板
        // return view('user.add');// /views/user/add.blade.php
        //返回一个 json 格式的数据
        // return response()->json(['a'=>'aaa','b'=>'bb']);
        //下载文件
        //response()->download('config.app');
        //页面跳转
        //return redirect('goods/add');
    }
    public function shitu(){
        //分配数据到模板  //数据放在数组中 
        // return view('user.shitu',[
        //     'name'=>'admin',
        //     'title'=>'CXS 小队'
        // ]);
        /*return view('user.zhanwei01',[
                'age'=>'20'
            ]);*/
        // 数据库操作  一般使用  需要写完整的 语句
        $res = DB::select('select id,name from user');
        //::update  insert delete  都需要些完整语句   
        //一般语句   删除表操作  drop

        //--------------- 查询构造器 --------------
        $res = DB::table('user')->get();//获取全部
        $res = DB::table('user')->first();//获取第一条数据
        $res = DB::table('user')->value('name');//获取单条数据的一个字段
        $res = DB::table('user')->lists('money');//获取单条数据的一列字段
        //增删改操作的 条件  总是 放在动作的后面
        $res = DB::table('user')->where('id','=',24)->delete();
        $res = DB::table('user')->limit(5)->get();
        $res = DB::table('user')->orderBy('money','desc')->limit(5)->get();
        $res = DB::table('user')->count();//获取数据总数
        $res = DB::table('user')->select('id','name','money')->get();//按指定字段查找
        //beteen and = whereBetween  in   whereIn
        $res = DB::table('user')->whereBetween('id',[1,6])->get();
        /*$res = DB::table('user')->where(function($query){
            $query->where('id','>',10)
                  ->where('money','>',20000); 
        });*/
        $res = DB::table('user')->where('id','>',10)->where('money','>',10000)->get(); 
        dd($res);
        

    }
}
