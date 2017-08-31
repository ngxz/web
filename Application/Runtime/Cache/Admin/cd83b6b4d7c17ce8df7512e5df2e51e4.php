<?php if (!defined('THINK_PATH')) exit(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title></title>
		<link rel="icon" href="/web/Public/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		
		<style type="text/css">
			#topbtn span{margin-right:5px;}
            .search{height:33px;margin-left:10px;padding:0;}
			#searchForm input{width:50%;}
			.table tr th{text-align:center;}
			
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
//					"channel_id":0
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
//					"channel_id":<?php echo ($page["channel_id"]); ?>
				},function(data){
						
				},"json");
			}else{
				alert('操作已经取消！');
				return;
			}
 		} 
		//重置按钮事件 
		function clearBtn(){
			$("#stitle").val("");
			$("#stime").val("");
		}
		
		</script>
	</head>
	<body>
		<div style="margin-top: 20px;">
			<div id="topbtn" class="btn-group" role="group">
    		  <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span><a href="/web/index.php/Admin/Admin/add">新增</a></button>
    		  <button type="button" class="btn btn-default" onclick="edit();"><span class="glyphicon glyphicon-edit"></span>修改</button>
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
		<!--分页-->
		<div class="pages">
			<?php echo ($data["page"]); ?>
		</div>
	</body>
</html>