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
			.ke-edit,.ke-edit-iframe{height: 200%!important;}
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
				$("#url").val($("#pic").val());
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
				
			});
		</script>
	</head>
	<body>
        <form class="text-center" method="post" action="/web/Admin/Admin/addPhotos" enctype="multipart/form-data">
        	<input type="hidden" name="newsId" id="newsId"/>
        	<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">文章标题</div>
					<input id="title" name="title" type="text" class="form-control" placeholder="标题必填" />
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">文章摘要</div>
					<input id="summary" name="summary" type="text" class="form-control"/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">修改时间</div>
					<input id="time" name="time" type="text" class="form-control input-append date" placeholder="日期必填" readonly/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">文章作者</div>
					<input id="author" name="author" type="text" class="form-control" value="<?php echo ($_SESSION['u']['uname']); ?>" />
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group ">
					<div class="input-group-addon">图片地址</div>
					
					<input type="file" name="pic" id="pic" style="display:none;" onchange="filenamechange()"/>
					<input style="width:55%;"  class="form-control" type="text" name="url" id="url" placeholder="方形图片" readonly>
					<input type="button" class="btn btn-primary" onclick="btnclick()" value="上传文件"/>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="form-group1">
				<div class="input-group ">
					<div class="input-group-addon">文章内容</div>
					<textarea id="content" name="content" type="text" style="width: 100px;height:100px;" class="form-control"/></textarea>
					<span class="glyphicon form-control-feedback"></span>
				</div>
			</div>
			<div class="submitBtn">
	        	<button type="button" class="btn btn-default"><span aria-hidden="true">取消</span></button>
	        	<input type="submit" class="btn btn-primary" value="确认" onclick="add()">
	      	</div>
       </form>
	</body>
</html>