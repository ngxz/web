<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>欢迎界面</title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<link rel="stylesheet" href="/web/Public/css/dashboard.css" />
		<style type="text/css">
			#iframe{width:100%;height:auto;min-height:90%; border:none;margin:0;padding:0;}
		</style>
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function openifram(url){
				$("#iframe").attr("src","/web/"+url);
			}
			
			$(function(){
				//让iframe高度适应
				$("#iframe").load(function () {
				    var mainheight = $(this).contents().find("body").height() + 800;
				    $(this).height(mainheight);
				});
				//点击菜单变色
				$(".container-fluid a").each(function(){
					$(this).click(function(){
						$(".sidebar li").css("background","#f5f5f5");
						$(this).parent().css("background","#e6e6e6");
					});
				});
			});
		</script>
	</head>
	<body>   
        <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">站点logo</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	          	<li><a href="#">当前帐号：<?php echo (session('uid')); ?></a></li>
	            <li><a href="#">当前时间:<?php echo (session('time')); ?></a></li>
	            <li><a href="#">登录地区：<?php echo (session('local')); ?></a></li>
	            <li><a href="/web/index.php/Admin/Login/logout">安全退出</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>
	    <div class="container-fluid">
	      	<div class="row">
		        <div class="col-sm-3 col-md-2 sidebar" style="padding-left: 30px;">
		        	<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row1): $mod = ($i % 2 );++$i;?><ul>
	        			<?php if($row1["level"] == 1): ?><li>
	        					<span><?php echo ($row1["name"]); ?></span>
	        					<ul class="nav nav-sidebar">
	        						<?php $mid1 = $row1["id"]; ?>
	        						<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row2): $mod = ($i % 2 );++$i; if($row2["level"] == 2 AND $row2["parentid"] == $mid1): ?><li>
	        									<a onclick="javascript:openifram('<?php echo ($row2["url"]); ?>')"><?php echo ($row2["name"]); ?></a>
	        								</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        					</ul>
	        				</li><?php endif; ?>
	        			</ul><?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>
		        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		        	<!--访问默认的统计方法-->
		          	<iframe id="iframe" name="iframe" src="/web/index.php/Admin/Admin/tongji">
		          		
					</iframe>
		        </div>
	      	</div>
    	</div>	
	</body>
</html>