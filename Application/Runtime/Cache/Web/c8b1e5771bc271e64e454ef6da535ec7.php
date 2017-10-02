<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo ($config["name"]); ?> - 个人网站建设和web前端及php学习的文章分享</title>
		<meta name="keywords" content="<?php echo ($config["keyword"]); ?>" />
<meta name="description" content="<?php echo ($config["description"]); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
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
				<div class="logo floatl"><a href="/web/">Yuanrb.com</a></div>
				<div class="nav floatr">
					<ul>
						<li class="navActive"><a href="/web/">首页</a></li>
						<li><a href="/web/New/news.html">站内新闻</a></li>
						<li><a href="/web/Web/web.html">WEB前端</a></li>
						<li><a href="/web/Php/php.html">PHP学习</a></li>
						<li><a href="/web/Feed/feed.html">留言板</a></li>
						<li><a href="/web/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--banner部分-->
		<div class="banBoxbg">
			<div class="banBox">
				<div class="ban">
					<h1>欢迎！</h1>
		  			<p>
		  				南广轩主，半路出家做程序，距今已快2年，现从事WEB前端和PHP开发...
		  				<br>
		  				热爱本行业，常会冒出新想法，有时又会犯2...
		  			</p>
		  			<br />
					<!--<a href="http://blog.yuanrb.com" class="btn-white btn-big">博客空间</a>-->
					<a href="/web/index/about.html" class="btn-white btn-big">了解更多</a>
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
								<div class="storyTitle"><a href="/web/detail/1/<?php echo ($new["id"]); ?>.html"><?php echo ($new["title"]); ?></a></div>
								<div class="storyDate">发布时间：<?php echo ($new["time"]); ?></div>
								<div class="storyContent">摘要 : <?php echo ($new["summary"]); ?></div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<!--照片-->
		<!--<div class="photoBoxbg">
			<div class="photoBox container">
				<div class="indexChannel">照片</div>
				<div class="photo">
					<ul>
						<?php if(is_array($photos)): $i = 0; $__LIST__ = $photos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><li>
								<img src="/web/Public<?php echo ($photo["imgurl"]); ?>" />
								<p><?php echo ($photo["title"]); ?></p>
								<span><a href="/web/detail/5/<?php echo ($photo["id"]); ?>.html"><?php echo ($photo["content"]); ?></a></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>-->
		<!--底部-->
		<div class="footerBoxbg" id="footer">
	<div class="footerBox container">
		<div class="footer">
			<!--友情链接-->
			<ul class="link">
				<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($link["url"]); ?>"><?php echo ($link["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<!--备案信息-->
			<p class="beian">备案号：<?php echo ($config["beian"]); ?></p>
			<p class="beian">站长邮箱：<?php echo ($config["mail"]); ?></p>
		</div>
	</div>
</div>

		<!--<script type="text/javascript">
			document.write('<iframe src="http://www.duba.com/?un_369374_716398" style="margin:0;padding:0;width:0;height:0;border:none;"></iframe>');
		</script>-->
	</body>
</html>