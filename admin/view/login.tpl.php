<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>品课网后台管理</title>
<link href="/admin/css/css/bootstrap.min.css" rel="stylesheet">
<link href="/admin/css/css/signin.css" rel="stylesheet">
<script type="text/javascript" src="/admin/css/js/jquery-1.8.0.js"></script>
</head>

<body>
<div class="signin">
	<div class="signin-head"><img src="/course/resources/img/bottom_logo.jpg" alt="" class="img-circle"></div>
	<form class="form-signin" >
		<input type="text" class="form-control username" placeholder="用户名" name="username" required autofocus />
		<input type="password" class="form-control password" placeholder="密码"  name="password" required />
		<div class="btn btn-lg btn-warning btn-block" >登录</div>
	</form>
</div>

</body>
</html>
<script type="text/javascript">
	$('.btn-warning').click(function(){
		var username=$('.username').val();
		var password=$('.password').val();
		if(!username)return;
		if(!password)return;
		$.post('/index.php?app=admin&act=users-dologin',{username:username,password:password},function(e){
			if(e.flag){
				location.href = '/index.php?app=admin&act=index-index';
			}else{
				alert(e.data);
			}
		},'json')
	});
</script>
