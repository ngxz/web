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
        $sql = "select c.name,a.id,a.title,a.author,a.summary,a.time,a.content,a.imgurl from tb_article a join tb_channel c on a.channelid = c.id";
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
        $this->display("edit");
    }
    /**
     * 新增修改文章
     * 
     */
    public function addArticle($ctr,$channelid,$url='',$title,$author,$summary,$newsId='',$content,$time){
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
            $imgurl = "没有上传图片哦！";
            
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
            'url'=>$url,
            'imgurl'=>$imgurl,
            'time'=>$time
        );
        if ($ctr > 0){
			//新增数据
            $res = M("tb_article")->field("content,author,title,summary,url,imgurl,time,channelid")->add($data);
            $res?$sta['status']=1:$sta['status']=0;
        }else {
			//修改数据
            $res = M("tb_article")->field("content,author,title,summary,url,imgurl,time,channelid")->where("id='$newsId'")->save($data);
            $res?$sta['status']=1:$sta['status']=0;
        }
        $this->ajaxReturn($sta);
    }
    //默认的统计方法
    public function tongji(){
        $this->display();
    }
    //增加文章
    public function add(){
        $this->display();
    }
    //修改文章
    public function edit(){
        $this->display();
    }
}

?>