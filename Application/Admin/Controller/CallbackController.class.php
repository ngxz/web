<?php
namespace Admin\Controller;

class CallbackController{
    /**
     * 返回weim用户数量
     */
    public function send(){
        $callback = $_GET["callback"];
        $url = "www.weimob.com";
        //curl方式发送请求
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        //
        //过滤不用的字符
        $output = strip_tags($output,"<span>");
        $key = '<span class="f8-tt">';
        $num = strpos($output, $key);
        $output = substr($output,$num,36);
        $output = preg_replace("/\\r|\\n|\\s+|\\t|=|<|>|\"|\/|-/","",$output);
//         $output = substr($output,0,610);
        $output = preg_replace('/[a-z]/',"",$output);
        //除去f8-tt的8
        $output = substr($output,1);
        //转json
         $output = array("num"=>$output);
//         print_r($output);
        echo $callback."(".json_encode($output).")";
    }
}

?>