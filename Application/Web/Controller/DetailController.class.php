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
        $row = M("article")->join("tb_category ON tb_category.id = tb_article.category")->where("tb_article.id = '$id' AND channel_id = '$channelid'")->find();
        //查询频道名字，面包屑用
        $channel = M("channel")->where("id = '$channelid'")->find();
        $this->assign("channel",$channel);
        
        //查询上一页的标题和id
        $pre = M("article")->where("id < '$id' AND channel_id = '$channelid'")->order("id desc")->limit('1')->find();
        $this->assign("pre",$pre);
        //查询下一页的标题和id
        $next = M("article")->where("id > '$id' AND channel_id = '$channelid'")->order("id desc")->limit('1')->find();
        $this->assign("next",$next);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        //本页内容输出
        $this->assign("row",$row);
        $this->display("article");
    }
    
}

?>