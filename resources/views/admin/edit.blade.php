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
	<center><h3>管理员修改</h3></center>
<form class="form-horizontal" role="form" action="{{url('/admin/update/'.$res->uid)}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名字</label>
		<div class="col-sm-10">
			<input type="text" name="username" class="form-control" id="firstname" 
				   placeholder="请输入名字" value={{$res->username}}>
				   <b style="color:red">{{$errors->first('username')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员手机号</label>
		<div class="col-sm-10">
			<input type="text" name="tel" class="form-control" id="lastname" value={{$res->tel}} placeholder="请输入手机号">
				   <b style="color:red">{{$errors->first('tel')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员邮箱</label>
		<div class="col-sm-10">
			<input type="text" name="email" class="form-control" id="lastname" value={{$res->email}} placeholder="请输入邮箱" >
				   <b style="color:red">{{$errors->first('email')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员头像</label>
		<div class="col-sm-10">
			<img src="{{env('UPLOAD_URL')}}{{$res->img}}" width="100" height="50">
			<input type="file" name="img" class="form-control" id="lastname">
		</div>
	</div>
			<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">管理员修改</button>
		</div>
	</div>
</form>

</body>
</html>