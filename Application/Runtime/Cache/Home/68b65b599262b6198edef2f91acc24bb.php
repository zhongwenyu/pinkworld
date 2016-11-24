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
<link rel="stylesheet" href="/Application/Home/Public/css/pages_built.css">
<link rel="stylesheet" href="/Application/Home/Public/css/all_built.css">
<link rel="stylesheet" href="/Application/Home/Public/css/pay.css">
<script type="text/javascript" src="/Application/Home/Public/js/qrcode.min.js"></script>
<style>
    #wxcode{margin:15px auto;width:300px;height:300px;overflow: hidden}
    #wxcode img{height:100%}
</style>
<script>
    function new_code(text){
        var qrcode = new QRCode('wxcode', {
            text: text,
            width: 300,
            height: 300,
            colorDark : '#000000',
            colorLight : '#ffffff',
            correctLevel : QRCode.CorrectLevel.H
        });
    }

    function goPay(obj){
        $(".pay-mode").removeClass("pay-active");
        $(".pay-check").hide();
        $(obj).addClass("pay-active").next(".pay-check").show();
    }
</script>
<body>
<!--navigation start-->
<?php if(!empty($user)): ?><div class="header_info">
        <div class="content">
            <span class="header_info_name">您好：<a href="<?php echo U('Home/User/index');?>"><span id="crt_username"><?php echo ($user["account"]); ?></span></a></span>
            <a href="<?php echo U('Home/User/index');?>">会员中心</a>
            <a href="<?php echo U('Home/User/lgout');?>">退出</a>
        </div>
    </div><?php endif; ?>
<div class="nav_box">
    <div class="content clearfix">
        <div class="nav_top">
            <a class="logo2x fl" href="http://www.ftx9.com"><img width="180" src="/Application/Home/Public/images/logo_2x.png"></a>
            <div class="nav_list_box fl">
                <a class="nav_list_current" href="javascript:void(0)">
                    <img class="icon" width="29" src="/Application/Home/Public/images/gopay.png">
                    <span>订单支付</span>
                    <img class="arrow_down_nav valign_middle" width="21" src="/Application/Home/Public/images/nav_arrow_down_2x.png">
                </a>
                <div class="nav_list_all">
                    <dl>
                        <dt>
                            <img width="19" src="/Application/Home/Public/images/nav_location_2x.png">
                            <a href="<?php echo U('Home/User/index');?>">查看账号</a>
                        </dt>
                        <dd>
                            <a href="<?php echo U('Home/Goods/goodslist',array('typeid'=>1));?>" target="_blank">微信公众号</a>
                            <i></i>
                            <a href="<?php echo U('Home/Goods/goodslist',array('typeid'=>2));?>" target="_blank">新浪微博</a>
                            <i></i>
                            <a href="<?php echo U('Home/Goods/goodslist',array('typeid'=>3));?>" target="_blank">视频自媒体</a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img width="18" src="/Application/Home/Public/images/nav_calendar_2x.png">
                            <a href="<?php echo U('Home/User/index');?>" target="_blank">订单管理</a>
                        </dt>
                        <dd>
                            <a href="<?php echo U('Home/User/index');?>" target="_blank">待支付</a>
                            <i></i>
                            <a href="<?php echo U('Home/User/index');?>" target="_blank">待执行</a>
                            <i></i>
                            <a href="<?php echo U('Home/User/index');?>" target="_blank">已完成</a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img width="14" src="/Application/Home/Public/images/nav_paper_2x.png" class="paper">
                            <a class="nav_clear_border" href="<?php echo U('Home/Cart/cart');?>" target="_blank">选号车</a>
                        </dt>
                        <dd>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            <img width="15" src="/Application/Home/Public/images/nav_user_2x.png" class="user">
                            <a href="<?php echo U('Home/User/index');?>" target="_blank">个人中心</a>
                        </dt>
                        <dd>
                            <a target="_blank" href="<?php echo U('Home/User/index');?>">密码修改</a>
                            <i></i>
                            <a target="_blank" href="<?php echo U('Home/User/index');?>">资料编辑</a>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="nav_top_link fl">
                <a target="" href="<?php echo U('Home/Goods/goodslist',array('typeid'=>1));?>" class="color_high_light">微信公众号<img src="/Application/Home/Public/images/new_red.png" width="28" class="tags"></a>
                <a target="" href="<?php echo U('Home/Goods/goodslist',array('typeid'=>3));?>" class="color_high_light">视频自媒体<img src="/Application/Home/Public/images/new_red.png" width="28" class="tags"></a>
                <a target="" href="<?php echo U('Home/Goods/goodslist',array('typeid'=>2));?>">新浪微博</a>
                <i></i>
                <a target="" href="">朋友圈</a>
                <i></i>
                <a target="" href="">微播圈</a>
                <i></i>
                <a target="" href="">活动管理</a>
                <i></i>
            </div>
            <?php if(empty($user)): ?><div class="nav_top_btn">
                    <a target="_blank" href="<?php echo U('Home/User/regist');?>">注册</a>
                    <a target="_blank" href="<?php echo U('Home/Index/index');?>">登录</a>
                </div><?php endif; ?>
        </div>
    </div>
