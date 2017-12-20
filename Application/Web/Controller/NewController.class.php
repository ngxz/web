<?php
namespace Web\Controller;

use Web\Controller\CommonController;
class NewController extends CommonController{
    public function _initialize(){
        $this->article_service = D('Article','Service');
        parent::_initialize();
    }
    /**
     * 显示站内新闻
     */
    public function news(){
        $data = $this->article_service->newslist();
        $this->assign("data",$data)->display();
    }
	/**
	 * 按分类下的栏目查询
	 */
	 public function newsbycategory($category){
	     $data = $this->article_service->newscategory($category);
	     
	     $this->assign("data",$data)->display("news");
	 }
}

?>