<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>友情链接管理</title>
		<link rel="stylesheet" href="/web/Public/bs/css/bootstrap.min.css">
		<style type="text/css">
			/*表格样式调节*/
			.table tr td:first-child{width: 120px;}
			.table td{vertical-align: middle!important;}
			.table td input{height: 30px;width: 100%;border: none;}
		</style>
		<script type="text/javascript" src="/web/Public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/web/Public/bs/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			//编辑链接
			function edit(obj){
				$.post("/web/admin.php/Set/editLink",{
					'id' : $(obj).parent().parent().find("#id").val(),
					'name' : $(obj).parent().parent().find(".name").val(),
					'url' : $(obj).parent().parent().find(".url").val(),
					'author':$(obj).parent().parent().find(".author").val(),
					'phone' : $(obj).parent().parent().find(".phone").val()
				},function(data){
					if(data.status == 1){
						alert("修改成功！");
					}else{
						alert("修改失败！");
					}
				},"json");
			}
			//新增链接
			function add(){
				$.post("/web/admin.php/Set/addLink",{
					'id' : $("#addid").val(),
					'name' : $("#name").val(),
					'url' : $("#url").val(),
					'author':$("#author").val(),
					'phone' : $("#phone").val()
				},function(data){
					if(data.status == 1){
						alert("新增成功！");
					}else{
						alert("新增失败！");
					}
				},"json");
			}
			//删除
			function del(obj){
				$.post("/web/admin.php/Set/delLink",{
					'id' : $(obj).parent().parent().find("#id").val()
				},function(data){
					if(data.status == 1){
						alert("删除成功！");
					}else{
						alert("删除失败！");
					}
				},"json");
			}
			//打开模态框
			function openModal(){
				$("#add").modal("toggle");
			}
		</script>
	</head>
	<body>
		<div class="linkSet">
			<table class="table table-striped table-bordered">
				<tr>
					<th>编号</th>
					<th>友链名称</th>
					<th>友链地址</th>
					<th>所属人</th>
					<th>联系方式</th>
					<th>操作</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><tr>
						<form>
							<td><input type="text" name="id" id="id" value="<?php echo ($link["id"]); ?>" /></td>
							<td><input type="text" name="name" class="name" value="<?php echo ($link["name"]); ?>" required></td>
							<td><input type="text" name="url" class="url" value="<?php echo ($link["url"]); ?>" required></td>
							<td><input type="text" name="author" class="author" value="<?php echo ($link["author"]); ?>"></td>
							<td><input type="text" name="phone" class="phone" value="<?php echo ($link["phone"]); ?>"></td>
							<td><input type="button" class="btn btn-primary" value="修改" onclick="edit(this)" /></td>
							<td><input type="button" class="btn btn-primary" value="删除" onclick="del(this)" /></td>
						</form>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			<input type="button" class="btn btn-primary" value="新增" onclick="openModal()" />
		</div>
		<!--模态框-->
		<div class="modal fade" tabindex="-1" role="dialog" id="add">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">新增链接</h4>
		      </div>
		      <div class="modal-body">
		        <form class="text-center">
		        	<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">编号</div>
							<input id="addid" name="adid" type="text"  class="form-control" />
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
		        	<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">链接名称</div>
							<input id="name" name="name" type="text"  class="form-control" />
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">链接地址</div>
							<input id="url" name="url" type="text" class="form-control" />
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">所属人</div>
							<input id="author" name="author" type="text" class="form-control" />
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group form-inline">
						<div class="input-group ">
							<div class="input-group-addon">联系方式</div>
							<input id="phone" name="phone" type="text" class="form-control" />
							<span class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">取消</span></button>
			        <input type="button" class="btn btn-primary" value="确认" onclick="add()">
			      </div>
		        </form>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div>
	</body>
</html>