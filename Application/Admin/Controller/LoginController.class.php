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
	            $this->redirect("Login:loginpage");
	            exit();
	        }else {
	            $mod = M("tb_admin");
	            $res = $mod->where("uid = '$uid'")->find();
	            
	            if (md5($pwd) == $res['pwd']){
	                $tname = $res['tname'];
	                //保存session
	                $_SESSION['uid']=$uid;
	                $_SESSION['tname']=$tname;
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
	        //获取ip时间等
	        $Ips = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
	        $local = $Ips->getlocation(); // 获取某个IP地址所在的位置
// 	        $local = mb_convert_encoding($local, "utf-8", "gb2312"); // 编码转换，否则乱码
 	        $local = $local['country'];
	        $time = date("Y-m-d H:i:s");
	        $_SESSION['time']=$time;
	        $_SESSION['local']=$local;
	        $this->assign("rows",$rows);
	        $this->display("Admin:welcome");
	    }
	    /**
	     * 获取当前用户的资料
	     */
	    public function adminMessage(){
	        $uid = $_SESSION['uid'];
	        $user = M("tb_admin")->where("uid = '$uid'")->find();
	        $this->assign('user',$user);
	        $this->display('adminMessage');
	    }
	    /**
	     * 修改当前用户的资料
	     * @param unknown $uid
	     * @param string $tname
	     * @param string $uname
	     * @param string $email
	     * @param string $pwd
	     */
	    public function adminMessageEdit($uid,$tname='',$uname='',$email='',$pwd=''){
	        $pwd = md5($pwd);
	        $data=array(
	            "tname"=>$tname,
	            "uname"=>$uname,
	            "email"=>$email,
	            "pwd"=>$pwd
	        );
	        if ($pwd){
	            M("tb_admin")->where("uid='$uid'")->field("tname,uname,email,icon,pwd")->save($data);
	        }else {
	            M("tb_admin")->where("uid='$uid'")->field("tname,uname,email,icon")->save($data);
	        }
	        $this->adminMessage();
	        
	    }
	    /**
	     * 用户退出
	     */
	    public function logout(){
	        session(null);
	        $this->redirect("Login:loginpage");
	    }
	}
?>