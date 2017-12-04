<?php
namespace Web\Controller;

use Think\Controller;
class WebController extends Controller{
    public function _initialize(){
        $this->article_model = D('Article','Model');
    }
    /**
     * 显示web频道的文章
     */
    public function web(){
        $data = $this->article_model->weblist();
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data)->display("web");
    }
    /**
     * 按分类下的栏目查询
     */
    public function webbycategory($category){
        $data = $this->article_model->webcategory($category);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        $this->assign("data",$data)->display("web");
    }
}

?>