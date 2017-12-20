<?php
namespace Web\Controller;

use Web\Controller\CommonController;
class PhpController extends CommonController{
    public function _initialize(){
        $this->article_service = D('Article','Service');
        parent::_initialize();
    }
    /**
     * 显示php频道的文章
     */
    public function php(){
        $data = $this->article_service->phplist();
        
        
        $this->assign("data",$data)->display();
    }
    /**
     * 按分类下的栏目查询
     */
    public function phpbycategory($category){
        $data = $this->article_service->phpcategory($category);
        
        
        $this->assign("data",$data)->display('php');
        
    }
}

?>