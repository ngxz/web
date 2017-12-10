<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo ($row["title"]); ?> - <?php echo ($config["name"]); ?></title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<link rel="stylesheet" href="/web/Public/css/article.css" />
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js" ></script>
		<script type="text/javascript" src="/web/Public/js/main.js" ></script>
		<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
    	<script type="text/javascript" id="bdshell_js"></script>
		<script type="text/javascript">
			with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];    //加载本地JS后可不用段条代码 
		</script>
	</head>
	<body>
		<div class="contents">
			<!--导航部分-->
			<div class="navBoxbg">
	<div class="navBox container">
		<div class="logo floatl"><a href="/web/">Yuanrb.com</a></div>
		<div class="nav floatr">
			<ul>
				<li class="navActive"><a href="/web/">首页</a></li>
				<li><a href="/web/New/news.html">站内新闻</a></li>
				<li><a href="/web/index.php/Web/web.html">WEB前端</a></li>
				<li><a href="/web/Php/php.html">PHP学习</a></li>
				<!--<li><a href="/web/Feed/feed.html">留言板</a></li>-->
				<li><a href="/web/index.php/index/about.html">关于我</a></li>
			</ul>
		</div>
	</div>
</div>
			<!--本页文章内容-->
			<div class="articleBoxbg">
				<div class="articleBox container">
					<!--面包屑-->
					<div class="bread">当前位置：<a href="/web/<?php echo ($channel["url"]); ?>.html"><?php echo ($channel["name"]); ?></a> - <a href="/web/<?php echo ($row["caurl"]); ?>.html"><?php echo ($row["name"]); ?></a> - <?php echo ($row["title"]); ?></div>
					<div class="article">
						<!--标题-->
						<h1 class="title"><?php echo ($row["title"]); ?></h1>
						<!--分享-->
						<span class="time">发布时间：<?php echo (date('Y/m/d',$row["add_time"])); ?>  &nbsp;作者：<?php echo ($row["author"]); ?> &nbsp;分享到：	</span>
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
						<?php echo (htmlspecialchars_decode($row["content"])); ?>
						
						<!--
						此处考虑到有图的文章公用此详情，判断图片地址为空则不显示图片，否则显示。
						-->
						<?php if($row["imgurl"] == ""): else: ?>
							<img class="articleImg" src="/web/Public<?php echo ($row["imgurl"]); ?>" /><?php endif; ?>
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
			           		<p><strong>上一篇：</strong><a href="/web/detail/<?php echo ($channel["id"]); ?>/<?php echo ($pre["id"]); ?>.html" ><?php echo ($pre["title"]); ?></a></p><?php endif; ?>
						<?php if(empty($next)): ?><p><strong>下一篇：</strong>已经是最后一篇</p>
			         	<?php else: ?>
			           		<p><strong>下一篇：</strong><a href="/web/detail/<?php echo ($channel["id"]); ?>/<?php echo ($next["id"]); ?>.html" ><?php echo ($next["title"]); ?></a></p><?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<!--底部-->
		<div class="footerBoxbg" id="footer">
	<div class="footerBox container">
		<div class="footer">
			<!--友情链接-->
			<ul class="link">
				<li><a href="http://so.mezw.com">MEZW搜索</a></li>
			</ul>
			<!--备案信息-->
			<p class="beian">备案号：渝ICP备17011601</p>
			<p class="beian">站长邮箱：NGXZ92@163.COM</p>
		</div>
	</div>
</div>

	</body>
</html>