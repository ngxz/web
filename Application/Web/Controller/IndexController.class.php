<?php
namespace Web\controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     * 首页
     */
    public function index(){
        //首页显示故事，即站内新闻
        $news = M("tb_article")->where("channelid = 1")->order("time desc")->limit("5")->select();
        $this->assign("news",$news);
        //首页显示图文
        $photos = M("tb_article")->where("channelid = 5")->order("time desc")->limit("4")->select();
        $this->assign("photos",$photos);
        //调用加载配置方法
        R("Admin/Set/webLoad");
    	//显示主页
    	$this->display();
    }
    /**
     * 关于我
     */
    public function about(){
        $this->display("about");
    }
}