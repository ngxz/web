<?php
namespace Web\Controller;

use Think\Controller;
class WebController extends Controller{
    /**
     * 显示web频道的文章
     */
    public function web(){
        
        $mod = M("tb_article");
        //总条数
        $total = $mod->where("channelid = 2")->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询web的数据按时间倒序
        $web = $mod->where("channelid = 2")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"web"=>$web);
        //查询频道名
        $channel = M("tb_channel")->where("id = 2")->find();
        $this->assign("channel",$channel);
        //查询栏目列表
        $categorys = M("tb_category")->where("channel = 2")->select();
        $this->assign("categorys",$categorys);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data);
        $this->display("web");
    }
    /**
     * 按分类下的栏目查询
     */
    public function webbycategory($category){
        $mod = M("tb_article");
        //总条数
        $total = $mod->where("category = '$category'")->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询当前的栏目数据按时间倒序
        $web = $mod->where("category = '$category'")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"web"=>$web);
        //查询频道名
        $channel = M("tb_channel")->where("id = 2")->find();
        $this->assign("channel",$channel);
        //查询点击的栏目
        $category = M("tb_category")->where("id = '$category'")->find();
        $this->assign("category",$category);
        //查询栏目列表
        $categorys = M("tb_category")->where("channel = 2")->select();
        $this->assign("categorys",$categorys);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data);
        $this->display("web");
    }
}

?>