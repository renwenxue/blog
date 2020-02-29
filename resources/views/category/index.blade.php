<h2>商品分类列表</h2>
<table border="1">
	<tr>
		<td>分类id</td>
		<td>分类名称</td>
		<td>父级分类</td>
		<td>介绍</td>
		<td>操作</td>
	</tr>
	@foreach($cate as $k=>$v)
	<tr>
		<td>{{$v->cate_id}}</td>
		<td>{{str_repeat('——',$v->level)}}{{$v->cate_name}}</td>
		<td>{{$v->parent_id}}</td>
		<td>{{$v->desc}}</td>
		<td>
			<a href="{{url('/category/edit/'.$v->cate_id)}}">修改</a>|
			<a href="{{url('/category/destroy/'.$v->cate_id)}}">删除</a>

		</td>
	</tr>
	@endforeach
</table>