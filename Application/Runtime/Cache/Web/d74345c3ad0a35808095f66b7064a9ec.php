<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP文章</title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<link rel="stylesheet" href="/web/Public/css/list.css" />
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js" ></script>
		<script type="text/javascript" src="/web/Public/js/main.js" ></script>
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
						<li><a href="/web/Index/Web/web.html">WEB前端</a></li>
						<li class="navActive"><a href="/web/Index/Php/php.html">PHP学习</a></li>
						<li><a href="/web/Index/Feed/feed.html">留言板</a></li>
						<li><a href="/web/Index/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--php内容-->
		<div class="phpBoxbg">
			<div class="phpBox container">
				<!--面包屑-->
				<div class="bread">当前位置：<a href="/web/Index/Php/php.html"><?php echo ($channel["name"]); ?></a>-PHP文章列表</div>
				<ul class="listUl">
					<?php if(is_array($data["php"])): $i = 0; $__LIST__ = $data["php"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$php): $mod = ($i % 2 );++$i;?><li class="listLi">
							<div class="listTitle"><a href="/web/index/detail/article/channelid/3/id/<?php echo ($php["id"]); ?>"><?php echo ($php["title"]); ?></a></div>
							<div class="listTime"><?php echo ($php["time"]); ?></div>
							<div class="listContent"><?php echo ($php["summary"]); ?></div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<!--分页-->
		<div class="pages">
			<?php echo ($data["show"]); ?>
		</div>
		<!--底部-->
		<div class="footerBoxbg">
			<div class="footerBox container">
				<div class="footer">
					<!--友情链接-->
					<ul class="link">
						<li><a href="#">链接</a></li>
						<li><a href="#">链接</a></li>
						<li><a href="#">链接</a></li>
					</ul>
					<!--备案信息-->
					<p class="beian">本站由某某制作</p>
					<p class="beian">渝ICP101010</p>
				</div>
			</div>
		</div>
	</body>
</html>