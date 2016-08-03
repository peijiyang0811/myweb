@include('layout.head')
       <div style="width:100%;height:20px;background: #69f"></div>
       <div style="width:100%;height:320px;background: #ccc">
       	@section('conts')
           此处内容可以被更换    section('可悲更换的内容标示') show
       	@show
       </div>
       <div style="width:100%;height:20px;background: #6f9"></div>
@include('layout.foot')

