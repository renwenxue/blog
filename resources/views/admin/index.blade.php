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
<center><h3>管理员展示</h3></center>
	<table class="table">
	<thead>
		<tr>
			<th>id</th>
			<th>姓名</th>
			<th>手机号</th>
			<th>邮箱</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($res as $k=>$v)
		<tr>
			<td>{{$v->uid}}</td>
			<td>{{$v->username}}</td>
			<td>{{$v->tel}}</td>
			<td>{{$v->email}}</td>	
			<td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100" height="100"></td>
			<td>
				<a href="{{url('/admin/edit/'.$v->uid)}}" class="btn btn-success">修改</a>  |  
				<a href="{{url('/admin/destroy/'.$v->uid)}}" class="btn btn-warning">删除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>	
</body>
</html>