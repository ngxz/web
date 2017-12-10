<?php
namespace Web\Controller;

use Think\Controller;
class WebController extends Controller{
    public function _initialize(){
        $this->article_service = D('Article','Service');
    }
    /**
     * 显示web频道的文章
     */
    public function web(){
        $data = $this->article_service->weblist();
        
        $this->assign("data",$data)->display("web");
    }
    /**
     * 按分类下的栏目查询
     */
    public function webbycategory($category){
        $data = $this->article_service->webcategory($category);
        
        
        $this->assign("data",$data)->display("web");
    }
}

?>