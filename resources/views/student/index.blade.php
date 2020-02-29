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
<center><h3>展示学生表</h3></center>
<form>
	<input type="text" name="s_name" placeholder="请输入姓名" value="{{$s_name}}" >
	<input type="text" name="class" placeholder="请输入班级" value="{{$class}}">
	<input type="submit" value="搜索">
</form>
	<table class="table">
	<thead>
		<tr>
			<th>id</th>
			<th>姓名</th>
			<th>性别</th>
			<th>班级</th>
			<th>成绩</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
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
	</tbody>
</table>	
</body>
</html>

<script >
	//ajxj分页
	$(document).on('click','.pagination a',function(){
		var url=$(this).attr('href');
		if(!url){
			return;
		}
		$.get(url,function(result){
			$('tbody').html(result);
		})
		return false;
	})
</script>