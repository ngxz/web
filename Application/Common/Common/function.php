<?php
/**
 * 字符串截取，支持中文和其他编码
 * static 
 * access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * return string
 */
function msubstr($str,$start=0,$length,$charset="utf-8",$suffix=true){
    if (function_exists("mb_substr")){
        $slice=mb_substr($str,$start,$length,$charset);
    }elseif (function_exists('iconv_substr')){
        $slice = iconv_substr($str,$start,$length,$charset);
        if (false === $slice){
            $slice = '';
        }
    }else {
        $re['utf-8']="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312']="/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']="/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']="/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset],$str,$match);
        $slice = join("",array_slice($match[0],$start,$length));
    }
    return $suffix?$slice.'...':$slice;
}




/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 8) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}
//判断是否手机
function ismobile() {
// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
    return true;

    //此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
        //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
            //找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
            //判断手机发送的客户端标志,兼容性有待提高
            if (isset ($_SERVER['HTTP_USER_AGENT'])) {
                $clientkeywords = array(
                    'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
                );
                //从HTTP_USER_AGENT中查找手机浏览器的关键字
                if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                    return true;
                }
            }
            //协议法，因为有可能不准确，放到最后判断
            if (isset ($_SERVER['HTTP_ACCEPT'])) {
                // 如果只支持wml并且不支持html那一定是移动设备
                // 如果支持wml和html但是wml在html之前则是移动设备
                if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                    return true;
                }
            }
            return false;
}
?>