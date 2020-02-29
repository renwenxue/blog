@foreach($res as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="danger" @endif>
			<td>{{$v->s_id}}</td>
			<td>{{$v->s_name}}</td>
			<td>{{$v->s_sex==1?'男':'女'}}</td>
			<td>{{$v->class}}</td>
			<td>{{$v->result}}</td>	
			<td>@if($v->s_img)<img src="{{env('UPLOAD_URL')}}{{$v->s_img}}" width="100" height="50">
				@endif</td>		
			<td>
				<a href="{{url('/student/edit/'.$v->s_id)}}" class="btn btn-success">修改</a>  |  
				<a href="{{url('/student/destroy/'.$v->s_id)}}" class="btn btn-warning">删除</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="4">{{$res->appends(['s_name'=>$s_name,'class'=>$class])->links()}}</td>
		</tr>