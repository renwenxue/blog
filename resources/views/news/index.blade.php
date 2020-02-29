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
<center><h3>展示新闻表</h3></center>
	<table class="table">
	<thead>
		<tr>
			<th>id</th>
			<th>新闻标题</th>
			<th>新闻内容</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($res as $k=>$v)
		<tr>
			<td>{{$v->n_id}}</td>
			<td>{{$v->n_name}}</td>
			<td>{{$v->n_content}}</td>
			<td><a href="javascript:;"  onclick="del({{$v->n_id}})" >删除</a></td>
		</tr>
		@endforeach
		<tr><td colspan="4">{{$res->links()}}</td></tr>
	</tbody>
</table>	
</body>
</html>
<script>
<!-- ajax分页的实现 -->
	// $(document).on('click','.pagination a',function(){
	// 	//获取href属性
	// 	var url=$(this).attr('href');
	// 	if(!url){
	// 		return;
	// 	}
	// 	$.get(url,function(result){
	// 		$("tbody").html(result);
	// 	});

	// 	return false;
	// })
<!-- ajax删除的实现 -->
	function del(id){
		if(!id){
			return;
		}
		if(confirm("是否确认删除此条消息?")){
			//ajax删除
			$.get('/news/destroy/'+id,function(result){
				if(result.code=='00000'){
					location.reload();
				}
			},'json')

			
		}
	}
</script>