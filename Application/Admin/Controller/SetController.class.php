<?php
namespace Admin\Controller;

use Think\Controller;
class SetController extends Controller
{
    /**
     * 加载网站配置
     * 标题、备案号、联系方式、seo关键词等
     */
    public function webLoad(){
        //网站配置
        $config = M("tb_config")->find();
        $this->assign('config',$config);
        //友链
        $links = M("tb_link")->select();
        $this->assign('links',$links);
    }
    /**
     * 网站信息查询
     */
    public function webSet(){
        $config = M("tb_config")->find();
        $this->assign('config',$config);
        $this->display();
    }
    /**
     * 修改网站信息
     * @param string $name
     * @param string $keyword
     * @param string $description
     * @param string $mail
     * @param string $beian
     */
    public function edit($name='',$keyword='',$description='',$contect='',$mail='',$beian=''){
        $data = array(
            'name'=>$name,
            'keyword'=>$keyword,
            'description'=>$description,
            'contect'=>$contect,
            'mail'=>$mail,
            'beian'=>$beian
        );
        $re = M("tb_config")->field("name,beian,contect,mail,keyword,description")->where("id = 1")->save($data);
        $re?$sta['status'] = 1 : $sta['status'] = 0;
        $this->ajaxReturn($sta);
    }
    /**
     * 查询友链
     */
    public function linkSet(){
        $links = M("tb_link")->select();
        $this->assign('links',$links);
        $this->display();
    }
    public function editLink($id,$url='',$name='',$author='',$phone=''){
        $data=array(
            'name'=>$name,
            'url'=>'http://'.$url,
            'author'=>$author,
            'phone'=>$phone
        );
        $re = M("tb_link")->field("name,url,author,phone")->where("id = $id")->save($data);
        $re?$sta['status'] = 1 : $sta['status'] = 0;
        $this->ajaxReturn($sta);
    }
    /**
     * 菜单管理
     */
    public function menuSet(){
        echo '暂未开放';
    }
}

?>