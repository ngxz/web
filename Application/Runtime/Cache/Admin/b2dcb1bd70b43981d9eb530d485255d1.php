<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="tongji">
			<table class="table table-striped table-bordered">
				<tr><th>系统信息</th><th>系统信息</th></tr>
				<tr>
					<td>操作系统：<?php echo ($info["操作系统"]); ?></td>
					<td>运行环境：<?php echo ($info["运行环境"]); ?></td>
				</tr>
				<tr>
					<td>PHP运行方式：<?php echo ($info["PHP运行方式"]); ?></td>
					<td>ThinkPHP版本：<?php echo ($info["ThinkPHP版本"]); ?></td>
				</tr>
				<tr>
					<td>上传附件限制：<?php echo ($info["上传附件限制"]); ?></td>
					<td>执行时间限制：<?php echo ($info["执行时间限制"]); ?></td>
				</tr>
				<tr>
					<td>服务器时间：<?php echo ($info["服务器时间"]); ?></td>
					<td>北京时间：<?php echo ($info["北京时间"]); ?></td>
				</tr>
				<tr>
					<td>服务器域名/IP：<?php echo ($info["服务器域名/IP"]); ?></td>
					<td>剩余空间：<?php echo ($info["剩余空间"]); ?></td>
				</tr>
				<tr>
					<td>框架版本号：<?php echo ($info["框架版本号"]); ?></td>
					<td>根目录：<?php echo ($info["/web"]); ?></td>
				</tr>
				<tr>
					<td>系统内存统计：<?php echo ($info["系统内存统计"]); ?></td>
				</tr>
			</table>
		</div>
	</body>
</html>