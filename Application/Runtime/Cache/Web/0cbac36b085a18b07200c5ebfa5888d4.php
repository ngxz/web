<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo ($row["title"]); ?> - 袁茹兵个人站点</title>
		<meta name="keywords" content="袁茹兵，个人博客,网页开发,web前端，PHP学习" />
		<meta name="description" content="主要分享个人网站搭建，web前端，php后台，博客建设等文章" />
		<link rel="icon" href="/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/Public/css/global.css" />
		<link rel="stylesheet" href="/Public/css/article.css" />
		<script type="text/javascript" src="/Public/js/jquery-1.9.1.min.js" ></script>
		<script type="text/javascript" src="/Public/js/main.js" ></script>
		<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
    	<script type="text/javascript" id="bdshell_js"></script>
		<script type="text/javascript">
			with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];    //加载本地JS后可不用段条代码 
		</script>
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
						<li><a href="/Web/web.html">WEB前端</a></li>
						<li><a href="/Php/php.html">PHP学习</a></li>
						<li><a href="/Feed/feed.html">留言板</a></li>
						<li><a href="/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--本页文章内容-->
		<div class="articleBoxbg">
			<div class="articleBox container">
				<!--面包屑-->
				<div class="bread">当前位置：<a href="/New/news.html"><?php echo ($channel["name"]); ?></a>-<?php echo ($row["title"]); ?></div>
				<div class="article">
					<!--标题-->
					<div class="title"><?php echo ($row["title"]); ?></div>
					<!--分享-->
					<span class="time"><?php echo ($row["time"]); ?>&nbsp;分享到：	</span>
					<span class="share">
						<div class="bdsharebuttonbox" data-tag="share_1">
						    <a class="bds_weixin" data-cmd="weixin"></a>
						    <a class="bds_qzone" data-cmd="qzone"></a>
						    <a class="bds_tsina" data-cmd="tsina"></a>
						    <a class="bds_sqq" data-cmd="sqq"></a>
						    <a class="bds_more" data-cmd="more"></a>
						</div>
					</span>
				</div>
				<!--文章内容单独出来-->
				<div class="content">
					<?php echo ($row["content"]); ?>
					<!--
					此处考虑到有图的文章公用此详情，判断图片地址为空则不显示图片，否则显示。
					-->
					<?php if($row["imgurl"] == ""): else: ?>
						<img class="articleImg" src="/Public<?php echo ($row["imgurl"]); ?>" /><?php endif; ?>
				</div>
				<!--上一条-->
				<!--
					注意：以下翻篇地址中，
						此处加入查询出来的当前频道id加入翻篇的地址，防止翻篇跳转到其他频道，
						此处频道id为面包屑处调用查询出来
					
				-->
				<div class="preNext container">
					<?php if(empty($pre)): ?><p><strong>上一篇：</strong>已经是第一篇</p>
		         	<?php else: ?>
		           		<p><strong>上一篇：</strong><a href="/detail/article/channelid/<?php echo ($channel["id"]); ?>/id/<?php echo ($pre["id"]); ?>" ><?php echo ($pre["title"]); ?></a></p><?php endif; ?>
					<?php if(empty($next)): ?><p><strong>下一篇：</strong>已经是最后一篇</p>
		         	<?php else: ?>
		           		<p><strong>下一篇：</strong><a href="/detail/article/channelid/<?php echo ($channel["id"]); ?>/id/<?php echo ($next["id"]); ?>" ><?php echo ($next["title"]); ?></a></p><?php endif; ?>
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
					<p class="beian">本站由袁茹兵制作</p>
					<p class="beian">渝ICP备17011601号</p>
				</div>
			</div>
		</div>
	</body>
</html>