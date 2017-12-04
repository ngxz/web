<?php
namespace Web\Controller;

use Think\Controller;
class PhpController extends Controller{
    public function _initialize(){
        $this->article_model = D('Article','Model');
    }
    /**
     * 显示php频道的文章
     */
    public function php(){
        $data = $this->article_model->phplist();
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data)->display();
    }
    /**
     * 按分类下的栏目查询
     */
    public function phpbycategory($category){
        $data = $this->article_model->phpcategory($category);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data)->display('php');
        
    }
}

?>