<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>站内新闻 - <?php echo ($config["name"]); ?></title>
		<meta name="keywords" content="<?php echo ($config["keyword"]); ?>" />
<meta name="description" content="<?php echo ($config["description"]); ?>" />
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
				<div class="logo floatl"><a href="/web/">Yuanrb.com</a></div>
				<div class="nav floatr">
					<ul>
						<li><a href="/web/">首页</a></li>
						<li class="navActive"><a href="/web/New/news.html">站内新闻</a></li>
						<li><a href="/web/Web/web.html">WEB前端</a></li>
						<li><a href="/web/Php/php.html">PHP学习</a></li>
						<li><a href="/web/Feed/feed.html">留言板</a></li>
						<li><a href="/web/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--news内容-->
		<div class="newsBoxbg">
			<div class="newsBox container">
				<!--面包屑-->
				<div class="bread">当前位置：<a href="/web/New/news.html"><?php echo ($channel["name"]); ?></a> - 
					<?php if(empty($category)): ?>全部新闻
					<?php else: ?>
						<?php echo ($category["name"]); endif; ?>
				</div>
				<!--左边内容-->
				<ul class="listUl">
					<?php if(is_array($data["news"])): $i = 0; $__LIST__ = $data["news"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li class="listLi">
							<div class="listTitle"><a href="/web/detail/article/channelid/1/id/<?php echo ($news["id"]); ?>"><?php echo ($news["title"]); ?></a></div>
							<div class="listTime">发布时间：<?php echo ($news["time"]); ?></div>
							<div class="listContent">摘要：<?php echo ($news["summary"]); ?></div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--右边分类-->
				<ul class="categoryUl">
					<h1>分类</h1>
					<li><a href="/web/New/news.html">全部新闻</a></li>
					<?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li><a href="/web/New/newsbycategory/category/<?php echo ($cate["id"]); ?>"><?php echo ($cate["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
				<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($link["url"]); ?>"><?php echo ($link["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<!--备案信息-->
			<p class="beian">备案号：<?php echo ($config["beian"]); ?></p>
			<p class="beian">站长邮箱：<?php echo ($config["mail"]); ?></p>
		</div>
	</div>
</div>

	</body>
</html>