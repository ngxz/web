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
        $this->assign("data",$data);
        $this->display("php");
    }
}

?>