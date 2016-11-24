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
<link rel="stylesheet" href="/Application/Home/Public/css/pages_built.css">
<link href="/Application/Home/Public/css/reset_v5.css" rel="stylesheet" type="text/css">
<link href="/Application/Home/Public/css/aili_inside_v10.css" rel="stylesheet" type="text/css">
<body>
<!--侧边栏-->
<div class="sidebar" id="js_side_bar">
    <div class="sidebar_shoppingCart_wrap">
        <div class="icon_shoppingCart sidebar_icon js_shoppingCart" id="js_cart_icon_div" <?php if(empty($user)): ?>onclick="onlogin()"<?php else: ?>onclick="show_cart(this)"<?php endif; ?> >
            <a href="javascript:void(0);"> 选<br>号<br>车</a>
            <span class="shoppingCart_num js_cart_num" id="cartnum">
                <?php if(empty($cart)): ?>0
                    <?php else: echo count($cart); endif; ?>
            </span>
        </div>
        <div class="shoppingCart_on" id="js_cart_list_div">
            <div class="shoppingCart_on_h">
                <a href="javascript:void(0)" class="fr js_close" onclick="close_cart()"><img src="/Application/Home/Public/images/uploadify-cancel.png"> </a>
            </div>
            <div id="ajax_return"></div>
            <div class="shoppingCart_summary">
                <div class="shoppingCart_count clearfix">
                    <div class="fl">
                        <dl>
                            <dt><span>总：<span class="text_highlight big_size js_cart_num"><?php echo count($cart);?></span>个</span></dt>
                            <dd><a href="javascript:;" id="js_delete_all" style="display: none;">全部清空</a></dd>
                        </dl>
                    </div>
                    <div class="fr">
                        <a href="javascript:void(0);" onclick="del_allcart()" class="button btn_normal_common js_full_screen"><span class="btn_wrap">全部删除</span></a>
                        <a href="<?php echo U('Home/Cart/cart');?>" class="button btn_normal_important js_full_screen" style="margin-left:10px"><span class="btn_wrap">立即推广</span></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="icon_border">
        <!-- 联系销售经理 开始 -->
        <div class="sidebar_icon icon_telephone js_notice_alert sidebar_icon_selected">
            <a href="javascript:;"></a>
            <div class="sidebarMain_grid contactMain js_notice_content" style="display: none;">
                <h4><?php echo ($config["servicepos"]); ?></h4>
                <img src="/Application/Home/Public/images/notice_close.png" width="9" class="sidebar_notice_close js_content_close">
                <ul>
                    <li class="li_01"><em><?php echo ($config["servicename"]); ?></em></li>
                    <li class="li_02"><em><?php echo ($config["servicephone"]); ?></em></li>
                    <li class="li_03"><em><a target="_blank" class="saleqq"  href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($config["serviceqq"]); ?>&site=qq&menu=yes"><?php echo ($config["serviceqq"]); ?></a>
                    </em></li>
                </ul>
            </div>
        </div>
        <!-- 联系销售经理 结束 -->

        <!-- 投诉建议 开始 -->

        <div class="sidebar_icon icon_writing js_notice_alert"><a href="javascript:;">投诉建议</a>
            <div class="complaintsMain sidebarMain_grid js_notice_content">
                <h4>投诉建议</h4>
                <form id="feedbackForm" action="http://chuanbo.weiboyi.com/hwauth/email/email">
                    <input name="to" id="to" type="hidden" class="tt" value="supporta@weiboyi.com">
                    <input name="cc" id="cc" type="hidden" class="tt" value="" style="width: 375px;">
                    <textarea name="text" id="text"></textarea>
            <span class="feedbackContent_msg">
                 <span id="feedbackMsg">
                    您还可以输入
                    <span id="feedbackLeftChar">300</span>
                    个字
                 </span>
                 <span id="feedbackWarning">
                    已超出
                    <span id="feedbackExceedChar">20</span>
                    个字
                 </span>
            </span>
            <span class="fr">
                <a href="javascript:void(0)" class="button btn_small_important suggest_submit">
                    <span class="btn_wrap">确定</span>
                </a>
                <a href="javascript:void(0)" class="button btn_small_common suggest_cancel js_content_cancel">
                    <span class="btn_wrap">取消</span>
                </a>
            </span>
                    <input type="hidden" name="web_csrf_token" value="57d40e0745f6e" id="web_csrf_token"></form>
            </div>
        </div>
        <!-- 投诉建议 结束 -->

        <div class="sidebar_icon icon_servicecontent js_servicecontent js_notice_alert">
            <a href="javascript:;" class="" title="服务内容"></a>
            <div class="serviceContentMain sidebarMain_grid js_notice_content js_sub_elem">
                <h4>服务内容</h4>
                <img src="/Application/Home/Public/images/notice_close.png" width="9" class="sidebar_notice_close js_content_close">
                <p class="color_default"><?php echo ($config["servicecontent"]); ?></p>
            </div>
        </div>
    </div>
    <div class="backTo_front" onclick="goTop()">
        TOP
    </div>
