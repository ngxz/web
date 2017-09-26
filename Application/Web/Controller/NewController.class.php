<?php
namespace Web\Controller;

use Think\Controller;
class NewController extends Controller{
    /**
     * 显示站内新闻
     */
    public function news(){
        
        $mod = M("tb_article");
        //总条数
        $total = $mod->where("channelid = 1")->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询新闻的数据按时间倒序
        $news = $mod->where("channelid = 1")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"news"=>$news);
        //查询频道名
        $channel = M("tb_channel")->where("id = 1")->find();
        $this->assign("channel",$channel);
        //查询栏目列表
        $categorys = M("tb_category")->where("channel = 1")->select();
        $this->assign("categorys",$categorys);
        //
        $this->assign("data",$data);
        $this->display("news");
    }
	/**
	 * 按分类下的栏目查询
	 */
	 public function newsbycategory($category){
	     $mod = M("tb_article");
	     //总条数
	     $total = $mod->where("category = '$category'")->count();
	     $page = getpage($total,10);
	     //分页显示输出
	     $show = $page->show();
	     //只查询当前的栏目数据按时间倒序
	     $news = $mod->where("category = '$category'")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
	     $data = array("show"=>$show,"news"=>$news);
	     //查询频道名
	     $channel = M("tb_channel")->where("id = 1")->find();
	     $this->assign("channel",$channel);
	     //查询点击的栏目
	     $category = M("tb_category")->where("id = '$category'")->find();
	     $this->assign("category",$category);
	     //查询栏目列表
	     $categorys = M("tb_category")->where("channel = 1")->select();
	     $this->assign("categorys",$categorys);
	     
	     $this->assign("data",$data);
	     $this->display("news");
	 }
}

?>