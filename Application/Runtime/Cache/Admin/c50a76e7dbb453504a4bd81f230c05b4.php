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
			function edit(){
				$.post("/web/admin.php/Set/editLink",{
					'id' : $(".id").val(),
					'name' : $(".name").val(),
					'url' : $(".url").val(),
					'author':$(".author").val(),
					'phone' : $(".phone").val()
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
		<div class="linkSet">
			<table class="table table-striped table-bordered">
				<tr>
					<th>友链名称</th>
					<th>友链地址</th>
					<th>所属人</th>
					<th>联系方式</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><tr>
						<form>
							<input name="id" class="id" value="<?php echo ($link["id"]); ?>" hidden />
							<td><input type="text" name="name" class="name" value="<?php echo ($link["name"]); ?>" required></td>
							<td><input type="text" name="url" class="url" value="<?php echo ($link["url"]); ?>" required></td>
							<td><input type="text" name="author" class="author" value="<?php echo ($link["author"]); ?>"></td>
							<td><input type="text" name="phone" class="phone" value="<?php echo ($link["phone"]); ?>"></td>
							<td><input type="button" class="btn btn-primary" value="修改" onclick="edit()" /></td>
						</form>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
	</body>
</html>