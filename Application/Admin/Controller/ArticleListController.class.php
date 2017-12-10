<?php
namespace Admin\Controller;

use Think\Controller;
class ArticleListController extends Controller{
    public function _initialize(){
        $this->article_service = D('Article','Service');
    }
    /**
     * 按频道查看文章内容
     */
    public function article(){
        if (IS_POST){
            $result = $this->article_service->articleList(I('post.'));
            if (!$result){
                $data['msg'] = $this->article_service->getError();
                $this->assign('data',$data)->display();
                exit();
            }
            $this->assign("result",$result)->display();
        }else {
            $this->display();
        }
    }
    /**
     * 编辑文章
     * get根据参数id回填
     * post根据参数修改
     */
    public function edit(){
        if (IS_POST){
            $result = $this->article_service->editOneArticle(I('post.'));
            $data = array();
            if (!$result){
                $data['msg'] = $this->article_service->getError();
                $this->ajaxReturn($data);
            }
            $data['msg'] = '修改成功';
            $this->ajaxReturn($data);
        }else{
            $result = $this->article_service->findOneArticle(I('get.'));
            $channel = $this->article_service->getChannel();
            $category = $this->article_service->getCategory();
            if (!$result){
                $data['msg'] = $this->article_service->getError();
                $this->assign('data',$data)->display();
                exit();
            }
            $this->assign('channel',$channel)->assign('category',$category)->assign('result',$result)->display();
        }
    }
    /**
     * 新增文章
     */
    public function add(){
        if (IS_POST){
            $result = $this->article_service->addArticle(I('post.'));
            $data = array();
            if (!$result){
                $data['msg'] = $this->article_service->getError();
                $this->ajaxReturn($data);
                exit();
            }
            $data['msg'] = '发布成功';
            $this->ajaxReturn($data);
        }else {
            $channel = $this->article_service->getChannel();
            $category = $this->article_service->getCategory();
            $this->assign('category',$category)->assign('channel',$channel)->display();
        }
    }
    /**
     * 上传图片
     */
    public function uploadpic(){
        //图片
        if (isset($_FILES['pic'])){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            $upload->saveName  = time().mt_rand();
            // 上传文件
            $info   =   $upload->upload($_FILES);
            //路径
            $img_url = '/Uploads/'.$info['pic']['savepath'].$info['pic']['savename'];
            $img_url2 = './Public/Uploads/'.$info['pic']['savepath'].'thumb_'.$info['pic']['savename'];
            $image = new \Think\Image();
            $image->open("./Public/".$img_url);
            // 按照原图的比例生成一个缩略图并保存
            $image->thumb(100, 100)->save($img_url2);
            $this->ajaxReturn(array('status'=>$info,'img_url'=>$img_url2,'msg'=>($info ?'上传成功':'上传失败')));
        }
    }
    /**
     * 删除一篇文章
     */
    public function delete(){
        if (IS_POST){
            $result = $this->article_service->deleteArticle(I('post.'));
            $data = array();
            if (!$result){
                $data['msg'] = $this->article_service->getError();
                $this->ajaxReturn($data);
                exit();
            }
            $data['msg'] = '删除成功';
            $this->ajaxReturn($data);
        }
    }
}

?>