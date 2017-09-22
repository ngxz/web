<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>WEB文章 - 袁茹兵个人站点</title>
		<meta name="keywords" content="袁茹兵,网站建设,php,网站前端,博客" />
		<meta name="description" content="袁茹兵的个人网站，分享网站建设相关，网站前端，php，博客等" />
		<link rel="icon" href="/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/Public/css/global.css" />
		<link rel="stylesheet" href="/Public/css/list.css" />
		<script type="text/javascript" src="/Public/js/jquery-1.9.1.min.js" ></script>
		<script type="text/javascript" src="/Public/js/main.js" ></script>
	</head>
	<body>
		<!--导航部分-->
		<div class="navBoxbg">
			<div class="navBox container">
				<div class="logo floatl"><a href="/">Yuanrb.com</a></div>
				<div class="nav floatr">
					<ul>
						<li><a href="/">首页</a></li>
						<li><a href="/New/news.html">站内新闻</a></li>
						<li class="navActive"><a href="/Web/web.html">WEB前端</a></li>
						<li><a href="/Php/php.html">PHP学习</a></li>
						<li><a href="/Feed/feed.html">留言板</a></li>
						<li><a href="/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--web内容-->
		<div class="webBoxbg">
			<div class="webBox container">
				<!--面包屑-->
				<div class="bread">当前位置：<a href="/Web/web.html"><?php echo ($channel["name"]); ?></a>-WEB文章列表</div>
				<ul class="listUl">
					<?php if(is_array($data["web"])): $i = 0; $__LIST__ = $data["web"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$web): $mod = ($i % 2 );++$i;?><li class="listLi">
							<div class="listTitle"><a href="/detail/article/channelid/2/id/<?php echo ($web["id"]); ?>"><?php echo ($web["title"]); ?></a></div>
							<div class="listTime"><?php echo ($web["time"]); ?></div>
							<div class="listContent"><?php echo ($web["summary"]); ?></div>
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
					<p class="beian">本站由袁茹兵制作</p>
					<p class="beian">渝ICP备17011601号</p>
				</div>
			</div>
		</div>
	</body>
</html>