<?php
namespace Admin\Service;

class ArticleService{
    public function __construct(){
        $this->model = D('article');
    }
    /**
     * 获取文章列表
     * @param unknown $params
     */
    public function articleList($params){
        //参数
        $data = array();
        $data['channel_id'] = $params['id'];
        $data['status'] = 1;
        
        //总数目
        $total = $this->model->where($data)->count();
		$page = new \Think\Ajaxpage($total, 8, 'turnPage');
//      $page = getpage($total,8);
        //分页跳转的时候保证查询条件
//      foreach($data as $key=>$val) {
//          $page->parameter[$key]   =   urlencode($val);
//      }
        $show = $page->show();//显示分页
        //联表查询
        $rows = $this->model->where($data)->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
        $data = array("total"=>$total,"rows"=>$rows,"page"=>$show,"channel_id"=>$data['channel_id']);
        if (!$rows){
            $this->error = '该频道没有文章哦';
            return false;
        }
        return $data;
    }
    /**
     * 查找一条文章
     * 编辑回填
     */
    public function findOneArticle($param){
        //参数
        $data = array();
        $data['id'] = $param['id'];
        $result = $this->model->where($data)->find();
        if (!$result){
            $this->error = '该文章不存在';
            return false;
        }
        
        return $result;
    }
    /**
     * 修改一条文章
     * 回填后提交的数据
     * @param unknown $params
     */
    public function editOneArticle($params){
        
        if (!$params['channelid']){
            $this->error = '请选择频道';
            return false;
        }
        if (!$params['category']){
            $this->error = '请选择栏目';
            return false;
        }
        if (!$params['title']){
            $this->error = '请填写标题';
            return false;
        }
        if (!$params['summary']){
            $this->error = '请填写摘要';
            return false;
        }
        if (!$params['content']){
            $this->error = '请填写内容';
            return false;
        }
        $data = array();
        $sqlmap['id'] = $params['id'];
        $data['author'] = $_SESSION['user']['uname'];
        $data['channel_id'] = $params['channelid'];
        $data['category'] = $params['category'];
        $data['title'] = $params['title'];
        $data['img_thumb'] = $params['img_url'];
        $data['summary'] = $params['summary'];
        $data['is_hot'] = $params['is_hot'];
        $data['add_time'] = time();
        $data['content'] = $params['content'];
        $result = $this->model->where($sqlmap)->save($data);
        if (!$result){
            $this->error = '修改失败';
            return false;
        }
        return true;
    }
    /**
     * 发布一篇新文章
     * @param unknown $params
     */
    public function addArticle($params){
        if (!$params['channelid']){
            $this->error = '请选择频道';
            return false;
        }
        if (!$params['category']){
            $this->error = '请选择栏目';
            return false;
        }
        if (!$params['title']){
            $this->error = '请填写标题';
            return false;
        }
        if (!$params['summary']){
            $this->error = '请填写摘要';
            return false;
        }
        if (!$params['content']){
            $this->error = '请填写内容';
            return false;
        }
        $data = array();
        $data['author'] = $_SESSION['user']['uname'];
        $data['channel_id'] = $params['channelid'];
        $data['category'] = $params['category'];
        $data['title'] = $params['title'];
        $data['summary'] = $params['summary'];
        $data['is_hot'] = $params['is_hot'];
        $data['img_thumb'] = $params['img_url'];
        $data['add_time'] = time();
        $data['content'] = $params['content'];
        //写入
        $result = $this->model->add($data);
        if (!$result){
            $this->error = '发布失败';
            return false;
        }
        return true;
    }
    /**
     * 删除一篇文章
     * @param unknown $param
     */
    public function deleteArticle($param){
        $data = array();
        $sqlmap['id'] = $param['id'];
        $data['status'] = 0;
        $result = $this->model->where($sqlmap)->save($data);
        if (!$result){
            $this->error = '删除失败';
            return false;
        }
        return true;
    }
    /**
     * 获取频道列表
     */
    public function getChannel(){
        $channel = M('channel')->select();
        return $channel;
    }
    /**
     * 获取栏目列表
     */
    public function getCategory(){
        $category = M('category')->select();
        return $category;
    }
    Public function getError(){
        return $this->error;
    }
}

?>