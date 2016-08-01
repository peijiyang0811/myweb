<!DOCTYPE html>
<html>
    <head>
        <title>用户添加</title>

    </head>
    <body>
        <form action="{{ url('/goods/insert') }}" method="post" enctype="multipart/form-data">
           {{csrf_field()}}
           商品名称 <input type="text" name="gname" value="{{ old('gname') }}"> <br><br>
           描述 <input type="text" name="dest" value="{{ old('dest') }}"> <br><br>
           缩略图: <input type="file" name="gpic" value="{{ old('gpic') }}"> <br><br>
           <input type="submit" value="添加商品">
        </form>
    </body>
</html>

