<?php
namespace Web\Controller;

use Think\Controller;
class PhpController extends Controller{
    /**
     * 显示php频道的文章
     */
    public function php(){
        
        $mod = M("tb_article");
        //总条数
        $total = $mod->where("channelid = 3")->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询php的数据按时间倒序
        $php = $mod->where("channelid = 3")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"php"=>$php);
        //查询频道名
        $channel = M("tb_channel")->where("id = 3")->find();
        $this->assign("channel",$channel);
        //查询栏目列表
        $categorys = M("tb_category")->where("channel = 3")->select();
        $this->assign("categorys",$categorys);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data);
        $this->display("php");
    }
    /**
     * 按分类下的栏目查询
     */
    public function phpbycategory($category){
        $mod = M("tb_article");
        //总条数
        $total = $mod->where("category = '$category'")->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询当前的栏目数据按时间倒序
        $php = $mod->where("category = '$category'")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"php"=>$php);
        //查询频道名
        $channel = M("tb_channel")->where("id = 3")->find();
        $this->assign("channel",$channel);
        //查询点击的栏目
        $category = M("tb_category")->where("id = '$category'")->find();
        $this->assign("category",$category);
        //查询栏目列表
        $categorys = M("tb_category")->where("channel = 3")->select();
        $this->assign("categorys",$categorys);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data);
        $this->display("php");
    }
}

?>