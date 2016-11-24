<?php
return array(
    //'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/'.'Admin/Public'
    ),
    'URL_HTML_SUFFIX' => '',    //去掉默认的html伪静态后缀名

    //支付方式
    'PAYMODE' => array(
        1 => "支付宝",
        2 => "微信支付",
        3 => "银联"
    )
);