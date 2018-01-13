<?php
namespace Admin\Service;

class LoginService{
    public function __construct(){
        $this->adminmodel = D('admin');
    }
    /**
     * 验证帐号密码
     * @param unknown $params
     */
    public function login($params){
        $uid = $params['uid'];
        $pwd = $params['pwd'];
        if (!uid){
            $this->error = '账户不能为空';
            return false;
        }
        if (!pwd){
            $this->error = '密码不能为空';
            return false;
        }
        $sqlmap = array();
        $sqlmap['uid'] = $uid;
        $result = $this->adminmodel->where($sqlmap)->find();
        if (!$result){
            $this->error = '用户不存在';
            return false;
        }
        if ($result['pwd'] != md5($pwd)){
            $this->error = '密码错误';
            return false;
        }
        //保存session
        $_SESSION['uid']=$uid;
        $_SESSION['user']=$result;
        //录入登录时间
        $sqlmap = array();
        $sqlmap['uid'] = $uid;
        $data = array();
        $data[login_time] = time();
        $this->adminmodel->where($sqlmap)->save($data);
        return true;
    }
    /**
     * 获取登录人信息
     */
    public function getUser(){
        $sqlmap['uid'] = $_SESSION['uid'];
        $result = $this->adminmodel->where($sqlmap)->find();
        return $result;
    }
    /**
     * 修改登录人信息
     */
    public function editUser($params){
        if (!$params['tname']){
            $this->error = '真实名字未填写！';
            return false;
        }
        if (!$params['uname']){
            $this->error = '昵称未填写！';
            return false;
        }
        $sqlmap['uid'] = $_SESSION['uid'];
        $data['tname'] = $params['tname'];
        $data['uname'] = $params['uname'];
        if ($params['pwd']){
            $data['pwd'] = md5($params['pwd']);
            $result = $this->adminmodel->where($sqlmap)->save($data);
            if (!$result){
                $this->error = "没有任何改变！";
                return false;
            }
        }
        $result = $this->adminmodel->where($sqlmap)->save($data);
        if (!$result){
            $this->error = "没有任何改变！";
            return false;
        }
        return $result;
    }
    public function getError(){
        return $this->error;
    }
}

?>