<?php
namespace Web\Controller;

use Think\Controller;
class PhpController extends Controller{
    public function _initialize(){
        $this->article_service = D('Article','Service');
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