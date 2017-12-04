<?php
namespace Web\Controller;

use Think\Controller;
class PublicController extends Controller
{
    public function _initialize(){
        //调用加载配置方法
        R("Admin/Set/webLoad");
    }
}

?>