<?php
namespace Web\Controller;

use Web\Controller\CommonController;
class DetailController extends CommonController{
    public function _initialize(){
        $this->detail_service = D('Detail','Service');
        parent::_initialize();
    }
    /**
     * 查询当前点击的文章的id，显示详情页面
     * @param int $id
     */
    public function article($id,$channelid){
        $result = $this->detail_service->article(I('param.'));
//         var_dump($result['channel']);
        //本页内容输出
        $this->assign("rows",$result);
        $this->display("article");
    }
    
}

?>