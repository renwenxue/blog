

<h2>文章展示</h2>
<form>
	<input type="text" name="a_title" placeholder="文章标题" value="{{$a_title}}">
	<select name="a_type" value="{{$a_type}}">
						<option value="">--请选择--</option>
						<option>娱乐</option>
						<option>小说</option>
						<option>文言</option>
	</select>
	<input type="submit" value="搜索">
</form>
<table border=1>
	<tr>
		<td>文章id</td>
		<td>文章标题</td>
		<td>文章分类</td>
		<td>文章重要性</td>
		<td>是否显示</td>
		<td>作者</td>
		<td>图片</td>
		<td>添加日期</td>
		<td>操作</td>
	</tr>
		@foreach($res as $k=>$v)
	<tr>
		<td>{{$v->a_id}}</td>
		<td>{{$v->a_title}}</td>
		<td>{{$v->a_type}}</td>
		<td>{{$v->import==1?'普通':'置顶'}}</td>
		<td>{{$v->is_show==1?'√':'×'}}</td>
		<td>{{$v->writer}}</td>
		<td>@if($v->img)<img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100" height="50">
				@endif</td>
		<td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
		<td><a href="{{url('/article/edit/'.$v->a_id)}}" class="btn btn-success">修改</a>  |  
			<a href="{{url('/article/destroy/'.$v->a_id)}}" class="btn btn-warning">删除</a>
		</td>
	</tr>
	@endforeach

</table>
<tr><td colspan="4">{{$res->appends(['a_title'=>$a_title,'a_type'=>$a_type])->links()}}</td></tr>