<?php
namespace Web\controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     * 首页
     */
    public function index(){
        //首页显示故事，即资讯最新文章
        $news = M("tb_article")->where("channelid = 1")->order("time desc")->limit("5")->select();
        $this->assign("news",$news);
        //首页显示文章，除资讯外的最新文章
        $articles = M("tb_article")->where("channelid = 2 or channelid = 3")->order("time desc")->limit("5")->select();
        $this->assign("articles",$articles);
        //调用加载配置方法
        R("Admin/Set/webLoad");
    	//显示主页
    	$this->display();
    }
    /**
     * 关于我
     */
    public function about(){
    	//调用加载配置方法
        R("Admin/Set/webLoad");
        $this->display("about");
    }
}