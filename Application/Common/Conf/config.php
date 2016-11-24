<?php
return array(
    //数据库参数设置
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'ftx9', // 数据库名
    'DB_USER'   => 'ftx99ok', // 用户名
    'DB_PWD'    => '96374100x', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8',  // 字符集

    //加载公共函数
    'LOAD_EXT_FILE' =>'common',
	
	'URL_MODEL'=>2,

    //常量设置
    'AUTH_CODE' => "PINKWORLD", //不要改变，否则所有密码都会出错

    //常用状态
    'USER_ORDER_STATUS' => array(
        0 => '待支付',
        1 => '执行中',
        2 => '已完成'
    ),

    //路由定义
    'URL_ROUTER_ON'  => true,
    'URL_ROUTE_RULES'=>array(
        '/^news\/(\d+)/'=>'Home/Index/news?id=:1',
        '/^aboutus/'=>'Home/Index/aboutus',
        '/^regist/'=>'Home/User/regist',
        '/^weixin\/(\d+)/'=>'Home/Goods/goods_detail?type=1&id=:1',
        '/^weibo\/(\d+)/'=>'Home/Goods/goods_detail?type=2&id=:1',
        '/^shipin\/(\d+)/'=>'Home/Goods/goods_detail?type=3&id=:1',
        '/^weixin/'=>'Home/Goods/goodslist?typeid=1',
        '/^weibo/'=>'Home/Goods/goodslist?typeid=2',
        '/^shipin/'=>'Home/Goods/goodslist?typeid=3',
    ),
);