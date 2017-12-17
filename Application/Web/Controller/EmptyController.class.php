<?php
namespace Web\Controller;

use Think\Controller;
class EmptyController extends Controller{
    /**
     * 空控制器
     * 跳转到首页
     */
    public function index(){
        echo '
            <div style="margin: 0 auto;text-align: center;margin-top: 100px;">
			     <strong>很抱歉，您当前访问的网页不存在，请访问我们的首页：<a href="http://www.yuanrb.com">南广轩主的小站</a></strong>
		    </div>    
        ';
    }
}

?>