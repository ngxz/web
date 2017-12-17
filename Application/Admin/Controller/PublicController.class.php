<?php
namespace Admin\Controller;

use Think\Controller;
class PublicController extends Controller
{
    public function _initialize(){
        if(!$_SESSION['uid']){
            redirect(U('Admin/Login/login'));
        }
    }
}

?>