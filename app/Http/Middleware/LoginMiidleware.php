<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //判断是否有某个值
        if($request->has('uname')){
            return $next($request);//继续执行下一步操作 
        }else{
            echo  '登陆界面';
        }
    }
    public function(){
        
    }
}
