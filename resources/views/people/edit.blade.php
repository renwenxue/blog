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
	<center><h3>修改外来人口</h3></center>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{url('/people/update/'.$res->p_id)}}" method="post">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">名字</label>
		<div class="col-sm-10">
			<input type="text" name="username" value="{{$res->username}}" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				   <b style="color:orange">{{$errors->first('username')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">年龄</label>
		<div class="col-sm-10">
			<input type="text" name="age" value="{{$res->age}}" class="form-control" id="lastname" 
				   placeholder="请输入年龄">
				   <b style="color:orange">{{$errors->first('age')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">身份证号</label>
		<div class="col-sm-10">
			<input type="text" name="card" value="{{$res->card}}" class="form-control" id="lastname" 
				   placeholder="请输入身份证号">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-10">
			<img src="{{env('UPLOAD_URL')}}{{$res->head}}" width="100" height="50">
			<input type="file" name="head" class="form-control">
		</div>
	</div>	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否湖北人</label>
		<input type="radio" name="is_hubei" value="1" @if($res->is_hubei==1) checked @endif>是
		<input type="radio" name="is_hubei" value="2" @if($res->is_hubei==2) checked @endif>否
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">编辑</button>
		</div>
	</div>
</form>

</body>
</html>