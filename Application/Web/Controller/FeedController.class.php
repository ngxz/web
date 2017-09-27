<?php
namespace Web\Controller;

use Think\Controller;
class FeedController extends Controller{
    /**
     * 显示feed频道的文章
     */
    public function feed(){
        $mod = M("tb_article");
        //总条数
        $total = $mod->where("channelid = 4")->count();
        $page = getpage($total,10);
        //分页显示输出
        $show = $page->show();
        //只查询feed的数据按时间倒序
        $feed = $mod->where("channelid = 4")->limit($page->firstRow.','.$page->listRows)->order("time desc")->select();
        $data = array("show"=>$show,"feed"=>$feed);
        //单独查询频道名字为面包屑
        $channel = M("tb_channel")->where("id = 4")->find();
        $this->assign("channel",$channel);
        
        //调用加载配置方法
        R("Admin/Set/webLoad");
        
        //输出模版
        $this->assign("data",$data);
        $this->display("feed");
    }
    /**
     * 生成验证码
     */
    public function code(){
        $config =    array(
            'fontSize'    =>    16,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
    }
    /**
     * 提交过来的表单数据
     */
    public function send(){
        $title = I("title");
        $mail = I("mail","");
        $content = I("content");
        $code = I("code");
        $sta = array();
        //检测验证码
        $code = $this->check_verify($code);
        if ($code){
            $data = array(
                "title"=>$title,
                "summary"=>$mail,
                "content"=>$content,
                "author"=>"other",
                "channelid"=>4
            );
            $res = M("tb_article")->field("author,title,summary,content,channelid")->add($data);
            if ($res){
                $sta['status'] = 1;
                $sta['message'] = "留言成功！";
            }else {
                $sta['status'] = 0;
                $sta['message'] = "留言失败！";
            }
        }else {
            $sta['status'] = 0;
            $sta['message'] = "验证码输入有误哦！";
        }
        $this->ajaxReturn($sta);
    }
}

?>