<?php
namespace Web\Controller;

use Think\Controller;
class CommonController extends Controller{
    public function _initialize(){
        //移动设备浏览，则切换模板
        if (ismobile()) {
            //设置默认默认主题为 Mobile
//          C('DEFAULT_THEME','Mobile');
			//设置默认默认视图为 Mobile
            C('DEFAULT_V_LAYER','Mobile');
        }
        //页脚
        $links = M('link')->select();
        $this->assign('links',$links);
        //SEO字
        $seo = M('config')->where("id = 1")->find();
        $this->assign('seo',$seo);
    }
}

?>