<?php
namespace Admin\Controller;

use Think\Controller;
class AdminController extends Controller{
    /**
     * 按频道查看文章内容
     */
    public function searchArticle($stitle='',$stime=''){
        $channelid = I("channelid","");
        $query = array();
        if ($stitle != "" && $stitle != null){
            $query['title'] = array("LIKE","%$stitle%");
        }
        if ($stime != "" && $stime != null){
            $query['time'] = array("LIKE","%$query%");
        }
        $mod = M("tb_article");
        //总数目
        $total = $mod->where($query)->where("channelid = '$channelid'")->count();
        $page = getpage($total,8);
        $show = $page->show();//显示分页
        //联表查询
        $sql = "select c.name,a.id,a.title,a.author,a.summary,a.time,a.content,a.category from tb_article a join tb_category c on a.category = c.id";
        $rows = $mod->where($sql)->where($query)->where("channelid = '$channelid'")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("total"=>$total,"rows"=>$rows,"page"=>$show,"stitle"=>$stitle,"stime"=>$stime);
        $this->assign("data",$data);
        $this->display(allarticle);
    }
    /**
     * 删除某条文章
     * @param unknown $no
     */
    public function deleteArticle($newsId){
        foreach ($newsId as $id){
            $res = M("tb_article")->where("id = '$id'")->delete();
        }
        $res?$sta['status']=1:$sta['status']=0;
        $this->ajaxReturn($sta);
    }
    /**
     * 查询一条文章
     * @param unknown $no
     */
    public function searchArticleOne($newsId){
        $rows = M("tb_article")->where("id = '$newsId'")->find();
        $this->assign("newsId",$newsId);
        $this->assign("rows",$rows);
        //循环查询栏目列表
    	$categorys = M("tb_category")->select();
		$this->assign("categorys",$categorys);
		
        $this->display("edit");
    }
    /**
     * 新增修改文章
     * 
     */
    public function addArticle($ctr,$channelid,$category='',$title,$author,$summary,$newsId='',$content,$time){
        //文件上传
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->saveName = time().'_'.mt_rand();
        // 上传文件
        $info   =   $upload->upload();
        $imgurl = "/Uploads/".$info['pic']['savepath'].$info['pic']['savename'];
        if(!$info) {// 上传错误提示错误信息
            $imgurl = "";
            //$this->error($upload->getError());
        }else{// 上传成功
            //$this->success('上传成功！');
            echo "上传成功！";
        }
        //传入的数组
        $data = array(
            'channelid'=>$channelid,
            'content'=>$content,
            'title'=>$title,
            'author'=>$author,
            'summary'=>$summary,
            'category'=>$category,
            'imgurl'=>$imgurl,
            'time'=>$time
        );
        if ($ctr > 0){
			//新增数据
            $res = M("tb_article")->field("content,author,title,summary,category,imgurl,time,channelid")->add($data);
            $res?$sta['status']=1:$sta['status']=0;
        }else {
			//修改数据
            $res = M("tb_article")->field("content,author,title,summary,category,imgurl,time,channelid")->where("id='$newsId'")->save($data);
            $res?$sta['status']=1:$sta['status']=0;
        }
        $this->ajaxReturn($sta);
    }
    //默认的统计方法
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
        //变量赋值到模板
        $this->assign('info',$info);
        //显示模板
        $this->display();
    }
    //增加文章
    public function add(){
    	//循环查询栏目列表
    	$categorys = M("tb_category")->select();
		$this->assign("categorys",$categorys);
        $this->display();
    }
    //修改文章
    public function edit(){
    	//循环查询栏目列表
    	$categorys = M("tb_category")->select();
		$this->assign("categorys",$categorys);
        $this->display();
    }
    /**
     * 后台查询图片
     * @param unknown $channelid
     */
    public function photo($channelid=''){
        $mod = M("tb_article");
        //总数目
        $total = $mod->where("channelid = '$channelid'")->count();
        $page = getpage($total,8);
        $show = $page->show();//显示分页
        //联表查询
        $sql = "select c.name,a.id,a.title,a.author,a.summary,a.time,a.content,a.imgurl from tb_article a join tb_channel c on a.channelid = c.id";
        $rows = $mod->where($sql)->where("channelid = '$channelid'")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("total"=>$total,"rows"=>$rows,"page"=>$show);
        $this->assign("data",$data);
        $this->display("photo");
    }
    /**
     * 增加图片文字
     */
    public function addPhoto(){
        $this->display();
    }
    /**
     * 只负责图片及文字的新增
     */
    public function addPhotos($title,$summary,$time,$author,$newsId,$content){
        //文件上传
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->saveName = time().'_'.mt_rand();
        // 上传文件
        $info   =   $upload->upload();
        $imgurl = "/Uploads/".$info['pic']['savepath'].$info['pic']['savename'];
        if(!$info) {// 上传错误提示错误信息
            //$imgurl = "没有上传图片哦！";
            $this->error($upload->getError());
            exit();
        }
        //传入的数组
        $data = array(
            'channelid'=>5,
            'content'=>$content,
            'title'=>$title,
            'author'=>$author,
            'summary'=>$summary,
            'url'=>"图片类无",
            'imgurl'=>$imgurl,
            'time'=>$time
        );
        //新增数据
        $res = M("tb_article")->field("content,author,title,summary,url,imgurl,time,channelid")->add($data);
        if ($res){
            echo "成功！";
            $this->photo("5");
        }else {
            echo "失败！";
        }
    }
}

?>