<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>留言板</title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<link rel="stylesheet" href="/web/Public/css/feedback.css" />
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js" ></script>
		<script type="text/javascript" src="/web/Public/js/main.js" ></script>
		<script type="text/javascript">
			var ROOT = "/web";
		</script>
		<script type="text/javascript" src="/web/Public/js/feedback.js" ></script>
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
						<li><a href="/web/Index/Php/php.html">PHP学习</a></li>
						<li class="navActive"><a href="/web/Index/Feed/feed.html">留言板</a></li>
						<li><a href="/web/Index/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--留言内容-->
		<div class="feedBoxbg">
			<div class="feedBox container">
				<!--面包屑-->
				<div class="bread">当前位置：<a href="/web/Index/Feed/feed.html"><?php echo ($channel["name"]); ?></a></div>
				<div class="title">最新留言</div>
				<ul>
					<?php if(is_array($data["feed"])): $i = 0; $__LIST__ = $data["feed"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feed): $mod = ($i % 2 );++$i;?><li>
							<div class="feedTitle"><a href="#"><?php echo ($feed["title"]); ?></a></div>
							<div class="feedTime"><?php echo ($feed["time"]); ?></div>
							<div class="feedContent"><?php echo ($feed["content"]); ?></div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<!--分页-->
		<div class="pages">
			<?php echo ($data["show"]); ?>
		</div>
		<!--留言表单-->
		<div class="feedFormbg">
			<div class="feedForm container">
				<div class="title">在线留言</div>
				<div class="form">
					<form>
						<div class="formTitle">
							<label for="title">标题</label>
							<input type="text" id="title" name="title" />
						</div>
						<div class="formMail">
							<label for="mail">邮箱</label>
							<input type="email" id="mail" name="mail" />
						</div>
						<div class="formContent">
							<label for="content">内容</label>
							<textarea id="content" name="content"></textarea>
						</div>
						<div class="formCode">
							<label for="code">验证码</label>
							<input type="text" id="code" name="code" />
							<img src="/web/Index/Feed/code" onclick="this.src='/web/Index/Feed/code'+'/'+Math.random()" />
						</div>
						<div class="formSend">
							<input type="reset" value="重置" />
							<input type="button" value="提交" onclick="send()"/>
						</div>
					</form>
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