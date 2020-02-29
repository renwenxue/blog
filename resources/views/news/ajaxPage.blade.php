@foreach($res as $k=>$v)
		<tr>
			<td>{{$v->n_id}}</td>
			<td>{{$v->n_name}}</td>
			<td>{{$v->n_content}}</td>
			<td><a href="#">删除</a></td>
		</tr>
		@endforeach
		<tr><td colspan="4">{{$res->links()}}</td></tr>