</div>
<div class="content">

    <div class="process_bar">
        <div class="process_bar_line"></div>
        <ul>
            <li class="process_bar_past">
                <em><img src="/Application/Home/Public/images/confirm_2x.png" width="15" /></em>
                <p>填写预约需求</p>
            </li>
            <li class="process_bar_past">
                <em><img src="/Application/Home/Public/images/confirm_2x.png" width="15" /></em>
                <p>提交已选账号</p>
            </li>
            <li class="process_bar_current">
                <em>3</em>
                <p>选择支付方式</p>
            </li>
        </ul>
    </div>
    <div class="paybox">
        <?php if(empty($order)): ?><div class="pay-order" style="text-align: center;font-size: 18px;color:#F4655B;font-weight:bold;line-height: 25px">
                <i class="iconempty"></i>
                <span style="display: inline-block;vertical-align: middle">未找到该订单！</span>
                <script>
                    var load=setTimeout(function(){
                        window.location.href="<?php echo U('Home/Index/index');?>";
                    },2000);
                </script>
            </div>
            <?php else: ?>
            <div class="pay-order">
                <span class="spa-left">订单编号：<?php echo ($order["ordersn"]); ?></span>
                <span class="spa-right">应付金额&nbsp;&nbsp;<strong>¥ <?php echo ($order["goodsprice"]); ?></strong></span>
            </div>
            <div class="pay-mod">
                <a href="javascript:void(0)" class="pay-mode" onclick="goPay(this)">
                    <i class="iconpay alipay"></i>
                    <span class="spa1">支付宝支付</span>
                    <span class="spa2">实付金额：<strong>¥ <?php echo ($order["goodsprice"]); ?></strong></span>
                </a>
                <div class="pay-check">
                    <form action="/alipay/alipayapi.php" method="post" target="_blank">
                        <input type="hidden" name="WIDout_trade_no" value="<?php echo ($order["ordersn"]); ?>" />
                        <input type="hidden" name="WIDsubject" value="粉天下的订单" />
                        <input type="hidden" name="WIDtotal_fee" value="<?php echo ($order["goodsprice"]); ?>" />
                        <button type="submit" class="pay-url" style="border:0" onclick="alipay(<?php echo ($order['id']); ?>)">确认并付款</button>
                    </form>
                </div>
                <a href="javascript:void(0)" class="pay-mode" onclick="lswxpay(<?php echo ($order['id']); ?>,this)">
                    <i class="iconpay weixinpay"></i>
                    <span class="spa1">微信支付</span>
                    <span class="spa2">实付金额：<strong>¥ <?php echo ($order["goodsprice"]); ?></strong></span>
                </a>
                <div class="pay-check">
                    <div id="wxcode">
                        <img src="/Application/Home/Public/images/wxpaycode.jpg" />
                    </div>
                </div>
                <!--<a href="javascript:void(0)" class="pay-mode" onclick="goPay(this)">
                    <i class="iconpay bankpay"></i>
                    <span class="spa1">银联支付</span>
                    <span class="spa2">实付金额：<strong>¥ <?php echo ($order["goodsprice"]); ?></strong></span>
                </a>
                <div class="pay-check">
                    <a href="" class="pay-url">确认并付款</a>
                </div>-->
            </div><?php endif; ?>
    </div>
</div>
</body>
<script>
    function lswxpay(id,obj){
        goPay(obj);
        var pay = setInterval(function(){
            ispay(id);
        },5000)
    }
</script>
</html>