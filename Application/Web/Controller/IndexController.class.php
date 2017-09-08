<?php
namespace Web\controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//直接显示主页
    	$this->display();
    }
    //关于我
    public function about(){
        $this->display("about");
    }
}