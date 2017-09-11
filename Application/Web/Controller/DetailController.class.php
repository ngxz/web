<?php
namespace Web\Controller;

use Think\Controller;
class DetailController extends Controller{
    /**
     * 查询当前点击的文章的id，显示详情页面
     * @param int $id
     */
    public function article($id,$channelid){
        //查询本页内容
        $row = M("tb_article")->where("id = '$id' AND channelid = '$channelid'")->find();
        //查询频道名字，面包屑用
        $channel = M("tb_channel")->where("id = '$channelid'")->find();
        $this->assign("channel",$channel);
        //查询上一页的标题和id
        $pre = M("tb_article")->where("id < '$id' AND channelid = '$channelid'")->order("id desc")->limit('1')->find();
        $this->assign("pre",$pre);
        //查询下一页的标题和id
        $next = M("tb_article")->where("id > '$id' AND channelid = '$channelid'")->order("id desc")->limit('1')->find();
        $this->assign("next",$next);
        //本页内容输出
        $this->assign("row",$row);
        $this->display("article");
    }
    
}

?>