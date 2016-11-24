<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?php if(empty($seo)): echo ($config["webkeyword"]); else: echo ($seo["keyword"]); endif; ?>">
    <meta name="description" content="<?php if(empty($seo)): echo ($config["webdesc"]); else: echo ($seo["keyinfo"]); endif; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Application/Home/Public/css/base.css" rel="stylesheet" type="text/css">
    <link href="/Application/Home/Public/css/style_list.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Application/Home/Public/css/cmp_all.css" type="text/css">
    <link rel="shortcut icon" href="/Application/Home/Public/images/icon.png">
    <script type="text/javascript" src="/Application/Home/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/js/jquery.fly.min.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/layer/layer.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/js/style.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/js/common.js"></script>
    <title><?php if(empty($seo)): echo ($config["webtitle"]); else: echo ($seo["keytitle"]); endif; ?></title>
</head>
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
                    <img class="icon" width="29" src="/Application/Home/Public/images/nav_zimeiti_hover_2x.png"/>
                    <span>关于我们</span>

                    <img class="arrow_down_nav valign_middle" width="21" src="/Application/Home/Public/images/nav_arrow_down_2x.png">
                </a>
                <div class="nav_list_all">
                    <dl>
                        <dt>
                            <img width="19" src="/Application/Home/Public/images/nav_location_2x.png">
                            <a href="<?php echo U('Home/User/index');?>">查看账号</a>
                        </dt>
                        <dd>
                            <a href="/weixin" target="_blank">微信公众号</a>
                            <i></i>
                            <a href="/weibo" target="_blank">新浪微博</a>
                            <i></i>
                            <a href="/shipin" target="_blank">视频自媒体</a>
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
                <a target="" href="/weixin" class="color_high_light">微信公众号<img src="/Application/Home/Public/images/new_red.png" width="28" class="tags"></a>
                <a target="" href="/shipin" class="color_high_light">视频自媒体<img src="/Application/Home/Public/images/new_red.png" width="28" class="tags"></a>
                <a target="" href="/weibo">新浪微博</a>
                <i></i>
                <a target="" href="">朋友圈</a>
                <i></i>
                <a target="" href="">微播圈</a>
                <i></i>
                <a target="" href="">活动管理</a>
                <i></i>
            </div>
            <?php if(empty($user)): ?><div class="nav_top_btn">
                    <a target="_blank" href="/regist">注册</a>
                    <a target="_blank" href="http://www.ftx9.com">登录</a>
                </div><?php endif; ?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/Application/Home/Public/css/pages_built.css">
    <link rel="shortcut icon" type="image/x-icon">
    <!-- inject:css-->
    <link rel="stylesheet" href="/Application/Home/Public/aboutus/fc.min.css">
    <link rel="stylesheet" href="/Application/Home/Public/aboutus/idangerous.swiper.min.css">
    <!-- endinject-->
   <link rel="stylesheet" href="/Application/Home/Public/aboutus/float.css" type="text/css" charset="utf-8"><link rel="stylesheet" type="text/css" href="/Application/Home/Public/aboutus/main.css">
