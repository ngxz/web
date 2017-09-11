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
        $this->assign("data",$data);
        $this->display("news");
    }
}

?>