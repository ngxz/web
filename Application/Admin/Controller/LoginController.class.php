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
	            $success['message'] = '登录成功a';
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
	}
?>