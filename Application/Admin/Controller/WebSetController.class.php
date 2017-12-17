<?php
namespace Admin\Controller;


use Admin\Controller\PublicController;
class WebSetController extends PublicController{
    public function _initialize(){
        $this->webset_service = D('WebSet','Service');
    }
    /**
     * 查看和修改网站配置
     * 标题、备案号、联系方式、seo关键词等
     */
    public function webConfig(){
        if (IS_POST){
            $result = $this->webset_service->editConfig(I('post.'));
            $data = array();
            if (!$result){
                $data['msg'] = $this->webset_service->getError();
                $this->ajaxReturn($data);
                exit();
            }
            $data['msg'] = '修改成功';
            $this->ajaxReturn($data);
        }else {
            //网站配置
            $config = M("config")->find();
            $this->assign('config',$config)->display();
        }
    }
    /**
     * 网站信息查询
     */
    public function webSet(){
        $config = M("config")->find();
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
        $re = M("config")->field("name,beian,contect,mail,keyword,description")->where("id = 1")->save($data);
        $re?$sta['status'] = 1 : $sta['status'] = 0;
        $this->ajaxReturn($sta);
    }
    /**
     * 查询友链
     */
    public function linkSet(){
        $links = M("link")->select();
        $this->assign('links',$links);
        $this->display();
    }
    /**
     * 编辑链接
     * @param unknown $id
     * @param string $url
     * @param string $name
     * @param string $author
     * @param string $phone
     */
    public function editLink($id,$url='',$name='',$author='',$phone=''){
        $data=array(
            'name'=>$name,
            'url'=>$url,
            'author'=>$author,
            'phone'=>$phone
        );
        $re = M("link")->field("name,url,author,phone")->where("id = $id")->save($data);
        $re?$sta['status'] = 1 : $sta['status'] = 0;
        $this->ajaxReturn($sta);
    }
    /**
     * 增加链接
     * @param unknown $id
     * @param string $url
     * @param string $name
     * @param string $author
     * @param string $phone
     */
    public function addLink($id,$url='',$name='',$author='',$phone=''){
        $data=array(
            'id'=>$id,
            'name'=>$name,
            'url'=>$url,
            'author'=>$author,
            'phone'=>$phone
        );
        $re = M("link")->field("id,name,url,author,phone")->add($data);
        $re?$sta['status'] = 1 : $sta['status'] = 0;
        $this->ajaxReturn($sta);
    }
    /**
     * 删除链接
     */
    public function delLink($id){
        $re = M("link")->where("id = '$id'")->delete();
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