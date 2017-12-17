<?php
namespace Web\Service;

class ArticleService{
    public function __construct(){
        $this->model = M('article');
    }
    /**
     * 首页
     * 获取新闻频道5条文章
     */
    public function indexnews(){
        $sqlmap['channel_id'] = 1;
        $sqlmap['status'] = 1;
        $result = $this->model->where($sqlmap)->order("add_time desc")->limit("5")->select();
        return $result;
    }
    /**
     * 首页
     * 获取新闻频道5条文章
     */
    public function indexarticle(){
        $result = $this->model->where("channel_id = 2 or channel_id = 3")->order("add_time desc")->limit("5")->select();
        return $result;
    }
    /**
     * 首页
     * 查询热门文章推荐5条
     */
    public function indexrecommend(){
        $sqlmap['is_hot'] = 1;
        $result = $this->model->where($sqlmap)->order("add_time desc")->limit("5")->select();
        return $result;
    }
    /**
     * 查询新闻列表
     * @return unknown[]|mixed[]|boolean[]|string[]|NULL[]|object[]
     */
    Public function newslist() {
        $sqlmap['channel_id'] = 1;
        $sqlmap['status'] = 1;
        $total = $this->model->where($sqlmap)->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询新闻的数据按时间倒序
        $news = $this->model->where($sqlmap)->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
        
        //查询频道名
        $channel = M("channel")->where("id = 1")->find();
        
        //查询栏目列表
        $categorys = M("category")->where("channel = 1")->select();
        
        //组装数据
        $result = array("show"=>$show,"news"=>$news,'channel'=>$channel,'categorys'=>$categorys);
        return $result;
    }
    /**
     * 新闻页分类列表
     * @param unknown $category
     */
    public function newscategory($category) {
        $sqlmap['category'] = $category;
        $sqlmap['status'] = 1;
        //总条数
	     $total = $this->model->where($sqlmap)->count();
	     $page = getpage($total,10);
	     //分页显示输出
	     $show = $page->show();
	     //只查询当前的栏目数据按时间倒序
	     $news = $this->model->where($sqlmap)->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
	     
	     //查询频道名
	     $channel = M("channel")->where("id = 1")->find();
	     
	     //查询点击的栏目
	     $category = M("category")->where("id = '$category'")->find();
	     
	     //查询栏目列表
	     $categorys = M("category")->where("channel = 1")->select();
	     
	     //组装
	     $result = array("show"=>$show,"news"=>$news,'channel'=>$channel,'category'=>$category,'categorys'=>$categorys);
	     return $result;
    }
    /**
     * php列表
     * @return unknown[]|mixed[]|boolean[]|string[]|NULL[]|object[]
     */
    public function phplist(){
        $sqlmap['channel_id'] = 3;
        $sqlmap['status'] = 1;
        //总条数
        $total = $this->model->where($sqlmap)->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询php的数据按时间倒序
        $php = $this->model->where($sqlmap)->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
        
        //查询频道名
        $channel = M("channel")->where("id = 3")->find();
        
        //查询栏目列表
        $categorys = M("category")->where("channel = 3")->select();
        
        
        $result = array("show"=>$show,"php"=>$php,'channel'=>$channel,'categorys'=>$categorys);
        return $result;
    }
    /**
     * php分类列表
     * @param unknown $category
     */
    public function phpcategory($category) {
        $sqlmap['category'] = $category;
        $sqlmap['status'] = 1;
        //总条数
        $total = $this->model->where($sqlmap)->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询当前的栏目数据按时间倒序
        $news = $this->model->where($sqlmap)->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
    
        //查询频道名
        $channel = M("channel")->where("id = 3")->find();
    
        //查询点击的栏目
        $category = M("category")->where("id = '$category'")->find();
    
        //查询栏目列表
        $categorys = M("category")->where("channel = 3")->select();
    
        //组装
        $result = array("show"=>$show,"news"=>$news,'channel'=>$channel,'category'=>$category,'categorys'=>$categorys);
        return $result;
    }
    /**
     * 前端列表
     */
    public function weblist(){
        $sqlmap['channel_id'] = 2;
        $sqlmap['status'] = 1;
        //总条数
        $total = $this->model->where($sqlmap)->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询web的数据按时间倒序
        $web = $this->model->where($sqlmap)->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
        
        //查询频道名
        $channel = M("channel")->where("id = 2")->find();
        
        //查询栏目列表
        $categorys = M("category")->where("channel = 2")->select();
        
        
        $result = array("show"=>$show,"web"=>$web,'channel'=>$channel,'categorys'=>$categorys);
        return $result;
    }
    /**
     * 前端分类
     */
    public function webcategory($category){
        $sqlmap['category'] = $category;
        $sqlmap['status'] = 1;
        //总条数
        $total = $this->model->where($sqlmap)->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询当前的栏目数据按时间倒序
        $web = $this->model->where($sqlmap)->limit($page->firstRow.','.$page->listRows)->order("add_time desc")->select();
        
        //查询频道名
        $channel = M("channel")->where("id = 2")->find();
        
        //查询点击的栏目
        $category = M("category")->where("id = '$category'")->find();
        
        //查询栏目列表
        $categorys = M("category")->where("channel = 2")->select();
        
        $result = array("show"=>$show,"web"=>$web,'channel'=>$channel,'categorys'=>$categorys);
        return $result;
    }
}

?>