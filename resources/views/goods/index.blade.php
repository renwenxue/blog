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
<center><h3>商品的展示</h3>
	<table class="table">
	<thead>
		<tr>
			<th>商品id</th>
			<th>商品名称</th>
			<th>商品价格</th>
			<th>商品图片</th>
			<th>商品库存</th>
			<th>是否精品</th>
			<th>是否热卖</th>
			<th>分类名称</th>
			<th>品牌名称</th>
			<th>商品内容</th>
			<th>商品多文件</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($goods as $k=>$v)
			<td>{{$v->g_id}}</td>
			<td>{{$v->g_name}}</td>
			<td>{{$v->g_price}}</td>
			<td>@if($v->g_img)<img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="50" height="50">@endif</td>
			<td>{{$v->g_num}}</td>
			<td>{{$v->is_new==1?'是':'否'}}</td>
			<td>{{$v->is_hot==1?'是':'否'}}</td>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->b_name}}</td>
			<td>{{$v->g_content}}</td>	
			<td>
				@if($v->g_imgs)
				@php $g_imgs=explode('|',$v->g_imgs);@endphp
				<!-- @php var_dump($g_imgs)@endphp -->
				@foreach($g_imgs as $vv)
				<img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50" height="50">
				@endforeach
				@endif
			</td>		
			<td>
				<a href="{{url('/goods/edit/'.$v->g_id)}}" class="btn btn-success">修改</a>  |  
				<a href="{{url('/goods/destroy/'.$v->g_id)}}" class="btn btn-warning">删除</a>|
				<a href="{{url('/goods/show/'.$v->g_id)}}" class="btn btn-success">加入详情页</a>
			</td>
		</tr>
		@endforeach
		<tr><td colspan="4">{{$goods->links()}}</td></tr>
	</tbody>
</table>	
</body>
</html>
</center>