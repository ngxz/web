<?php
namespace Web\Controller;

use Think\Controller;
class NewController extends Controller{
    public function _initialize(){
        $this->article_model = D('Article','Model');
    }
    /**
     * 显示站内新闻
     */
    public function news(){
        $data = $this->article_model->newslist();
//         var_dump($data);die();
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        //
        $this->assign("data",$data)->display();
    }
	/**
	 * 按分类下的栏目查询
	 */
	 public function newsbycategory($category){
	     $data = $this->article_model->newscategory($category);
	     
	     //调用加载配置方法
	     R("Admin/Set/webLoad");
	     
	     $this->assign("data",$data)->display("news");
	 }
}

?>