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
	<center><h3>添加新闻表</h3></center>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/news/store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻标题</label>
		<div class="col-sm-10">
			<input type="text" name="n_name" placeholder="请输入新闻标题">
				   <b style="color:red">{{$errors->first('s_name')}}</b>
		</div>
	</div>
		
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">新闻内容</label>
		<div class="col-sm-10">
			<textarea name="n_content"></textarea>
		</div>
	</div>
			<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>