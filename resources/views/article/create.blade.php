<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="/static/js/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<h2>文章添加</h2>
	<form action="{{url('/article/store')}}" method="post" enctype="multipart/form-data">
@csrf
		<table border>
			<tr>
				<td>文章标题</td>
				<td><input type="text" name="a_title">
<b style="color:orange">{{$errors->first('a_title')}}</b>
				</td>
			</tr>
			<tr>
				<td>文章分类</td>
				<td>
					<select name="a_type">
						<option value="">--请选择--</option>
						<option>娱乐</option>
						<option>小说</option>
						<option>文言</option>
					</select>
					<b style="color:orange">{{$errors->first('a_type')}}</b>
				</td>
			</tr>
			<tr>
				<td>文章重要性</td>
				<td>
					<input type="radio" name="import" value="1">普通
					<input type="radio" name="import" value="2" >置顶
					<b style="color:orange">{{$errors->first('import')}}</b>
				</td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="is_show" value="1">显示
					<input type="radio" name="is_show" value="2" >不显示
					<b style="color:orange">{{$errors->first('is_show')}}</b>
				</td>
			</tr>
			<tr>
				<td>文章作者</td>
				<td><input type="text" name="writer">
					<b style="color:orange">{{$errors->first('writer')}}</b></td>
			</tr>
			<tr>
				<td>作者email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="keywords"></td>
			</tr>
			<tr>
				<td>网页描述</td>
				<td>
					<textarea name="desc" cols="26" rows="8" ></textarea>
				</td>
			</tr>
			<tr>
				<td>上传文件</td>
				<td><input type="file" name="img"></td>
			</tr>
			<tr>
				<td><input type="button" value="添加"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>

<script>
	//添加的按钮
	$('input[type="button"]').click(function(){
		//作者的验证
		var writer=$('input[name="writer"]').val();
		var reg= /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
		if(!reg.test(writer)){
			$('input[name="writer"]').next().html("文章作者由数字字母下划线中文组成的2-8位");
			return;
		}
		$('form').submit();

		//文章标题的验证
		var titleflag=true;
		$('input[name="a_title"]').next().html("");

		var a_title=$('input[name="a_title"]').val();
		var reg= /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
		if(!reg.test(a_title)){
			$('input[name="a_title"]').next().html("文章标题由数字字母下划线组成至少一位");
			return;
		}

		$.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		//验证唯一性
		$.ajax({
			type:'post',
			url:"/article/checkOnly",
			data:{a_title:a_title},
			async:false,
			dataType:'json',
			success:function(result){
				if(result.count>0){
					$('input[name="a_title"]').next().html("标题已存在");
					titleflag=false;
				}
			}
		});
		if(!titleflag){
			return;
		}


	})

	//作者的验证
	$('input[name="writer"]').blur(function(){
		$(this).next().html("");
		var writer=$(this).val();
		var reg= /^[/u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
		if(!reg.test(writer)){
			$(this).next().html("文章作者由数字字母下划线中文组成的2-8位");
			return;
		}
	})
	//标题的验证
	$('input[name="a_title"]').blur(function(){
		$(this).next().html("");
		var a_title=$(this).val();
		var reg= /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
		if(!reg.test(a_title)){
			$(this).next().html("文章标题由数字字母下划线组成至少一位");
			return;
		}
		$.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		//验证唯一性
		$.ajax({
			type:'post',
			url:"/article/checkOnly",
			data:{a_title:a_title},
			dataType:'json',
			success:function(result){
				if(result.count>0){
					$('input[name="a_title"]').next().html("标题已存在");
				}
			}
		});
	})

</script>




