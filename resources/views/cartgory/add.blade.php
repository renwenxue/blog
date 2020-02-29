<form action="{{route('do')}}">
	@csrf
	<h2>分类添加页面</h2>
	{{$fid}}<br>
<input type="text" name="name">
<input type="number" name="age">
<input type="submit" value="添加">
</form>