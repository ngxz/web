<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>WEB文章</title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<!--<link rel="stylesheet" href="/web/Public/css/main.css" />-->
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js" ></script>
		<script type="text/javascript" src="/web/Public/js/main.js" ></script>
		<style type="text/css">
			/*分页修饰*/
			.pages{text-align: center;margin: 10px 0;}
			.pages a,.pages span {display:inline-block;padding:2px 5px;margin:0 1px;border:1px solid #f0f0f0;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;}
			.pages a,.pages li {display:inline-block;text-decoration:none;color:#58A0D3;padding: 5px 10px;border:1px solid #f0f0f0;}
			.pages a.first,.pages a.prev,.pages a.next,.pages a.end{padding: 5px 10px;margin:0;}
			.pages a:hover{border-color:#50A8E6;}
			.pages a.num{padding: 5px 10px;}
			.pages span.current{padding: 5px 10px;background:#50A8E6;color:#FFF;font-weight:700;border-color:#50A8E6;}
		</style>
	</head>
	<body>
		<!--导航部分-->
		<div class="navBoxbg">
			<div class="navBox container">
				<div class="logo floatl"><a href="/web">Yuanrb.com</a></div>
				<div class="nav floatr">
					<ul>
						<li><a href="/web">首页</a></li>
						<li><a href="/web/Index/New/news.html">站内新闻</a></li>
						<li class="navActive"><a href="/web/Index/Web/web.html">WEB前端</a></li>
						<li><a href="/web/Index/PHP/php.html">PHP学习</a></li>
						<li><a href="/web/Index/Feed/feed.html">留言板</a></li>
						<li><a href="/web/Index/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div>
			<?php echo ($data["web"]); ?>
		</div>
		<!--分页-->
		<div class="pages">
			<?php echo ($data["show"]); ?>
		</div>
	</body>
</html>