<body><iframe src="javascript:false" title="" frameborder="0" tabindex="-1" style="position: absolute; width: 0px; height: 0px; border: 0px;" src="/Application/Home/Public/aboutus/saved_resource.html"></iframe><iframe style="display: none;" src="/Application/Home/Public/aboutus/saved_resource(1).html"></iframe><style type="text/css">.WPA3-SELECT-PANEL { z-index:2147483647; width:463px; height:292px; margin:0; padding:0; border:1px solid #d4d4d4; background-color:#fff; border-radius:5px; box-shadow:0 0 15px #d4d4d4;}.WPA3-SELECT-PANEL * { position:static; z-index:auto; top:auto; left:auto; right:auto; bottom:auto; width:auto; height:auto; max-height:auto; max-width:auto; min-height:0; min-width:0; margin:0; padding:0; border:0; clear:none; clip:auto; background:transparent; color:#333; cursor:auto; direction:ltr; filter:; float:none; font:normal normal normal 12px "Helvetica Neue", Arial, sans-serif; line-height:16px; letter-spacing:normal; list-style:none; marks:none; overflow:visible; page:auto; quotes:none; -o-set-link-source:none; size:auto; text-align:left; text-decoration:none; text-indent:0; text-overflow:clip; text-shadow:none; text-transform:none; vertical-align:baseline; visibility:visible; white-space:normal; word-spacing:normal; word-wrap:normal; -webkit-box-shadow:none; -moz-box-shadow:none; -ms-box-shadow:none; -o-box-shadow:none; box-shadow:none; -webkit-border-radius:0; -moz-border-radius:0; -ms-border-radius:0; -o-border-radius:0; border-radius:0; -webkit-opacity:1; -moz-opacity:1; -ms-opacity:1; -o-opacity:1; opacity:1; -webkit-outline:0; -moz-outline:0; -ms-outline:0; -o-outline:0; outline:0; -webkit-text-size-adjust:none; font-family:Microsoft YaHei,Simsun;}.WPA3-SELECT-PANEL a { cursor:auto;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-TOP { height:25px;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-CLOSE { float:right; display:block; width:47px; height:25px; background:url(http://combo.b.qq.com/crm/wpa/release/3.3/wpa/views/SelectPanel-sprites.png) no-repeat;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-CLOSE:hover { background-position:0 -25px;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-MAIN { padding:23px 20px 45px;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-GUIDE { margin-bottom:42px; font-family:"Microsoft Yahei"; font-size:16px;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-SELECTS { width:246px; height:111px; margin:0 auto;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-CHAT { float:right; display:block; width:88px; height:111px; background:url(http://combo.b.qq.com/crm/wpa/release/3.3/wpa/views/SelectPanel-sprites.png) no-repeat 0 -80px;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-CHAT:hover { background-position:-88px -80px;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-AIO-CHAT { float:left;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-QQ { display:block; width:76px; height:76px; margin:6px; background:url(http://combo.b.qq.com/crm/wpa/release/3.3/wpa/views/SelectPanel-sprites.png) no-repeat -50px 0;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-QQ-ANONY { background-position:-130px 0;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-LABEL { display:block; padding-top:10px; color:#00a2e6; text-align:center;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-BOTTOM { padding:0 20px; text-align:right;}.WPA3-SELECT-PANEL .WPA3-SELECT-PANEL-INSTALL { color:#8e8e8e;}</style><style type="text/css">.WPA3-CONFIRM { z-index:2147483647; width:285px; height:141px; margin:0; }.WPA3-CONFIRM { *background-image:url(http://combo.b.qq.com/crm/wpa/release/3.3/wpa/views/panel.png);}.WPA3-CONFIRM * { position:static; z-index:auto; top:auto; left:auto; right:auto; bottom:auto; width:auto; height:auto; max-height:auto; max-width:auto; min-height:0; min-width:0; margin:0; padding:0; border:0; clear:none; clip:auto; background:transparent; color:#333; cursor:auto; direction:ltr; filter:; float:none; font:normal normal normal 12px "Helvetica Neue", Arial, sans-serif; line-height:16px; letter-spacing:normal; list-style:none; marks:none; overflow:visible; page:auto; quotes:none; -o-set-link-source:none; size:auto; text-align:left; text-decoration:none; text-indent:0; text-overflow:clip; text-shadow:none; text-transform:none; vertical-align:baseline; visibility:visible; white-space:normal; word-spacing:normal; word-wrap:normal; -webkit-box-shadow:none; -moz-box-shadow:none; -ms-box-shadow:none; -o-box-shadow:none; box-shadow:none; -webkit-border-radius:0; -moz-border-radius:0; -ms-border-radius:0; -o-border-radius:0; border-radius:0; -webkit-opacity:1; -moz-opacity:1; -ms-opacity:1; -o-opacity:1; opacity:1; -webkit-outline:0; -moz-outline:0; -ms-outline:0; -o-outline:0; outline:0; -webkit-text-size-adjust:none;}.WPA3-CONFIRM * { font-family:Microsoft YaHei,Simsun;}.WPA3-CONFIRM .WPA3-CONFIRM-TITLE { height:40px; margin:0; padding:0; line-height:40px; color:#2b6089; font-weight:normal; font-size:14px; text-indent:80px;}.WPA3-CONFIRM .WPA3-CONFIRM-CONTENT { height:55px; margin:0; line-height:55px; color:#353535; font-size:14px; text-indent:29px;}.WPA3-CONFIRM .WPA3-CONFIRM-PANEL { height:30px; margin:0; padding-right:16px; text-align:right;}.WPA3-CONFIRM .WPA3-CONFIRM-BUTTON { position:relative; display:inline-block!important; display:inline; zoom:1; width:99px; height:30px; margin-left:10px; line-height:30px; color:#000; text-decoration:none; font-size:12px; text-align:center;}.WPA3-CONFIRM .WPA3-CONFIRM-BUTTON-FOCUS { width:78px;}.WPA3-CONFIRM .WPA3-CONFIRM-BUTTON .WPA3-CONFIRM-BUTTON-TEXT { line-height:30px; text-align:center; cursor:pointer;}.WPA3-CONFIRM-CLOSE { position:absolute; top:7px; right:7px; width:10px; height:10px; cursor:pointer;}</style>


<!-- 了解疯传-->
<div class="fc-understand-bg1">
    <div class="fc-containner-1080">
        <p class="fc-under-title">带给受众全新的广告体验</p>
        <p class="fc-under-txt1">疯传是北京智云时代科技有限公司旗下的移动社会化媒体营销品牌，<br>            其推出以高交互性、高友好性的H5广告载体，在消费者的社交圈传播，带给受众全新的广告体验。<br>            作为移动互联网广告营销推广的先驱，疯传专业的技术团队及优化大师，全力打造标签细分、数据分析、效果监测、<br>            智能优化的平台，以保障企业广告精准高效传播，直达目标用户。<br>            亿级优质自媒体及大量传统媒体资源，推动广告裂变式传播，掀起全民营销局面，疯传实现了传统媒体所无法企及的低成本、高回报的广告投放效果。</p>
        <p class="fc-slogans"><span class="fc-linian">创新理念</span><span class="fc-linian">专业态度</span><span class="fc-linian">优质的服务</span></p>
    </div>
</div>
<div id="progressing" class="fc-understand-bg2">
    <div class="fc-containner-1080">
        <p class="fc-under-title2">DEVELOPMENT</p>
        <p class="fc-fazhan">发展历程</p>
        <div class="fc-under-bg"><img src="/Application/Home/Public/aboutus/time.png" width="100%"></div>
        <div class="fc-all">
            <div class="fc-process">疯传广告传媒项目组正式成立，公司进入全力开发期。</div>
            <div class="fc-process">疯传微信版本上线，立马引发市场狂热追捧，平台用户呈几何基数上升，上线2个月用户数突破20万，上线第二天即迎来第一个广告投放业务。“一个新型的广告平台由此诞生”——一个利用移动用户碎片时间赚钱的软件由此诞生。</div>
            <div class="fc-process">APP1.0版本上线IOS，安卓版本同期上线。用户规模迅速阔大到50万，APP用户收益不断增加，广告市场反应良好，“分享即赚钱，到达才收费”的品牌口号在业界疯传，正式开启互联网广告新纪元。</div>
            <div class="fc-process">珠宝品牌I DO，院线影片小马奔腾等品牌相继和疯传进行了深度合作。</div>
            <div class="fc-process">APP版本1.3上线，注册用户突破200w，经过9个月多的运营，已经积累了一大批忠实用户，在业界有口皆碑。</div>
            <div class="fc-process">APP版本2.0上线	2.0版本全新改版，加入了锁屏，积分墙等功能，拓宽了更多的广告展示渠道，也给用户带来了更多收益体验。</div>
        </div>
    </div>
</div>
<div id="mien" class="fc-understand-bg3">
    <div class="fc-containner-1080">
        <p class="fc-under-title3">COMPANY</p>
        <p class="fc-fc">公司风采</p>
        <div class="fc-fc-img"><img src="/Application/Home/Public/aboutus/fc-company.png" width="100%"></div>
    </div>
</div>

<style>
    .page-shortcut {
        position: fixed;
        right: 0;
        bottom: 200px;
        z-index: 1004;
        width: 195px;
        height: 288px;
        background: url(http://static.fengchuan100.com/new20150827/images/shortcut_bg.png) no-repeat;
    }
    .page-shortcut .btn {
        position: absolute;
        left: 20px;
        bottom: 24px;
        z-index: 2;;
        width: 160px;
        height: 44px;
        text-align: center;
        line-height: 44px;
        font-size: 20px;
        color: white;
        background: transparent;
        border-radius: 3px;
    }
</style>
<!-- inject:js-->
<script src="/Application/Home/Public/aboutus/jquery.min.js"></script>


<style>
    .footer{font-size: 14px;height:50px;padding:11px 0;background-color:#363636;color:#fff;text-align:center;width:100%}.footer a{color:#fff;vertical-align:middle}.footer i{display:inline-block;height:12px;margin:0 3px;width:1px;border-right:1px solid #fff;vertical-align:middle}.footer span{vertical-align:middle}.footer_copyright,.footer_link{height:25px;line-height:25px}
</style>
<div class="footer">
    <div class="content">
        <div class="footer_link">
            <a target="_blank" href="">关于我们</a>
            <i></i>
            <a target="_blank" href="">联系我们</a>
            <i></i>
            <a target="_blank" href="">服务条款</a>
            <i></i>
            <a target="_blank" href="">免责声明</a>
            <i></i>
            <span>版权所有 © <?php echo ($config["storename"]); ?> 2011-2016. </span>
        </div>
        <div class="footer_copyright">
            <span><?php echo ($config["recordno"]); ?> </span>
            <i></i>
            <span><?php echo ($config["publicno"]); ?></span>
        </div>
    </div>
</div>
</body></html>