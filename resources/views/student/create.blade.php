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
	<center><h3>添加学生表</h3></center>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/student/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生名字</label>
		<div class="col-sm-10">
			<input type="text" name="s_name" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				   <b style="color:red">{{$errors->first('s_name')}}</b>
		</div>
	</div>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">学生性别</label>
		<input type="radio" name="s_sex" value="1">男
		<input type="radio" name="s_sex" value="2" checked>女
		<b style="color:red">{{$errors->first('s_sex')}}</b>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">班级</label>
		<div class="col-sm-10">
			<input type="text" name="class" class="form-control" id="lastname" 
				   placeholder="请输入班级">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">成绩</label>
		<div class="col-sm-10">
			<input type="text" name="result" class="form-control" id="lastname" 
				   placeholder="请输入成绩">
				   <b style="color:red">{{$errors->first('result')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-10">
			<input type="file" name="s_img" class="form-control" id="lastname">
		</div>
	</div>
			<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">学生添加</button>
		</div>
	</div>
</form>

</body>
</html>