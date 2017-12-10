<?php
namespace Web\controller;
use Think\Controller;
class IndexController extends Controller {
	public function _initialize(){
	    $this->article_service = D('Article','Service');
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