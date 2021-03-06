<?php
namespace Admin\Controller;

use Admin\Controller\PublicController;
class HomeController extends PublicController{
    /**
     * 空方法
     */
    public function _empty(){
        redirect(U('Admin/Home/home'),5,'该方法不存在，5秒后跳转调转到首页');
    }
    /**
     * 后台首页
     */
    public function home(){
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
        $this->assign("rows",$rows)->display('home');
    }
    /**
     * 默认的统计方法
     */
    public function tongji(){
        //获取当前服务器信息
        $info = array(
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION,
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            '框架版本号'=>THINK_VERSION,
            '根目录'=>__ROOT__,
            '系统内存统计'=>MEMORY_LIMIT_ON,
        );
        $this->assign('info',$info)->display();
    }
}

?>