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
	<center><h3>修改学生表</h3></center>

<form class="form-horizontal" role="form" action="{{url('/student/update/'.$res->s_id)}}" method="post">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生名字</label>
		<div class="col-sm-10">
			<input type="text" name="s_name" value="{{$res->s_name}}" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">学生性别</label>
		<input type="radio" name="s_sex" value="1" @if($res->s_sex==1) checked @endif>男
		<input type="radio" name="s_sex" value="2"  @if($res->s_sex==2) checked @endif>女
	</div>											
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">班级</label>
		<div class="col-sm-10">
			<input type="text" name="class" value="{{$res->class}}" class="form-control" id="lastname" 
				   placeholder="请输入班级">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">成绩</label>
		<div class="col-sm-10">
			<input type="text" name="result" value="{{$res->result}}" class="form-control" id="lastname" 
				   placeholder="请输入成绩">
		</div>
	</div>
			<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">学生修改</button>
		</div>
	</div>
</form>

</body>
</html>