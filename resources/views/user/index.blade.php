<center>
<table border="1">
	<tr>
		<td>用户id</td>
		<td>用户名称</td>
		<td>用户身份</td>
		<td>操作</td>
	</tr>
	@foreach($res as $k=>$v)
	<tr>
		<td>{{$v->uid}}</td>
		<td>{{$v->name}}</td>
		<td>{{$v->status==1?'主管':'库管'}}</td>
		<td>
			<a href="{{url('user/edit/'.$v->uid)}}">编辑</a>|
			<a href="{{url('user/destroy/'.$v->uid)}}">删除</a>
		</td>
	</tr>
	@endforeach
</table>
</center>