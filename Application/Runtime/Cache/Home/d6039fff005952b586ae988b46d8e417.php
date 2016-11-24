<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Application/Home/Public/css/base.css" rel="stylesheet" type="text/css">
    <link href="/Application/Home/Public/css/style_list.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Application/Home/Public/css/cmp_all.css" type="text/css">
    <link href="/Application/Home/Public/css/index.css" rel="stylesheet" type="text/css">
    <link href="/Application/Home/Public/css/gg.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Application/Home/Public/css/my1.css" type="text/css">
    <link href="/Application/Home/Public/css/my2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Application/Home/Public/css/homestyle.css" type="text/css">
    <link rel="stylesheet" href="/Application/Home/Public/css/pages_built.css" type="text/css">
    <link rel="shortcut icon" href="/Application/Home/Public/images/icon.png">
    <script type="text/javascript" src="/Application/Home/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/layer/layer.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/js/style.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/js/common.js"></script>
    <title>粉天下</title>
</head>
<body>
<ul class="tip_title">
    <li class="tender_cur"><a>用户中心</a><b></b></li>
    <div class="clear"></div>
</ul>
<div style="margin-top: 20px; margin-left: 10px;">
    <div style="padding:20px 40px;">
        <p style="line-height:30px"><?php if(empty($user['username'])): echo ($user["account"]); else: echo ($user["username"]); endif; ?> (广告主)</p>
    </div>
    <ul class="orderinfos">
        <li class="order_weixin fl mr40">
            <i class="iconfont iconweixin"></i>
            <div class="orderinfos_text">
                <div class="orderinfos_title">
        <span class="fl">
          待支付订单
        </span>
                    <a class="blankness blankness-white fr" href="<?php echo U('Home/User/orderlist',array('paystatus'=>0));?>" target="mainBox">
                        点击查看
                    </a>
                </div>
                <div class="blank10">
                </div>
                <a class="orderinfos_a" href="<?php echo U('Home/User/orderlist',array('paystatus'=>0));?>" target="mainBox">
                    <?php echo ($count1); ?>            </a>
            </div>
        </li>
        <li class="order_weibo fl mr40">
            <i class="iconfont iconweibo"></i>
            <div class="orderinfos_text">
                <div class="orderinfos_title">
        <span class="fl">
          执行中订单
        </span>
                    <a class="blankness blankness-white fr" href="<?php echo U('Home/User/orderlist',array('isback'=>0));?>" target="mainBox">
                        点击查看
                    </a>
                </div>
                <div class="blank10">
                </div>
                <a class="orderinfos_a" href="<?php echo U('Home/User/orderlist',array('isback'=>0));?>" target="mainBox">
                    <?php echo ($count2); ?>            </a>
            </div>
        </li>
        <li class="order_pengyouquan fl mr40">
            <i class="iconfont iconlive"></i>
            <div class="orderinfos_text">
                <div class="orderinfos_title">
        <span class="fl">
          已完成订单
        </span>
                    <a class="blankness blankness-white fr" href="<?php echo U('Home/User/orderlist',array('isback'=>1));?>" target="mainBox">
                        点击查看
                    </a>
                </div>
                <div class="blank10">
                </div>
                <a class="orderinfos_a" href="<?php echo U('Home/User/orderlist',array('isback'=>1));?>" target="mainBox">
                    <?php echo ($count3); ?>            </a>
            </div>
        </li>
    </ul>

</div>
</body>
</html>