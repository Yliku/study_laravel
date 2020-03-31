<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
	<div>post测试</div>
    <form action="{{url('/test1')}}" method="post">	
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="test">
		<input type="submit" value="Submit" />
    </form>

	<div>路由传参测试 route('test')</div>
    <form action="{{url('/test/1')}}" method="post">	
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="test">
		<input type="submit" value="Submit" />
    </form>
</body>

</script> 
</html>