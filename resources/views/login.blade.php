<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<h2>登录页面</h2>
	
<b style="color:red">{{session('msg')}}</b>
	<form action="{{url('/login/logindo')}}" method="post">
@csrf
	<table border="1">
		用户名<input type="text" name="username"><br>
		密码  <input type="password" name="upwd"><br>
		<input type="submit" value="登录">
	</table>
	</form>

</body>
</html>