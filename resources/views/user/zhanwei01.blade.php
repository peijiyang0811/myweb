<!-- 继承页面 -->
@extends('user.zhanwei')
@section('title','继承模板')
@section('conts')

     将模板中标示的  conts  ,内容更换.....哈哈 
    <p>  在 blade 模板引擎中  可以使用大部分的  php 函数 </p>
    <p> 现在的时间是: {{date('Y-m-d H:i:s',time())}} </p>
    {{$name or 'admin' }}
    { { ! ! 可以将 穿过来的 html 标签 解析 , 不使用 !! 就会输出正常字符串 不解析 html 标签 ! !} }

    <p>流程控制和循环结构</p>
    @if($age >25)
        年龄太大了
    @elseif($age<21 && $age > 18)
         刚刚好
    @else
         回家去吧
    @endif

    @for($i=0; $i < 10; $i++)
        {{$i}} &nbsp;
    @endfor

    @ foreach   @ endforeach
    
@endsection
