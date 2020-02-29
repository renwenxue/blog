<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<h1>库存管理后台修改</h1>
		<form action="{{url('/user/update/'.$res->uid)}}" method="post">
@csrf
		<table>
			<tr>
				<td>用户名称</td>
				<td><input type="text" name="name" value="{{$res->name}}"></td>
			</tr>
			<tr>
				<td>用户身份</td>
				<td>
					<input type="radio" name="status" value="1" @if($res->status==1) checked @endif>主管
					<input type="radio" name="status" value="2" @if($res->status==2) checked @endif>库管
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="修改"></td>
				<td></td>
			</tr>
		</table>
			
		</form>
	</center>
</body>
</html>