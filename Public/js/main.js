$(function(){
	//首页图片区鼠标移入效果
	$(".photo ul li").hover(function(){
		
		$(this).find('span').stop().animate({top:0},100);
	},function(){
		$(this).find('span').stop().animate({top:260},100);
	});
	
	
});
