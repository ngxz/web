<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>首页</title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<link rel="stylesheet" href="/web/Public/css/main.css" />
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
						<li class="navActive"><a href="/web">首页</a></li>
						<li><a href="/web/Index/New/news.html">站内新闻</a></li>
						<li><a href="/web/Index/Web/web.html">WEB前端</a></li>
						<li><a href="/web/Index/Php/php.html">PHP学习</a></li>
						<li><a href="/web/Index/Feed/feed.html">留言板</a></li>
						<li><a href="/web/Index/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--banner部分-->
		<div class="banBoxbg">
			<div class="banBox">
				<div class="ban">
					<h1>标题</h1>
					<p>句子</p>
					<a href="/web/Index/index/about.html" class="btn-white btn-big">关于我</a>
				</div>
			</div>
		</div>
		<!--故事-->
		<div class="storyBoxbg">
			<div class="storyBox container">
				<div class="indexChannel">故事</div>
				<div class="story">
					<ul>
						<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><li>
								<div class="storyTitle"><a href="/web/index/detail/article/channelid/1/id/<?php echo ($new["id"]); ?>"><?php echo ($new["title"]); ?></a></div>
								<div class="storyContent">摘要 : <?php echo ($new["summary"]); ?></div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<!--照片-->
		<div class="photoBoxbg">
			<div class="photoBox container">
				<div class="indexChannel">照片</div>
				<div class="photo">
					<ul>
						<?php if(is_array($photos)): $i = 0; $__LIST__ = $photos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><li>
								<img src="/web/Public<?php echo ($photo["imgurl"]); ?>" />
								<p><?php echo ($photo["title"]); ?></p>
								<span><a href="/web/index/detail/article/channelid/5/id/<?php echo ($photo["id"]); ?>"><?php echo ($photo["content"]); ?></a></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
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