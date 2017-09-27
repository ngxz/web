<?php
namespace Admin\Controller;

use Think\Controller;
class SetController extends Controller
{
    /**
     * 网站信息设置
     */
    public function webSet(){
        $config = M("tb_config")->find();
        $this->assign('config',$config);
        $this->display();
    }
    /**
     * 修改网站信息
     * @param string $name
     * @param string $keyword
     * @param string $description
     * @param string $mail
     * @param string $beian
     */
    public function edit($name='',$keyword='',$description='',$contect='',$mail='',$beian=''){
        $data = array(
            'name'=>$name,
            'keyword'=>$keyword,
            'description'=>$description,
            'contect'=>$contect,
            'mail'=>$mail,
            'beian'=>$beian
        );
        $re = M("tb_config")->field("name,beian,contect,mail,keyword,description")->where("id = 1")->save($data);
        $re?$sta['status'] = 1 : $sta['status'] = 0;
        $this->ajaxReturn($sta);
    }
    /**
     * 菜单管理
     */
    public function menuSet(){
        echo '暂未开放';
    }
}

?>