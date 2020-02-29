<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>品牌编辑</h2>
	<form action="{{url('/brand/update/'.$res->b_id)}}" method="post" enctype="multipart/form-data">
@csrf
		<table border>
			<tr>
				<td>品牌名称</td>
				<td><input type="text" name="b_name" value="{{$res->b_name}}"></td>
			</tr>
			<tr>
				<td>品牌logo</td>
				<td>
					<img src="{{env('UPLOAD_URL')}}{{$res->b_logo}}" width="50" height="50">
					<input type="file" name="b_logo" value="{{$res->b_logo}}"></td>
			</tr>
			<tr>
				<td>品牌网址</td>
				<td><input type="text" name="b_url" value="{{$res->b_url}}"></td>
			</tr>
			<tr>
				<td>品牌介绍</td>
				<td>
					<textarea name="b_desc" cols="26" rows="8">{{$res->b_desc}}</textarea>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="编辑"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>