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
	     * 跳转登录页
	     */
	    public function loginpage(){
	        if($_SESSION['uid']){
	           redirect(U('home'));
	        }
	        echo "<script>";
            echo "window.top.location.href = "."'".U('Login/login')."'";
            echo "</script>";
	    }
		/**
	     * 登录验证
	     */
	    public function login(){
	        if (IS_POST){
	            $result = $this->login_service->validlogin(I('post.'));
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
	    public function home(){
//     	    if(!$_SESSION['uid']){
//                 redirect(U('loginpage'));
//             }
	        $rows = M("menus")->select();
	        //获取登录地ip
	        $ip = get_client_ip();
	        //获取ip时间等
	        $Ips = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
	        $local = $Ips->getlocation(); // 获取某个IP地址所在的位置
// 	        $local = mb_convert_encoding($local, "utf-8", "GBK"); // 编码转换，否则乱码
 	        $local = $local['area'];
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
	        $user = M("admin")->where("uid = '$uid'")->find();
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
	            M("admin")->where("uid='$uid'")->field("tname,uname,email,icon,pwd")->save($data);
	        }else {
	            M("admin")->where("uid='$uid'")->field("tname,uname,email,icon")->save($data);
	        }
	        $this->adminMessage();
	        
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