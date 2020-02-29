<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<h1>库存管理后台</h1>
		<form action="{{url('/user/store')}}" method="post">
@csrf
		<table>
			<tr>
				<td>用户名称</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>用户身份</td>
				<td>
					<input type="radio" name="status" value="1" checked>主管
					<input type="radio" name="status" value="2">库管
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="添加"></td>
				<td></td>
			</tr>
		</table>
			
		</form>
	</center>
</body>
</html>