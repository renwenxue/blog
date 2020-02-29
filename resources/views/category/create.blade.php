<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>商品分类添加</h2>
	<form action="{{url('/category/store')}}" method="post" enctype="multipart/form-data">
@csrf
		<table border>
			<tr>
				<td>分类名称</td>
				<td><input type="text" name="cate_name"></td>
			</tr>
			<tr>
				<td>父级分类</td>
				<td>
					<select name="parent_id">
						<option value="0">--请选择--</option>
						@foreach($cate as $k=>$v)
						<option value="{{$v->cate_id}}">{{str_repeat('——',$v->level)}}{{$v->cate_name}}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>分类介绍</td>
				<td>
					<textarea name="desc" cols="26" rows="8"></textarea>
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