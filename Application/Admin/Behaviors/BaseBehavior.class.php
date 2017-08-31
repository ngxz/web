<?php

namespace Admin\Behaviors;


use Think\Behavior;
class BaseBehavior extends Behavior{
         function run(&$params){
            $islogin = $_SESSION['uid']?1:0;
            if (!$islogin){
                echo "<script type='text/javascript'>";
                echo "window.top.location.href='".U('/index.php/Admin/Admin/loginpage')."';";
                echo "</script>";
                exit();
             }
         }
}
