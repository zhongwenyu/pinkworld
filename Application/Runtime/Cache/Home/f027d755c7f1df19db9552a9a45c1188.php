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
<body>
<div class="container">
    <div class="inner_box" style="padding-bottom: 60px!important;">
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
                    <?php if($typeid == 1): ?><img class="icon" width="29" src="/Application/Home/Public/images/nav_wechat_2x.png">
                        <span>微信公众号</span>
                        <?php elseif($typeid == 2): ?>
                        <img class="icon" width="29" src="/Application/Home/Public/images/nav_weibo_2x.png"/>
                        <span>新浪微博</span>
                        <?php elseif($typeid == 3): ?>
                        <img class="icon" width="29" src="/Application/Home/Public/images/nav_zimeiti_hover_2x.png"/>
                        <span>视频自媒体</span><?php endif; ?>

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

        <!-- 主题部分 开始 -->
        <div id="js_page_model">
            <div class="content weChat_account_detail">
                <div class="clearfix">
                    <!-- 头像 -->
                    <div class="weChat_account_left">
                        <p id="js_face_img" class="account_face relative">
                            <img class="header" src="<?php echo ($goods["pic"]); ?>" id="goodsimg<?php echo ($goods['id']); ?>">
                            <?php if($goods['isyy']): ?><em class="account_order_wrap">
                                    <span class="account_order"></span>
                                </em><?php endif; ?>
                        </p>
                    </div>
                    <!-- 头像 end-->

                    <div class="account_info_box">
                        <!--基础信息 -->
                        <p class="weChat_account_info">
                            <em>
                                <?php if($goods['platcatid'] == 24): ?><span class="icon_list_platform icon_list_meipai valign_middle"></span>
                                    <?php elseif($goods['platcatid'] == 45): ?>
                                    <span class="icon_list_platform icon_list_kuaishou valign_middle"></span>
                                    <?php elseif($goods['platcatid'] == 46): ?>
                                    <span class="icon_list_platform icon_list_bilibili valign_middle"></span>
                                    <?php elseif($goods['platcatid'] == 84): ?>
                                    <span class="icon_list_platform icon_list_youku valign_middle"></span>
                                    <?php elseif($goods['platcatid'] == 44): ?>
                                    <span class="icon_list_platform icon_list_yingke valign_middle"></span>
                                    <?php elseif($goods['platcatid'] == 82): ?>
                                    <span class="icon_list_platform icon_list_yizhibo valign_middle"></span>
                                    <?php elseif($goods['platcatid'] == 84): ?>
                                    <span class="icon_list_platform icon_list_huajiao valign_middle"></span>
                                    <?php else: ?>
                                    <span class="icon_list_platform icon_list_miaopai valign_middle"></span><?php endif; ?>
                                <?php if($goods['isrz']): if($goods['typeid'] == 1): ?><span class="account_wechat_certified"></span>
                                        <?php elseif($goods['typeid'] == 2): ?>
                                        <img class="valign_middle" width="17" src="/Application/Home/Public/images/v_weibo_2x.png">
                                        <?php elseif($goods['typeid'] == 3): ?>
                                        <img class="valign_middle" width="17" src="/Application/Home/Public/images/v_miaopai_2x_v2.png"><?php endif; endif; ?>
                                <b><?php echo ($goods["name"]); ?></b>
                                <?php if(is_array($goods['sign'])): foreach($goods['sign'] as $key=>$k): ?><span class="account_original text_center valign_middle"><?php echo ($k); ?></span><?php endforeach; endif; ?>
                            </em>
                        </p>
                        <?php if($goods['typeid'] == 1): ?><p class="color_light weChat_qr_code_word">
                                微信号&nbsp;<em class="color_default"><?php echo ($goods["wechat"]); ?></em>
                            </p><?php endif; ?>
                        <div class="video_account_info_box fl">
                            <ul class="video_account_data">
                                <li class="clearfix">
                                    <span class="color_light line_title">粉丝数</span>
                                    <em>172万</em>
                                </li>
                                <li class="clearfix">
                                    <span class="color_light line_title">参考报价</span>
                                    <div class="fans">
                                        <ul class="video_release_price_list text_center">
                                            <?php if(is_array($specprice)): foreach($specprice as $key=>$v): ?><li>
                                                    <p><?php echo ($goodsspec[$v['specid']]['specname']); ?></p>
                                                    <p>
                                                        <span class="money font_size_xxlarge color_high_light">￥<?php echo ($v["price"]); ?></span>
                                                    </p>
                                                </li><?php endforeach; endif; ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--基础信息 end-->

                        <!-- 功能按钮 加入购物车等 -->

                        <p class="clearfix">
                            <a href="javascript:void(0);" onclick="add_cart(<?php echo ($goods["id"]); ?>,<?php echo ($goods["typeid"]); ?>,event,190)" class="button btn_large_important fr"><span class="btn_wrap">加入选号车</span> </a>
                        </p>
                        <!-- 功能按钮 加入购物车 end-->

                    </div>
                    <div class="weChat_profile">
                        <h2 class="video_account_h2">
                            基础数据
                            <img src="/Application/Home/Public/images/video_data.png" width="22" class="valign_middle">
                        </h2>
                        <table>
                            <tbody><tr>
                                <th>性别/年龄/地域</th>
                                <td><?php if($goods['sex'] == 0): ?>男<?php else: ?>女<?php endif; ?>/<?php echo ($goods["age"]); ?>/<?php echo ($goods["area"]); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>平均播放数</th>
                                <td><?php echo ($goods["reading"]); ?></td>
                            </tr>
                            <tr>
                                <th>平均点赞数</th>
                                <td><?php echo ($goods["liked"]); ?></td>
                            </tr>
                            <tr>
                                <th>平均评论数</th>
                                <td><?php echo ($goods["comment"]); ?></td>
                            </tr>
                            <tr>
                                <th>平均弹幕数</th>
                                <td><?php echo ($goods["pjgz"]); ?></td>
                            </tr>
                            <tr>
                                <th>30天被预约数</th>
                                <td><?php echo ($goods['monthorder']); ?></td>
                            </tr>
                            </tbody></table>
                    </div>

                </div>

                <!--推荐账号部分 start-->

                <div class="clearfix">
                    <div class="clearfix tabChange_wrap">
                        <a href="javascript:;" class="cur">选了这个账号的人还选了<i></i></a>
                    </div>
                    <div class="clearfix recommend_wrap relative">
                        <div>
                            <?php if(is_array($goodsrand)): foreach($goodsrand as $key=>$v): ?><div class="single_recommend_grid">
                                    <div class="account_info">
                                        <div class="account_head text_center">
                                            <a target="_blank" href="<?php echo U('Home/Goods/goods_detail',array('id'=>$v['id']));?>">
                                                <?php if($v['isyy'] == 1): ?><span class="account_order"></span><?php endif; ?>
                                                <img class="accountHeader_avatar" src="<?php echo ($v["pic"]); ?>">
                                            </a>
                                        </div>
                                        <div class="account_info_wrap">
                                            <div class="account_info_others">
                            <span class="accountNick"><a class="color_default" target="_blank" href="<?php echo U('Home/Goods/goods_detail',array('id'=>$v['id']));?>">
                                <?php if($v['typeid'] == 1): ?><span class="icon_list_platform icon_list_wechat valign_middle"></span>
                                    <?php elseif($v['typeid'] == 2): ?>
                                    <span class="icon_list_platform icon_list_weibo valign_middle"></span>
                                    <?php elseif($v['typeid'] == 3): ?>
                                    <span class="icon_list_platform icon_list_miaopai valign_middle"></span><?php endif; ?>
                                <span title="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></span></a>
                            </span>
                            <span class="accountName">
                                <?php if($v['typeid'] == 1): ?><a class="js_fancybox" href=""><img width="15" class="valign_middle" src="/Application/Home/Public/images/qr_code_2x.png"></a><?php endif; ?>

                                <span>
                                    <?php if($v['typeid'] == 1): echo ($v["wechat"]); ?>
                                        <?php else: ?>
                                        <?php echo ($v["instro"]); endif; ?>
                                </span></span>
                                                <p class="">
                                                    <a href="javascript:void(0);" onclick="add_cart(<?php echo ($v["id"]); ?>,<?php echo ($v["typeid"]); ?>,event,190)" class="button_add_account">加入选号车</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
                <!--推荐账号部分 end-->

                <!--数据分析-->
                <div class="clearfix data_analysis_wrap">
                    <div class="data_analysis">
                        <div class="clearfix tabChange_wrap">
                            <a href="javascript:;" class="fl cur">基础数据<i class="border"></i></a>
                            <a href="javascript:;" class="fl">案例/须知<i class="border"></i></a>
                        </div>

                        <!--商品详情-->
                        <p class="clearfix data_analysis_container"><?php echo ($goods["contents"]); ?></p>
                        <!--案例分析-->
                        <div class="clearfix single_platform_wrap" style="display: none">
                            <p class="tool">以下信息均由账号自己提供</p>
                            <!-- ko if: accountInfo.is_famous()==1 -->
                            <div style="display: none;">
                                <h3 class="single_h3">合作案例</h3>
                                <div></div>
                            </div>
                            <!-- /ko -->
                            <div style="clear: both;"></div>
                            <div>
                                <h3 class="single_h3">预约须知</h3>
                                <div>免费、酷炫、易用的3D音乐照片秀!简单几步,马上让您的照片炫起来!</div>
                            </div>

                            <div>
                                <h3 class="single_h3">合作优势</h3>
                                <div>免费、酷炫、易用的3D音乐照片秀!简单几步,马上让您的照片炫起来!</div>
                            </div>
                        </div>

                    </div>

                    <!--人气账号-->
                    <div class="bestAccount">
                        <p><span class="message_content_border"></span>人气账号：</p>
                        <ul>
                            <?php if(is_array($goodsbar)): foreach($goodsbar as $key=>$v): ?><li class="account_info clearfix">
                                    <div class="account_head text_center">
                                        <a target="_blank" href="">
                                            <span class="account_order"></span>
                                            <img class="accountHeader_avatar" src="<?php echo ($v["pic"]); ?>">
                                        </a>
                                    </div>
                                    <div class="account_info_wrap">
                                        <div class="account_info_others">
                        <span class="accountNick">
                            <a target="_blank" href="">
                                <?php if($goods['typeid'] == 1): ?><span class="icon_list_platform icon_list_wechat valign_middle"></span>
                                    <?php elseif($goods['typeid'] == 2): ?>
                                    <span class="icon_list_platform icon_list_weibo valign_middle"></span>
                                    <?php elseif($goods['typeid'] == 3): ?>
                                    <span class="icon_list_platform icon_list_miaopai valign_middle"></span><?php endif; ?>
                                <span title="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></span>
                            </a>
                        </span>
                        <span class="accountName">
                            <a href="" width="15" class="valign_middle">
                            </a>
                            <span>
                                <?php if($goods['typeid'] == 1): echo ($v["wechat"]); ?>
                                    <?php else: ?>
                                    <?php echo ($v["instro"]); endif; ?>
                            </span>
                        </span>
                                            <p class="">
                                                <a href="javascript:void(0);" onclick="add_cart(<?php echo ($v["id"]); ?>,<?php echo ($v["typeid"]); ?>,event,190)" class="button_add_account">加入选号车</a>
                                            </p>
                                        </div>
                                    </div>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- 主题部分 结束 -->

        <!-- 页尾部分 开始 -->
        <!--页脚-->
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