</div>
<!--navigation start-->
<?php if(!empty($user)): ?><div class="header_info">
        <div class="content">
            <span class="header_info_name">您好：<a href="<?php echo U('Home/User/index');?>"><span id="crt_username">zhongwenyu1987</span></a></span>
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
                    <img class="icon" width="29" src="/Application/Home/Public/images/news.png"/>
                    <span>新闻资讯</span>
                    <img class="arrow_down_nav valign_middle" width="21" src="/Application/Home/Public/images/nav_arrow_down_2x.png">
                </a>
                <div class="nav_list_all">
                    <dl>
                        <dt>
                            <img width="19" src="/Application/Home/Public/images/nav_location_2x.png">
                            <a href="<?php echo U('Home/User/index');?>">查看账号</a>
                        </dt>
                        <dd>
                            <a href="/weixin.html" target="_blank">微信公众号</a>
                            <i></i>
                            <a href="/weibo.html" target="_blank">新浪微博</a>
                            <i></i>
                            <a href="/shipin.html" target="_blank">视频自媒体</a>
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
                <a target="" href="/weixin.html" class="color_high_light">微信公众号<img src="/Application/Home/Public/images/new_red.png" width="28" class="tags"></a>
                <a target="" href="/weibo.html" class="color_high_light">新浪微博<img src="/Application/Home/Public/images/new_red.png" width="28" class="tags"></a>
                <a target="" href="/shipin.html" class="color_high_light">视频自媒体<img src="/Application/Home/Public/images/new_red.png" width="28" class="tags"></a>
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
<div class="zartcile_container w1160 clearflt">
    <div class="zartcile_main fl">
        <h1 class="zarticle_title"><?php echo ($news["newstitle"]); ?></h1>
        <div class="zarticle_tip clearflt">
            <div class="zfrom fl">时间：<?php echo (date("Y-m-d",$news["addtime"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;来源：<a class="zfrom_link"><?php echo ($news["newsfrom"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作者：<?php echo ($news["author"]); ?></div>
            <div class="zarticle_shares bdsharebuttonbox fr bdshare-button-style0-16"></div>
        </div>
        <div class="zarticle_inner" id="icontent" style="margin-top: 15px"><?php echo ($news["newscontent"]); ?></div>


        <h2 class="zmain_title">热点阅读<span class="zsquare"></span></h2>
        <div class="zlink_box zlink_box1">
            <div class="zlink_list clearflt">
                <?php if(is_array($hotnews)): foreach($hotnews as $key=>$v): ?><a class="zlink" href="/news/<?php echo ($v['id']); ?>.html" title="<?php echo ($v["newstitle"]); ?>" target="_blank">
                        <img src="<?php echo ($v["recopic"]); ?>" alt="<?php echo ($v["newstitle"]); ?>" width="180" height="150">
                        <span class="zlink_title"><?php echo ($v["newstitle"]); ?></span>
                    </a><?php endforeach; endif; ?>
            </div>
        </div>
    </div>
    <div class="zarticle_side fr">
        <h2 class="zside_title">精彩推荐<span class="zsquare"></span></h2>
        <div class="zside_section mt25">
            <div class="zlink_box3 clearflt">
                <?php if(is_array($recronews)): foreach($recronews as $k=>$v): if(in_array(($k), explode(',',"0,1"))): ?><a class="zlink" href="/news/<?php echo ($v['id']); ?>.html" title="秋季流行元素在这" target="_blank">
                            <img src="<?php echo ($v["recopic"]); ?>" alt="<?php echo ($v["newstitle"]); ?>" width="140" height="140">
                            <span class="zlink_title"><?php echo ($v["newstitle"]); ?></span>
                        </a><?php endif; endforeach; endif; ?>
            </div>
            <ul class="zhot_sublist zhot_sublist2">
                <?php if(is_array($recronews)): foreach($recronews as $k=>$v): if(in_array(($k), explode(',',"2,3,4,5,6"))): ?><li class="zhot_subitem">
                            <a class="zhot_sublink" href="/news/<?php echo ($v['id']); ?>.html" title="<?php echo ($v["newstitle"]); ?>!" target="_blank">
                                <i class="zdot fl"></i><?php echo ($v["newstitle"]); ?>!</a>
                        </li><?php endif; endforeach; endif; ?>
            </ul>
        </div>
        <h2 class="zside_hot_title mt25">热点排行</h2>
        <div class="zpopular_box">
            <ul class="zpopular_list">
                <?php if(is_array($recronews)): foreach($recronews as $k=>$v): if(in_array(($k), explode(',',"0,1,2"))): ?><li class="zpopular_item clearflt"> <i class="znum znum<?php echo (return_rank($k,1)); ?>"></i> <a class="zpopular_pic" href="/news/<?php echo ($v['id']); ?>.html" title="<?php echo ($v["newstitle"]); ?>" target="_blank"><img src="<?php echo ($v["recopic"]); ?>" alt="<?php echo ($v["newstitle"]); ?>" width="105" height="105"></a>
                            <div class="zpopular_desc">
                                <h3 class="zpopular_item_title"><a class="zpopular_link" href="/news/<?php echo ($v['id']); ?>.html" title="<?php echo ($v["newstitle"]); ?>" target="_blank"><?php echo ($v["newstitle"]); ?></a></h3>
                                <p class="zpopular_p"><?php echo ($v["instro"]); ?><a class="zpopular_detail" href="/news/<?php echo ($v['id']); ?>.html" title="详情" target="_blank"> &lt;详情&gt; </a></p>
                            </div>
                        </li><?php endif; endforeach; endif; ?>
            </ul>
            <ul class="zpopular_list2">
                <?php if(is_array($recronews)): foreach($recronews as $k=>$v): if(in_array(($k), explode(',',"0,1,2"))): ?><li class="zpopular_item2 clearflt"> <i class="znum znum<?php echo (return_rank($k,4)); ?>"></i> <a class="zpopular_link<?php echo (return_rank($k,4)); ?>" href="/news/<?php echo ($v['id']); ?>.html" title="<?php echo ($v["newstitle"]); ?>" target="_blank"><?php echo ($v["newstitle"]); ?></a> </li><?php endif; endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>
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
</body>
</html>