<?php
namespace Web\Controller;

use Think\Controller;
class FeedController extends Controller{
    /**
     * 显示feed频道的文章
     */
    public function web(){
        
        $mod = M("tb_article");
        //总条数
        $total = $mod->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询php的数据按时间倒序
        $php = $mod->where("channelid = 3")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"php"=>$php);
        $this->assign("data",$data);
        $this->display("php");
    }
}

?>