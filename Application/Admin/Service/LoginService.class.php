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
        return true;
    }
}

?>