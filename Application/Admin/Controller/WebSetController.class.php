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
     * 查询/编辑友链
     */
    public function linkSet(){
        if (IS_POST){
            $result = $this->webset_service->linkSet(I('post.'));
            $data = array();
            if (!$result){
                $data['msg'] = $this->webset_service->getError();
                $this->ajaxReturn($data);
                exit();
            }
            $data['msg'] = '修改成功';
            $this->ajaxReturn($data);
        }else {
            //友链列表
            $links = M("link")->select();
            $this->assign('links',$links)->display();
        }
    }
    /**
     * 增加链接
     * 2018/1/13
     */
    public function addLink(){
        $result = $this->webset_service->addlink(I('post.'));
        if (!$result){
            $data['msg'] = $this->webset_service->getError();
            $this->ajaxReturn($data);
            exit();
        }
        $data['msg'] = '修改成功';
        $this->ajaxReturn($data);
    }
    /**
     * 删除链接
     * 2018/1/13
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