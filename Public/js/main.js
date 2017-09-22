//百度统计代码
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?e47e4f1811685155b314133ec7606da3";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
$(function(){
	//首页图片区鼠标移入效果
	$(".photo ul li").hover(function(){
		
		$(this).find('span').stop().animate({top:0},100);
	},function(){
		$(this).find('span').stop().animate({top:260},100);
	});
	
	
});
