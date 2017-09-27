<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>网站信息配置</title>
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<style type="text/css">
			/*表格样式调节*/
			.table tr td:first-child{width: 120px;}
			.table td{vertical-align: middle!important;}
			.table td input{height: 40px;width: 100%;border: none;}
		</style>
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function edit(){
				$.post("/web/admin.php/Set/edit",{
					'name' : $(".name").val(),
					'keyword' : $(".keyword").val(),
					'description':$(".description").val(),
					'contect' : $(".contect").val(),
					'mail' : $(".mail").val(),
					'beian' : $(".beian").val()
				},function(data){
					if(data.status == 1){
						alert("修改成功！");
					}else{
						alert("修改失败！");
					}
				},"json");
			}
		</script>
	</head>
	<body>
		<div class="webSet">
			<form>
				<table class="table table-striped table-bordered">
					<tr><th>网站信息</th>
						<th>内容</th>
						<th>变量</th>
					</tr>
					<tr>
						<td>网站名称：</td>
						<td><input type="text" name="name" class="name" value="<?php echo ($config["name"]); ?>" required></td>
						<td>$config.name</td>
					</tr>
					<tr>
						<td>页面关键词：</td>
						<td><input type="text" name="keyword" class="keyword" value="<?php echo ($config["keyword"]); ?>" required></td>
						<td>$config.keyword</td>
					</tr>
					<tr>
						<td>页面描述：</td>
						<td><input type="text" name="description" class="description" value="<?php echo ($config["description"]); ?>" required></td>
						<td>$config.description</td>
					</tr>
					<tr>
						<td>联系方式：</td>
						<td><input type="text" name="contect" class="contect" value="<?php echo ($config["contect"]); ?>"></td>
						<td>$config.contect</td>
					</tr>
					<tr>
						<td>管理员邮箱：</td>
						<td><input type="text" name="mail" class="mail" value="<?php echo ($config["mail"]); ?>"></td>
						<td>$config.mail</td>
					</tr>
					<tr>
						<td>备案号：</td>
						<td><input type="text" name="beian" class="beian" value="<?php echo ($config["beian"]); ?>" required></td>
						<td>$config.beian</td>
					</tr>
				</table>
				<input type="button" class="btn btn-primary" value="修改" onclick="edit()" />
			</form>
		</div>
	</body>
</html>