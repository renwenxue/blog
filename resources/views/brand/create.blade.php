<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>品牌添加</h2>
	<form action="{{url('/brand/store')}}" method="post" enctype="multipart/form-data">
@csrf
		<table border>
			<tr>
				<td>品牌名称</td>
				<td><input type="text" name="b_name"></td>
			</tr>
			<tr>
				<td>品牌logo</td>
				<td><input type="file" name="b_logo"></td>
			</tr>
			<tr>
				<td>品牌网址</td>
				<td><input type="text" name="b_url"></td>
			</tr>
			<tr>
				<td>品牌介绍</td>
				<td>
					<textarea name="b_desc" cols="26" rows="8"></textarea>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="添加"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>