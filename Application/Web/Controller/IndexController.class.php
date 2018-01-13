<?php
namespace Web\Controller;

use Web\Controller\CommonController;
class IndexController extends CommonController{
	public function _initialize(){
	    $this->article_service = D('Article','Service');
	    parent::_initialize();
	}
    /**
     * 首页
     */
    public function index(){
        //首页显示故事，即资讯最新文章
        $news = $this->article_service->indexnews();
        $this->assign("news",$news);
        //首页显示文章，除资讯外的最新文章
        $articles = $this->article_service->indexarticle();
        $this->assign("articles",$articles);
        //首页右侧热文推荐
        $recommend = $this->article_service->indexrecommend();
        $this->assign("recommend",$recommend);
    	//显示主页
    	$this->display();
    	
    }
    /**
     * 关于我
     */
    public function about(){
    	//调用加载配置方法
        $this->display("about");
    }
}