<?php
namespace Web\Service;

class DetailService{
    public function __construct(){
        $this->model = M('article');
    }
    public function article($params){
        $channelid = $params['channelid'];
        $id = $params['id'];
        //增加阅读量
//         $ip = get_client_ip();
//         var_dump($_SESSION['ip']);
//         var_dump($ip);
//         if (!$_SESSION['ip'] || $_SESSION['ip'] != $ip){
//             $this->model->where("id = '$id'")->setInc('read_total',1);
//             $_SESSION['ip'] = $ip;
//         }
        //查询本页内容
        $row = $this->model->join("tb_category ON tb_category.id = tb_article.category")->where("tb_article.id = '$id' AND channel_id = '$channelid'")->find();
        //查询频道名字，面包屑用
        $channel = M('channel')->where("id = '$channelid'")->find();
        //查询上一页的标题和id
        $pre = $this->model->where("id < '$id' AND channel_id = '$channelid'")->order("id desc")->limit('1')->find();
        //查询下一页的标题和id
        $next = $this->model->where("id > '$id' AND channel_id = '$channelid'")->order("id")->limit('1')->find();
        $rows = array('row'=>$row,'channel'=>$channel,'pre'=>$pre,'next'=>$next);
        return $rows;
    }
}

?>