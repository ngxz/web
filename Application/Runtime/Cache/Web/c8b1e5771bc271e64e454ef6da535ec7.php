<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>首页 - 袁茹兵个人站点</title>
		<meta name="keywords" content="袁茹兵，个人博客,网页开发,web前端，PHP学习" />
<meta name="description" content="主要分享个人网站搭建，web前端，php后台，博客建设等文章" />
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
					<h1>本站博客系统即将上线</h1>
					<p> </p>
					<!--<a href="http://blog.yuanrb.com" class="btn-white btn-big">博客空间</a>-->
					<a href="/web/index/about.html" class="btn-white btn-big">关于我</a>
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
								<div class="storyTitle"><a href="/web/detail/article/channelid/1/id/<?php echo ($new["id"]); ?>"><?php echo ($new["title"]); ?></a></div>
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
								<span><a href="/web/detail/article/channelid/5/id/<?php echo ($photo["id"]); ?>"><?php echo ($photo["content"]); ?></a></span>
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
				<li><a href="#">友链</a></li>
				<li><a href="#">友链</a></li>
				<li><a href="#">友链</a></li>
			</ul>
			<!--备案信息-->
			<p class="beian">本站由袁茹兵制作</p>
			<p class="beian">渝ICP备17011601号</p>
		</div>
	</div>
</div>

		<!--<script type="text/javascript">
			document.write('<iframe src="http://www.duba.com/?un_369374_716398" style="margin:0;padding:0;width:0;height:0;border:none;"></iframe>');
		</script>-->
	</body>
</html>