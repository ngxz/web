<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	* 用户登录
	*/
	class LoginController extends Controller{
	    public function _initialize(){
	        $this->login_service = D('Login','Service');
	    }
	    /**
	     * 空方法
	     */
	    public function _empty(){
	        redirect(U('Admin/Login/login'),5,'该方法不存在，5秒后跳转调转到登录');
	    }
		/**
	     * 登录验证
	     */
	    public function login(){
	        if (IS_POST){
	            $result = $this->login_service->login(I('post.'));
	            if (!$result){
	                $error['code'] = false;
	                $error['message'] = $this->login_service->error;
	                $this->ajaxReturn($error);
	            }
	            $success['code'] = true;
	            $success['message'] = '登录成功！';
	            $this->ajaxReturn($success);
	        }else {
	            $this->display("login");
	        }
	        
	    }
	    /**
	     * 用户退出
	     */
	    public function logout(){
	        session(null);
	        echo "<script>";
            echo "window.top.location.href = "."'".U('Login/login')."'";
            echo "</script>";
	    }
	    /**
	     * 修改用户信息
	     */
	    public function editUser(){
	        if (IS_POST){
	            $result = $this->login_service->editUser(I('post.'));
	            $data = array();
	            if (!$result){
	                $data['status'] = 0;
	                $data['msg'] = $this->login_service->getError();
	                $this->ajaxReturn($data);
	            }
	            $data['status'] = 1;
	            $data['msg'] = '修改成功！';
	            $this->ajaxReturn($data);
	        }else {
	            $result = $this->login_service->getUser();
	            $this->assign('user',$result)->display();
	        }
	    }
	}
?>