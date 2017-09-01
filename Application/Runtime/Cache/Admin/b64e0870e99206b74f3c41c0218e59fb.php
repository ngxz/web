<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<link rel="stylesheet" href="/web/Public/css/global.css" />
		<link rel="stylesheet" href="/web/Public/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" type="text/css" href="/web/Public/kind/themes/default/default.css">
		<style type="text/css">
			form{padding: 20px;}
			.form-group{width: 30%;display: inline-block;}
			.submitBtn{margin-top: 30px;}
			.ke-container.ke-container-default{
			  width:100%!important;
			  height:200%!important;
			}
		</style>
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/web/Public/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="/web/Public/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
		<script type="text/javascript" src="/web/Public/kind/kindeditor-min.js"></script>
		<script type="text/javascript" src="/web/Public/kind/lang/zh_CN.js"></script>
		<script type="text/javascript">
			//kind插件
			KindEditor.ready(function(K) {  
		        //通过id找到textarea  
		        K.create('#content', {  
		            items:['source', '|','fullscreen', 'undo', 'redo',  'copy', 'paste',  
	                'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',  
	                'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',  
	                'superscript', '|', 'selectall', '-',  
	                'title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold',  
	                'italic', 'underline', 'strikethrough',  '|', 'image',  
	                'advtable'],  
		  
		            afterCreate : function() {  
		             this.sync();  
		            },  
		            afterBlur:function(){  
		                this.sync();  
		            }  
		        });  
		    });
		    //点击上传
			function btnclick(){
				$("#pic").click();
			}
			//文件名
			function filenamechange(){
				$("#img_url").val($("#pic").val());
			}
			//
			$(function(){
				$("#time").datetimepicker({
				   format:'yyyy-mm-dd hh:mm:ss',
			        weekStart: 1,
			        todayBtn:  1,
					autoclose: 1,
					todayHighlight: 1,
					startView: 2,
					forceParse: 0,
			        showMeridian: 1
				});
				//默认选中频道
				var i = <?php echo ($rows["channelid"]); ?>;
				$("#channelid option").eq(i).attr("selected","selected");
				
			});
			//提交函数
			function edit(){
				$.post("/web/index.php/Admin/Admin/addArticle",{
					"title":$("#title").val(),
					"summary":$("#summary").val(),
					"author":$("#author").val(),
					"time":$("#time").val(),
					"content":$("#content").val(),
					"channelid":$("#channelid").val(),
					"ctr":0,
					"newsId":<?php echo ($newsId); ?>
				},function(data){
					if(data.status == 1){
						alert("修改成功！");
					}else{
						alert("修改失败！");
					}
				},"json");
			}
		</script>
	</head>
	<body>
        <form class="text-center" enctype="multipart/form-data">
        	<!--<input type="hidden" name="ctr" id="ctr" value="0"/>
        	<input type="hidden" name="newsId" id="newsId" value="<?php echo ($newsId); ?>"/>-->
        	<div class="form-group">
        		<div class="input-group ">
					<div class="input-group-addon">所属频道</div>
					<select name="channelid" id="channelid" class="form-control" style="width:237px">
						<option value="-1">选择频道</option>
						<option value="1">新闻中心</option>
						<option value="2">WEB前端</option>
						<option value="3">PHP学习</option>
						<option value="4">留言板</option>
						<option value="5">图片</option>
					</select>
				</div>
        	</div>
        	<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">文章标题</div>
					<input id="title" name="title" type="text" class="form-control" value="<?php echo ($rows["title"]); ?>" placeholder="标题必填" />
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">文章摘要</div>
					<input id="summary" name="summary" type="text" value="<?php echo ($rows["summary"]); ?>" class="form-control"/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">修改时间</div>
					<input id="time" name="time" type="text" class="form-control input-append date" value="<?php echo ($rows["time"]); ?>" placeholder="日期必填" readonly/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">文章作者</div>
					<input id="author" name="author" type="text" class="form-control" value="<?php echo ($rows["author"]); ?>" value="<?php echo ($_SESSION['u']['uname']); ?>" />
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">图片地址</div>
					<input type="file" name="pic" id="pic" style="display:none;" onchange="filenamechange()"/>
					<input style="width:63%;"  class="form-control" type="text" name="img_url" id="img_url" value="<?php echo ($rows["imgurl"]); ?>" placeholder="请选择文件" readonly>
					<input type="button" class="btn btn-primary" onclick="btnclick()" value="上传文件"/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group1">
				<div class="input-group ">
					<div class="input-group-addon">文章内容</div>
					<textarea id="content" name="content" type="text" style="width: 100px;height:100px;" class="form-control"/><?php echo ($rows["content"]); ?></textarea>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="submitBtn">
	        	<button type="button" class="btn btn-default"><span aria-hidden="true">取消</span></button>
	        	<input type="button" class="btn btn-primary" value="确认" onclick="edit()">
	      	</div>
       </form>
	</body>
</html>