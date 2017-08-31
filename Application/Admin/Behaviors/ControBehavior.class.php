<?php

namespace Home\Behaviors;


use Think\Behavior;
class ControBehavior extends Behavior{
         function run(&$params){
            $allowarr = array('index');
            $cname = strtolower(CONTROLLER_NAME);
            $aname = strtolower(ACTION_NAME);
            if (!in_array($cname, $allowarr)&&!$aname){
//                 echo "不允许访问";
                echo "<script type='text/javascript'>";
                echo "window.top.location.href='".U('/Home/Index/loginpage')."';";
                echo "</script>";
                exit();
            }
         }
}
