<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>文章编辑</h2>
	<form action="{{url('/article/update/'.$res->a_id)}}" method="post" enctype="multipart/form-data">
@csrf
		<table border>
			<tr>
				<td>文章标题</td>
				<td><input type="text" name="a_title" value="{{$res->a_title}}"></td>
			</tr>
			<tr>
				<td>文章分类</td>
				<td>
					<select name="a_type">
						<!-- <option>--请选择--</option> -->
						<option vlaue="">娱乐</option>
						<option vlaue="">小说</option>
						<option vlaue="">文言</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>文章重要性</td>
				<td>
					<input type="radio" name="import" value="1" @if($res->import==1) checked @endif>普通
					<input type="radio" name="import" value="2" @if($res->import==2) checked @endif>置顶
				</td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="is_show" value="1" @if($res->is_show==1) checked @endif>显示
					<input type="radio" name="is_show" value="2" @if($res->is_show==2) checked @endif>不显示
				</td>
			</tr>
			<tr>
				<td>文章作者</td>
				<td><input type="text" name="writer" value="{{$res->writer}}"></td>
			</tr>
			<tr>
				<td>作者email</td>
				<td><input type="text" name="email" value="{{$res->email}}"></td>
			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="keywords" value="{{$res->keywords}}"></td>
			</tr>
			<tr>
				<td>网页描述</td>
				<td>
					<textarea name="desc" cols="26" rows="8" >{{$res->desc}}</textarea>
				</td>
			</tr>
			<tr>
				<td>上传文件</td>
				<td>
					<img src="{{env('UPLOAD_URL')}}{{$res->img}}" width="100" height="50">
					<input type="file" name="img" ></td>
			</tr>
			<tr>
				<td><input type="submit" value="修改"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>