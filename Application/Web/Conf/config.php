<?php
return array(
	//'配置项'=>'配置值'
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        //文章详情页
        //detail控制器下的article方法，传入两个数字参数
        //__ROOT__/detail/article/channelid/1/id/{$new.id}简化为
        //__ROOT__/detail/1/{$new.id}
        'detail/:channelid\d/:id\d' =>'detail/article',
        //新闻页分类
        'new/:category\d'=>'new/newsbycategory',
        //web分类
        'web/:category\d'=>'web/webbycategory',
        //php分类
        'php/:category\d'=>'php/phpbycategory',
    ),
);