//本文件是留言表单的js

//刷新验证码函数
function updateCode(obj){
	var img = $(obj).find("img");
	var src = $(img)[0].src;
	
}
//提交留言
function send(){
	//获取值
	var title = $("#title").val();
	var mail = $("#mail").val();
	var content = $("#content").val();
	var code = $("#code").val();
	//异步提交
	if(!title){
		alert("标题忘了填哦！");
		return;
	}
	if(!content){
		alert("内容忘了填哦！");
		return;
	}
	if(!code){
		alert("二维码忘了填哦！");
		return;
	}
	$.post("send",{
		"title":title,
		"mail":mail,
		"content":content,
		"code":code
	},function(data){
		if(data.status == 1){
			alert("留言成功！三秒后自动刷新页面！");
			setTimeout(function(){
				location.reload();
			},3000)
		}else{
			alert(data.message);
		}
	},"json");
}
