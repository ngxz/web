<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>关于我 - <?php echo ($config["name"]); ?></title>
		<meta name="keywords" content="<?php echo ($config["keyword"]); ?>" />
<meta name="description" content="<?php echo ($config["description"]); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<style type="text/css">
            h4{background-color:#c0c0c0;padding:5px;}
            h4 a{font-size:18px;}
            table tr{height:24px;}
            table tr td span{margin-left:50px;}
            table tr td{padding-left:20px;}
            .about{overflow: hidden;margin-top: 15px;margin-bottom: 50px;padding-bottom: 200px;}
            .about li a{font-size:16px;margin:5px;}
			.about ul li{text-align:center;margin-top:5px;}
            .about img{height:165px;}
            .myNote {width: 70%;}
            .myNote p{text-indent: 2em;line-height: 30px;}
            /*面包屑距离顶部*/
			.bread{margin-top: 50px;}
       	</style>
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
						<li><a href="/web/New/news.html">站内新闻</a></li>
						<li><a href="/web/Web/web.html">WEB前端</a></li>
						<li><a href="/web/Php/php.html">PHP学习</a></li>
						<li><a href="/web/Feed/feed.html">留言板</a></li>
						<li class="navActive"><a href="/web/index/about.html">关于我</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--本页独立内容-->
		<div class="container">
			<!--面包屑-->
			<div class="bread">当前位置：<a href="/web/index/about.html">关于我</a></div>
			<div class="about">
				<!-- 主体左边 -->
				<div class="floatl">
					<img alt="头像" src="/web/Public/img/icon3.jpg">
					<ul>
						<li><a href="/web/index/about.html#chapter1">基本资料</a></li>
						<li><a href="/web/index/about.html#chapter2">详细信息</a></li>
						<li><a href="/web/index/about.html#chapter3">联系方式</a></li>
						<li><a href="/web/index/about.html#chapter4">概况</a></li>
					</ul>
				</div>
				<!-- 主体右边 -->
				<div class="floatr myNote">
					<h4><a name="chapter1">基本资料</a></h4>
    				<table>
    					<tr>
    						<td>姓&nbsp;&nbsp;&nbsp;名：</td>
    						<td>袁茹兵</td>
    					</tr>
    					<tr>
    						<td>性&nbsp;&nbsp;&nbsp;别：</td>
    						<td>男</td>
    					</tr>
    					<tr>
    						<td>年&nbsp;&nbsp;&nbsp;龄：</td>
    						<td>25岁</td>
    					</tr>
    					<tr>
    						<td>现居地：</td>
    						<td>重庆市渝中区</td>
    					</tr>
    					<tr>
    						<td>签&nbsp;&nbsp;&nbsp;名：</td>
    						<td>人想要得到什么，就必须付出同等的代价！</td>
    					</tr>
    				</table>
    				<h4><a name="chapter2">详细资料</a></h4>
    				<table>
    					<tr>
    						<td>网&nbsp;&nbsp;&nbsp;名：</td>
    						<td>南广轩主</td>
    					</tr>
    					<tr>
    						<td>Q&nbsp;&nbsp;&nbsp;Q：</td>
    						<td>1433210198</td>
    					</tr>
    					<tr>
    						<td>工&nbsp;&nbsp;&nbsp;作：</td>
    						<td>计算机软件</td>
    					</tr>
    					<tr>
    						<td>爱&nbsp;&nbsp;&nbsp;好：</td>
    						<td>读书、数码产品、卡牌游戏</td>
    					</tr>
    					<tr>
    						<td>崇敬的人：</td>
    						<td>周鸿祎、雷军</td>
    					</tr>
    					<tr>
    						<td>座右铭：</td>
    						<td>有志者，事竟成，破釜沉舟，百二秦关终属楚；苦心人，天不负，卧薪尝胆，三千越甲可吞吴。</td>
    					</tr>
    				</table>
    				<h4><a name="chapter3">联系方式</a></h4>
    				<table>
    					<tr>
    						<td>Q&nbsp;&nbsp;&nbsp;Q：</td>
    						<td>1433210198</td>
    					</tr>
    					<tr>
    						<td>邮&nbsp;&nbsp;&nbsp;箱：</td>
    						<td>NGXZ92@163.COM</td>
    					</tr>
    					<tr>
    						<td>微&nbsp;&nbsp;&nbsp;信：</td>
    						<td>ngxz-yrb</td>
    					</tr>
    					<tr>
    						<td>网&nbsp;&nbsp;&nbsp;址：</td>
    						<td><a href="http://www.yuanrb.com" style="color:blue">www.yuanrb.com</a></td>
    					</tr>
    				</table>
    				<h4><a name="chapter4">概况</a></h4>
    				<p>
    					南广轩主，真名袁茹兵，半路出家做程序，至今已经两年，现从事WEB前端和PHP开发。
    					迷上网站便决心要做出自己的网站，本站内容都是自己一笔一笔写出来的，本站主旨分享我所涉及领域的文章给更多人。
    					给用户更少的操作，更好的体验。
    				</p>
				</div>
			</div>
		</div>
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

	</body>
</html>