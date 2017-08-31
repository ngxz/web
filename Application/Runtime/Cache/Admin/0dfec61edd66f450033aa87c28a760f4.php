<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function login(){
				$.post("/web/index.php/Admin/Login/login",{
					"uid":$("#uid").val(),
					"pwd":$("#pwd").val()
				},function(data){
					if(data.status == 1){
						window.location.href = "/web/index.php/Admin/Login/home";
					}else if(data.status == 2){
						alert("密码有误哦！");
					}
				},"json");
			}
		</script>
	</head>
	<body>
		<div>
			<form>
			  <div class="form-group">
			    <label for="account">帐号</label>
			    <input type="text" class="form-control" id="uid" placeholder="">
			  </div>
			  <div class="form-group">
			    <label for="pwd">密码</label>
			    <input type="password" class="form-control" id="pwd" placeholder="">
			  </div>
			  <div class="form-group">
			    <input type="button" class="btn btn-default" value="登录" onclick="login()">
			  </div>
			</form>
		</div>
	</body>
</html>