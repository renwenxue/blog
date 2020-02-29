<table border=1>
	<tr>
		<td>品牌id</td>
		<td>品牌名称</td>
		<td>品牌logo</td>
		<td>品牌网址</td>
		<td>品牌介绍</td>
		<td>操作</td>
	</tr>
		@foreach($res as $k=>$v)
	<tr>
		<td>{{$v->b_id}}</td>
		<td>{{$v->b_name}}</td>
		<td><img src="{{env('UPLOAD_URL')}}{{$v->b_logo}}" width="60" height="60"></td>
		<td>{{$v->b_url}}</td>
		<td>{{$v->b_desc}}</td>
		<td><a href="{{url('/brand/edit/'.$v->b_id)}}" class="btn btn-success">修改</a>  |  
			<a href="{{url('/brand/destroy/'.$v->b_id)}}" class="btn btn-warning">删除</a>
		</td>
	</tr>
	@endforeach
</table>