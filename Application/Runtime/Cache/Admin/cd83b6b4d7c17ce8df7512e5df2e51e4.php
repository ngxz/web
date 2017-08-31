<?php if (!defined('THINK_PATH')) exit(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title></title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<link rel="stylesheet" href="/web/Public/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" type="text/css" href="/web/Public/kind/themes/default/default.css">
		<style type="text/css">
			#topbtn span{margin-right:5px;}
            .search{height:33px;margin-left:10px;padding:0;}
			#searchForm input{width:50%;}
			.table tr th{text-align:center;}
			.ke-container.ke-container-default{
			  width:450px!important;
			  height:150px!important;
			}
			/*分页修饰*/
			.pages{text-align: center;margin: 10px 0;}
			.pages a,.pages span {display:inline-block;padding:2px 5px;margin:0 1px;border:1px solid #f0f0f0;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;}
			.pages a,.pages li {display:inline-block;text-decoration:none;color:#58A0D3;padding: 5px 10px;border:1px solid #f0f0f0;}
			.pages a.first,.pages a.prev,.pages a.next,.pages a.end{padding: 5px 10px;margin:0;}
			.pages a:hover{border-color:#50A8E6;}
			.pages a.num{padding: 5px 10px;}
			.pages span.current{padding: 5px 10px;background:#50A8E6;color:#FFF;font-weight:700;border-color:#50A8E6;}
		</style>
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/web/Public/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="/web/Public/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
		<script type="text/javascript" src="/web/Public/kind/kindeditor-min.js"></script>
		<script type="text/javascript" src="/web/Public/kind/lang/zh_CN.js"></script>
		<script type="text/javascript">
		//判断传入的值选择增加或者修改
		function addedit(type){
			if(type == 1){
				$("#ctr").val("1");
				$("#content").val("");
				$("#time").val("");
				$("#author").val("");
				$("#title").val("");
				$("#summary").val("");
				$("#img_url").val("");
				$("#channel_id").val("");
				$("#addandedit").modal("toggle");
			}else{
				var num = $("input[name=num]:checked");
				if(num.length != 1){
					alert("请选择一项进行操作！");
					return;
				}
				$("#ctr").val("0");
				$("#newsId").val(num.val());
				//回填
				$.post("/web/index.php/Admin/Admin/searchArticleOne",{
					"no":num.val(),
					"channel_id":<?php echo ($page["channel_id"]); ?>
				},function(data){
					$("#content").val(data[0]['content']);
					$("#title").val(data[0]['title']);
					$("#author").val(data[0]['author']);
					$("#summary").val(data[0]['summary']);
					$("#img_url").val(data[0]['img_url']);
					$("#time").val(data[0]['time']);
					var i = data[0]['channel_id'];
					$("#channel_id option").eq(i).attr("selected","selected");
				},"json");
				$("#addandedit").modal("toggle");	
			}
		}
		//删除新闻
 		function hide(){
 			var num = $("input[name=num]:checked");
			if(num.length != 1){
				alert("请选择一项进行操作！");
				return;
			}
			if(confirm('确认删除吗？')){
				$.post("/web/index.php/Admin/Admin/deleteArticle",{
					"no":num.val(),
					"channel_id":<?php echo ($page["channel_id"]); ?>
				},function(data){
						
				},"json");
			}else{
				alert('操作已经取消！');
				return;
			}
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
		//重置按钮事件 
		function clearBtn(){
			$("#stitle").val("");
			$("#stime").val("");
		}
		//点击上传
		function btnclick(){
			$("#pic").click();
		}
		//文件名
		function filenamechange(){
			$("#img_url").val($("#pic").val());
		}
		</script>
	</head>
	<body>
		<div style="margin-top: 20px;">
			<div id="topbtn" class="btn-group" role="group">
    		  <button type="button" class="btn btn-default" onclick="addedit(1);"><span class="glyphicon glyphicon-plus"></span>新增</button>
    		  <button type="button" class="btn btn-default" onclick="addedit(0);"><span class="glyphicon glyphicon-edit"></span>修改</button>
    		  <button type="button" class="btn btn-default" onclick="hide();"><span class="glyphicon glyphicon-trash"></span>删除</button>
    		  <button type="button" class="btn btn-default" onclick="outPut();"><span class="glyphicon glyphicon-file"></span>导出Excel</button>
    		  <!-- 条件搜索 -->
	   		  <form id="searchForm" action="/web/index.php/Admin/Admin/searchArticle" method="post">
	   		  		<div class="input-group">
	   		  			<input type="hidden" name="channel_id" id="channel_id" value="<?php echo ($page["channel_id"]); ?>"/>
		   		  		<input type="text" class="form-control" id="stitle" name="stitle" value="<?php echo ($page["scontent"]); ?>" placeholder="标题关键字">
				      	<input type="text" class="form-control" id="stime" name="stime" value="<?php echo ($page["stime"]); ?>" placeholder="发布时间">
				      	<span class="input-group-btn">
				        	<button class="btn btn-default" type="submit">搜索</button>
				        	<button class="btn btn-default" id="resetBtn" onclick="clearBtn();">清除</button>
				      	</span>
			    	</div>
	   		  </form>
	   		</div>
			<table class="table table-striped table-bordered table-condensed text-center table-hover">
				<tr>
					<th><input type="checkbox" name="nums"/></th><th>所属频道</th><th>文章标题</th><th>文章作者</th><th>文章摘要</th><th>文章内容</th><th>图片地址</th><th>发布时间</th>
	
				</tr>
				<?php if(is_array($data["rows"])): $i = 0; $__LIST__ = $data["rows"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" name="num" value="<?php echo ($row["id"]); ?>"/></td>
						<td><?php echo ($row["name"]); ?></td>
						<td><?php echo ($row["title"]); ?></td>
						<td><?php echo ($row["auther"]); ?></td>
						<td><?php echo ($row["summary"]); ?></td>
						<td><?php echo ($row["content"]); ?></td>
						<td><?php echo ($row["imgurl"]); ?></td>
						<td><?php echo ($row["time"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
		<!-- 模态框 -->
		<div class="modal fade" tabindex="-1" role="dialog" id="addandedit">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">更改状态</h4>
		      </div>
		      <div class="modal-body">
		        <form action="/web/Admin/Admin/addArticle" method="post" class="text-center" enctype="multipart/form-data">
		        	<input type="hidden" name="ctr" id="ctr"/>
		        	<input type="hidden" name="newsId" id="newsId"/>
		        	<div class="form-group form-inline">
		        		<div class="input-group ">
							<div class="input-group-addon">所属频道</div>
							<select name="channel_id" id="channel_id" class="form-control" style="width:170px">
								<option value="-1">选择频道</option>
								<option value="1">资讯中心</option>
								<option value="2">WEB前端</option>
								<option value="3">PHP学习</option>
								<option value="4">留言板</option>
								<option value="5">图片</option>
							</select>
						</div>
		        	</div>
		        	<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">文章标题</div>
							<input id="title" name="title" type="text" class="form-control" placeholder="标题必填" />
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">文章摘要</div>
							<input id="summary" name="summary" type="text" class="form-control"/>
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">发布时间</div>
							<input id="time" name="time" type="text" class="form-control input-append date" placeholder="日期必填" readonly/>
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">文章作者</div>
							<input id="author" name="author" type="text" class="form-control" value="<?php echo ($_SESSION['u']['uname']); ?>" />
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">图片地址</div>
							<input type="file" name="pic" id="pic" style="display:none;" onchange="filenamechange()"/>
							<input style="width:45%;"  class="form-control" type="text" name="img_url" id="img_url" placeholder="请选择文件" readonly>
							<input type="button" class="btn btn-primary" onclick="btnclick()" value="上传文件"/>
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">文章内容</div>
							<textarea id="content" name="content" type="text" style="width: 100px;height:100px;" class="form-control"/></textarea>
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">取消</span></button>
			        <input type="submit" class="btn btn-primary" value="确认">
			      </div>
		        </form>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div>
		<div class="pages">
			<?php echo ($data["page"]); ?>
		</div>
	</body>
</html>