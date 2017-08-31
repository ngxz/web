<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	* 用户登录
	*/
	class LoginController extends Controller{
	    /**
	     * 跳转登录页
	     */
	    public function loginpage(){
	        $this->display("login");
	    }
		/**
	     * 登录验证
	     */
	    public function login(){
	        $uid = I("uid");
	        $pwd = I("pwd");
	        if (!uid){
	            $this->redirect("/");
	            exit();
	        }else {
	            $mod = M("tb_admin");
	            $res = $mod->where("uid = '$uid'")->find();
	            if (md5($pwd) == $res['pwd']){
	                //保存session
	                $_SESSION['uid']=$uid;
	                $sta["status"] = 1;
	            }else {
	                //提示失败状态码
	                $sta["status"] = 2;
	            }
	            //返回状态
	            $this->ajaxReturn($sta);
	        }
	    }
	    public function home(){
	        \Think\Hook::listen('islogin');
	        $rows = M("tb_menus")->select();
	        //获取登录地ip
	        $ip = get_client_ip();
	        $Ips = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
	        $local = $Ips->getlocation($ip); // 获取某个IP地址所在的位置
	        $local = mb_convert_encoding($local, "utf-8", "gb2312"); // 编码转换，否则乱码
	        $local = $local['country']."-".$local['area'];
	        
	        $this->assign("rows",$rows);
	        $this->display("Admin:welcome");
	    }
	    /**
	     * 用户退出
	     */
	    public function logout(){
	        session(null);
	        $this->redirect("/");
	    }
	}
?>