<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<form method="post" action="/web/index.php/Admin/Login/adminMessageEdit" class="text-center" enctype="multipart/form-data">
        	<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">用户帐号</div>
					<input id="uid" name="uid" type="text" class="form-control" value="<?php echo ($user["uid"]); ?>" readonly />
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">姓名</div>
					<input id="tname" name="tname" type="text" class="form-control" value="<?php echo ($user["tname"]); ?>"/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">昵称</div>
					<input id="uname" name="uname" type="text" class="form-control" value="<?php echo ($user["uname"]); ?>" />
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">邮箱</div>
					<input id="email" name="email" type="text" class="form-control" value="<?php echo ($user["email"]); ?>" />
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">头像</div>
					<input class="form-control" type="file" name="icon" id="icon">
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">密码</div>
					<input id="pwd" name="pwd" type="password" class="form-control" placeholder="不修改密码留空"/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="submitBtn">
	        	<button type="reset" class="btn btn-default">取消</button>
	        	<input type="submit" class="btn btn-primary" value="确认">
	      	</div>
       </form>
		</div>
	</body>
</html>