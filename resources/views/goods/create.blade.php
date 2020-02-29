<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
		<h2>商品的添加</h2>
<form action="{{url('/goods/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<table >
		<tr>
			<td>商品名称</td>
			<td><input type="text" name="g_name"></td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="g_price"></td>
		</tr>
		<tr>
			<td>商品图片</td>
			<td><input type="file" name="g_img"></td>
		</tr>
		<tr>
			<td>商品库存</td>
			<td><input type="text" name="g_num"></td>
		</tr>
		<tr>
			<td>是否精品</td>
			<td>
				<input type="radio" name="is_new" value="1" checked>是
				<input type="radio" name="is_new" value="2" >否
			</td>
		</tr>
		<tr>
			<td>是否热卖</td>
			<td>
				<input type="radio" name="is_hot" value="1" checked>是
				<input type="radio" name="is_hot" value="2" >否
			</td>
		</tr>
		<tr>
			<td>商品分类</td>
			<td>
				<select name="cate_id">
					<option value="">--请选择--</option>
					@foreach($category as $k=>$v)
					<option value="{{$v->cate_id}}">{{str_repeat('——',$v->level)}}{{$v->cate_name}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>商品品牌</td>
			<td>
				<select name="b_id">
					<option value="">--请选择--</option>
					@foreach($brand as $k=>$v)
					<option value="{{$v->b_id}}">{{$v->b_name}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>商品内容</td>
			<td>
				<textarea name="g_content" rows="5" clos="15"></textarea>
			</td>
		</tr>
		<tr>
			<td>商品多文件</td>
			<td><input type="file" name="g_imgs[]" multiple="multiple"></td>
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