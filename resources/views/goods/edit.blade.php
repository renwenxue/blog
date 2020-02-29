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
		<h2>商品的修改</h2>
<form action="{{url('/goods/update/'.$res->g_id)}}" method="post" enctype="multipart/form-data">
@csrf
	<table >
		<tr>
			<td>商品名称</td>
			<td><input type="text" name="g_name" value={{$res->g_name}}></td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="g_price" value={{$res->g_price}}></td>
		</tr>
		<tr>
			<td>商品图片</td>
			<td>
				<img src="{{env('UPLOAD_URL')}}{{$res->g_img}}" width="50" height="50">
				<input type="file" name="g_img" ></td>
		</tr>
		<tr>
			<td>商品库存</td>
			<td><input type="text" name="g_num" value={{$res->g_num}}></td>
		</tr>
		<tr>
			<td>是否精品</td>
			<td>
				<input type="radio" name="is_new" value="1"  @if($res->is_new==1) checked @endif>是
				<input type="radio" name="is_new" value="2"  @if($res->is_new==2) checked @endif>否
			</td>
		</tr>
		<tr>
			<td>是否热卖</td>
			<td>
				<input type="radio" name="is_hot" value="1" @if($res->is_hot==1) checked @endif>否
				<input type="radio" name="is_hot" value="2" @if($res->is_hot==2) checked @endif>否
			</td>
		</tr>
		<tr>
			<td>商品分类</td>
			<td>
				<select name="cate_id">
					<option value="">--请选择--</option>
					@foreach($category as $k=>$v)
					<option value="{{$v->cate_id}}" @if($v->cate_id==$res->cate_id) selected @endif>{{str_repeat('——',$v->level)}}{{$v->cate_name}}</option>
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
					<option value="{{$v->b_id}}" @if($v->b_id==$res->b_id) selected @endif>{{$v->b_name}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>商品内容</td>
			<td>
				<textarea name="g_content" rows="5" clos="15">{{$res->g_content}}</textarea>
			</td>
		</tr>
		<tr>
			<td>商品多文件</td>
			<td>
				@if($res->g_imgs)
				@php $g_imgs=explode('|',$res->g_imgs);@endphp
				<!-- @php var_dump($g_imgs)@endphp -->
				@foreach($g_imgs as $vv)
				<img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50" height="50">
				@endforeach
				@endif
				<input type="file" name="g_imgs[]" multiple="multiple"></td>
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