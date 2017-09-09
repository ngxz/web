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
        $total = $mod->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询web的数据按时间倒序
        $web = $mod->where("channelid = 2")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"web"=>$web);
        $this->assign("data",$data);
        $this->display("web");
    }
}

?>