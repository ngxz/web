<?php
namespace Admin\Service;

class WebSetService{
    public function __construct(){
        $this->model = M('config');
    }
    /**
     * 修改网站配置信息
     * @param unknown $params
     */
    public function editConfig($params){
        if (!$params['name']){
            $this->error = '网站名字未输入';
            return false;
        }
        if (!$params['keyword']){
            $this->error = '网站关键字未输入';
            return false;
        }
        if (!$params['description']){
            $this->error = '网站描述未输入';
            return false;
        }
        if (!$params['beian']){
            $this->error = '备案信息未输入';
            return false;
        }
        $data = array();
        $data['name'] = $params['name'];
        $data['keyword'] = $params['keyword'];
        $data['description'] = $params['description'];
        $data['beian'] = $params['beian'];
        //修改
        $result = $this->model->where('id = 1')->save($data);
        if (!$result){
            $this->error = '修改失败';
            return false;
        }
        return true;
    }
    Public function getError(){
        return $this->error;
    }
}

?>