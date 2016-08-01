<!DOCTYPE html>
<html>
    <head>
<<<<<<< HEAD
        <title>用户添s加</title>
=======
        <title>用户添加</title>
>>>>>>> luyou
    </head>
    <body>
        <form action="{{ url('/user/insert') }}" method="post">
            {{csrf_field()}}
           用户名 <input type="text" name="uname"> <br><br>
           密码 <input type="password" name="pwd"> <br><br>
           <input type="submit" value="添加用户">
        </form>
    </body>
</html>
