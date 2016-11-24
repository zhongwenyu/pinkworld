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
<h1 class="logo_seo">
    <a href="http://www.weiboyi.com/">
        <img src="/Application/Home/Public/images/logo_seo.png" alt="粉天下">
    </a>
</h1>
<div class="container">
    <div class="inner_box">
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
        <!--主题部分开始-->
        <div id="filterItemsContainer">
            <div class="content text_center">
                <div class="searchWrap clearfix">
                    <div class="searchContainer">
                        <div class="search_inputWrap">
                            <div class="search_input_close" style="display: none;"></div>
                            <input type="text" class="search_input" id="search_input" placeholder="请输入账号名称"></div>
                        <a href="javascript:void(0);" onclick="show_goodslist(3,'keyword','weixin',this)" class="search_button">搜视频自媒体账号</a>
                    </div>
                </div>

                <div class="search_filter">
                    <table width="100%">
                        <tr class="search_grid">
                            <th class="categoryFilterTitle">平台</th>
                            <td colspan="2">
                                <div class="categoryContent relative">
                                    <div class="categoryContent_list" id="morecat2">
                                        <ul class="common_category_container clearfix miaopai_filter">
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'','',this)" <?php if(empty($catid)): ?>class="current"<?php endif; ?>>不限</a></li>
                                            <?php if(is_array($platcat)): foreach($platcat as $key=>$v): ?><li><a href="/shipin/catid/<?php echo ($v['id']); ?>" <?php if($catid == $v['id']): ?>class="current"<?php endif; ?>><?php echo ($v["catname"]); ?></a></li><?php endforeach; endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="search_grid" data-name="category_filter">
                            <th class="categoryFilterTitle">常见分类</th>
                            <td colspan="2">
                                <div class="categoryContent relative">
                                    <div class="categoryContent_list" id="morecat">
                                        <ul class="common_category_container clearfix miaopai_filter">
                                            <li>
                                                <a href="javascript:void(0);" onclick="show_goodslist(3,'','',this)" <?php if(empty($catid)): ?>class="current"<?php endif; ?>>不限</a>
                                            </li>
                                            <?php if(is_array($cat)): foreach($cat as $key=>$v): ?><li><a href="/shipin/catid/<?php echo ($v['id']); ?>" <?php if($catid == $v['id']): ?>class="current"<?php endif; ?>><?php echo ($v["catname"]); ?></a></li><?php endforeach; endif; ?>
                                        </ul>
                                        <span class="toggle_btn categoryMore" onclick="show_morecat('morecat')">隐藏<img src="/Application/Home/Public/images/arrow_up_normal_2x.png" class="arrow" width="11"></span>
                                </div>
                            </td>
                        </tr>
                        <tr class="search_grid" data-name="followers_count_range">
                            <th class="categoryFilterTitle">粉丝数</th>
                            <td colspan="2">
                                <div class="categoryContent clearfix">
                                    <div class="">
                                        <ul data-bind="foreach: items" class="price_wrap">
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'','',this)" class="current">不限</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'fans','0-1',this)">1万以下</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'fans','1-5',this)">1-5万</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'fans','5-10',this)">5-10万</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'fans','10-50',this)">10-50万</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'fans','50-100',this)">50-100万</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'fans','以上',this)">100万以上</a></li>
                                        </ul>
                                    </div>
                                    <p class="fr">
                                        <span class="price_range_wrap">
                                            <input type="text" class="price_range" id="fans1"> - <input type="text" class="price_range" id="fans2">
                                            <span>万</span>
                                        </span>
                                        <span class="button btn_small_important" onclick="show_goodslist(3,'fans','fans1','fans2','between')"><span class="btn_wrap">确定</span></span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tbody><tr class="search_grid">
                            <th>价格</th>
                            <td>
                                <div class="categoryContent clearfix">
                                    <div class="fl">
                                        <ul data-bind="foreach: items" class="price_wrap">
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'','',this)" class="current">不限</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'ckprice','0-100',this)">100元以下</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'ckprice','100-200',this)">100-200元</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'ckprice','200-1000',this)">200-1000元</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'ckprice','1000-5000',this)">1000-5000元</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_goodslist(3,'ckprice','以上',this)">5000元以上</a></li>
                                        </ul>
                                    </div>
                                    <p class="fr">
                                        <span class="price_range_wrap">
                                            <input type="text" class="price_range" id="price1"> - <input type="text" class="price_range" id="price2">
                                            <span>元</span>
                                        </span>
                                        <span class="button btn_small_important" onclick="show_goodslist(3,'ckprice','price1','price2','between')"><span class="btn_wrap">确定</span></span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="list_box_filter font_size_small content">
                <div class="">
                    <label class="fl choseAll_label" onclick="all_cart(this,3)">
                        <input  type="checkbox">
                        <span class="valign_middle">全选</span>
                    </label>
                    <span class="list_info_totle color_light fl">
                <img class="valign_middle" width="14" src="/Application/Home/Public/images/list_info_2x.png">
                共计<span id="accountTotal"><?php echo ($count); ?></span>个
            </span>
                    <div class="list_filter_content">
                        <div class="executeType">
                            <i class="valign_top">执行类型</i>
                            <span class="">
                                <a href="javascript:void(0);" onclick="show_goodslist(3,'','',this,'color_high_light')" class="color_high_light">不限</a>
                                <a href="javascript:void(0);" onclick="show_goodslist(3,'isyy','1',this,'color_high_light')">需预约</a>
                                <a href="javascript:void(0);" onclick="show_goodslist(3,'isyy','0',this,'color_high_light')">无需预约</a>
                            </span>
                        </div>
                        <div class="list_filter_category">
                            <a class="color_default" href="javascript:void(0)" onclick="show_goodslist(3,'order','reading',this)">平均播放量</a>
                        </div>
                        <div class="list_filter_category">
                            <a class="color_default" href="javascript:void(0)" onclick="show_goodslist(3,'','',this)">粉丝量</a>
                        </div>
                        <div class="list_filter_category list_sort_box">
                            <a href="javascript:void(0)" onclick="show_order(this)" class="list_sort_default valign_middle">
                                <span data-bind="text: getActiveName()">默认排序</span>
                                <img class="fr" width="11" src="/Application/Home/Public/images/arrow_up_normal_2x.png">
                            </a>
                            <ul class="list_sort_content" style="display: none;">
                                <li data-bind="">
                                    <a href="javascript:void(0);" onclick="show_goodslist(3,'order','ckprice',this)">
                                        <span>价格从低到高</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <script>
                            function show_order(obj){
                                if(!$(obj).next("ul").is(":hidden")){
                                    $(obj).next("ul").hide();
                                }else{
                                    $(obj).next("ul").show();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div id="accountListContainer" class="account_list">
                <div class="loading_mask" id="loading"></div>
                <table class="list_table" width="100%">
                    <?php if($typeid == 1): if(empty($list)): ?><div class="content">
        <div class="search_station_wrap clearfix">
            <ul data-bind="" class="clearfix">
                <li>
                    <img src="/Application/Home/Public/images/list_info_2x.png" width="14" class="valign_middle">
                    您设置的账号要求下，可以推荐的优质账号过少，您可以清空或重新设置账号要求
                </li>
            </ul>
        </div>
    </div><?php endif; ?>
<table class="list_table" width="100%">
    <?php if(is_array($list)): foreach($list as $key=>$v): ?><tbody>
        <tr>
            <td style="width:30px" class="account_check">
                <input type="checkbox" name="cart<?php echo ($v["id"]); ?>" data-id="<?php echo ($v["id"]); ?>" onclick="checkbox_cart(<?php echo ($v["id"]); ?>,1,this,event,190)">
            </td>
            <td width="300">
                <div class="account_info">
                    <p class="account_head">
        <span>
            <a href="/weixin/<?php echo ($v['id']); ?>" style="width: 56px; height: 56px; overflow: hidden; display: block;" onclick="cart_fly('<?php echo ($v["id"]); ?>')">
                <img class="valign_middle js_avatar" id="goodsimg<?php echo ($v['id']); ?>" src="<?php echo ($v["pic"]); ?>" style="width: 56px; height: auto;">
            </a>
        </span>
                        <?php if($v['isyy'] == 1): ?><span class="account_order"></span><?php endif; ?>
                    </p>
                    <div class="account_info_wrap">
                        <div class="account_info_others">
                            <p class="account_name">
                                <span class="icon_list_platform icon_list_wechat valign_middle"></span>
                                <?php if($v['isrz'] == 1): ?><span class="account_wechat_certified"></span><?php endif; ?>
                                <a href="/weixin/<?php echo ($v['id']); ?>" target="_blank"><?php echo ($v["name"]); ?></a>
                            </p>
                            <div class="account_weixin">
                                <a title="点击查看详情" href="javascript:void(0);" onclick="show_code('<?php echo ($v['code']); ?>')" class="color_default js_showCodeDetail">
                                    <img width="15" class="valign_middle" src="/Application/Home/Public/images/qr_code_2x.png">
                                </a>
                                <span class="account_weixin_name font_size_small valign_middle"><?php echo ($v["wechat"]); ?></span>
                            </div>
                            <?php if(!empty($v['sign'])): ?><div class="font_size_small">
                                    <?php if(is_array($v['sign'])): foreach($v['sign'] as $key=>$s): ?><a class="account_original text_center valign_middle" href="javascript:"><?php echo ($sign[$s['sign']]['signname']); ?></a><?php endforeach; endif; ?>
                                </div><?php endif; ?>
                        </div>
                    </div>
                </div>
            </td>
            <td width="75">
                <div class="account_others">
                    <span class="account_others_title">粉丝数</span>
                    <span class="account_others_content"><?php echo ($v["fans"]); ?>万</span>
                </div>
            </td>
            <td width="480">
                <table class="account_price">
                    <thead>
                    <tr>
                        <th width="30%"><span class="account_others_title">位置</span></th>
                        <th class="price_reference_title" width="55%"><span class="account_others_title">参考报价</span></th>
                        <th width="15%"><span class="account_others_title">阅读量</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($v['spec'])): foreach($v['spec'] as $key=>$p): ?><tr>
                            <td><span><?php echo ($spec[$p['specid']]['specname']); ?></span></td>
                            <td class="price_reference_content"><span class="color_high_light"><b class="money"><?php echo ($p["price"]); ?></b></span></td>
                            <td><span><?php echo (return_wan($p["reading"])); ?></span></td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </td>
            <td width="35"></td>
            <td>
                <div class="account_others">
                    <span class="account_others_title">订单数</span>
                    <div class="account_others_content account_use_times">
                        <span>月订单：</span><em><?php echo ($v["monthorder"]); ?></em>次
                    </div>
                </div>
            </div>
            </td>
            <td>
                <div class="account_others">
                    <span class="account_others_title">配合度</span>
                    <a href="/weixin/<?php echo ($v['id']); ?>" target="_blank" class="account_others_content account_addimg relative"><img width="13" src="/Application/Home/Public/images/group_2x.png">账号详情</a>
                </div>
            </td>
        </tr>
        </tbody><?php endforeach; endif; ?>
</table>
<div style="width:100%;text-align: center;overflow: hidden"><?php echo ($page); ?></div>
                        <?php elseif($typeid == 2): ?>
                        <?php if(empty($list)): ?><div class="content">
        <div class="search_station_wrap clearfix">
            <ul data-bind="" class="clearfix">
                <li>
                    <img src="/Application/Home/Public/images/list_info_2x.png" width="14" class="valign_middle">
                    您设置的账号要求下，可以推荐的优质账号过少，您可以清空或重新设置账号要求
                </li>
            </ul>
        </div>
    </div><?php endif; ?>
<table class="list_table" width="100%">
    <?php if(is_array($list)): foreach($list as $key=>$v): ?><tbody>
        <tr>
            <td style="width:30px" class="account_check">
                <input type="checkbox" name="cart<?php echo ($v["id"]); ?>" data-id="<?php echo ($v["id"]); ?>" onclick="checkbox_cart(<?php echo ($v["id"]); ?>,2,this,event,190)">
            </td>
            <td width="300">
                <div class="account_info">
                    <p class="account_head">
        <span>
            <a href="<?php echo ($v["link"]); ?>" rel="nofollow" style="width: 56px; height: 56px; overflow: hidden; display: block;">
                <img class="valign_middle js_avatar" src="<?php echo ($v["pic"]); ?>" id="goodsimg<?php echo ($v['id']); ?>" style="width: 56px; height: auto;">
            </a>
        </span>
                        <?php if($v['isyy'] == 1): ?><span class="account_order"></span><?php endif; ?>
                    </p>
                    <div class="account_info_wrap">
                        <div class="account_info_others">
                            <p class="account_name">
                                <span class="icon_list_platform icon_list_weibo valign_middle"></span>
                                <?php if($v['isrz'] == 1): ?><img class="valign_middle" width="17" src="/Application/Home/Public/images/v_weibo_2x.png"><?php endif; ?>
                                <a href="<?php echo ($v["link"]); ?>" rel="nofollow" target="_blank"><?php echo ($v["name"]); ?></a>
                            </p>
                            <div class=" account_moments">
                                <?php if($v['sex'] == 1): ?><img src="/Application/Home/Public/images/male_2x.png" width="15" class="valign_middle">
                                    <?php else: ?>
                                    <img src="/Application/Home/Public/images/female_2x.png" width="15" class="valign_middle"><?php endif; ?>
                                <span class="account_weixin_name font_size_small valign_middle" title="<?php echo ($v["instro"]); ?>"><?php echo ($v["instro"]); ?></span>
                            </div>
                            <?php if(!empty($v['sign'])): ?><div class="font_size_small">
                                    <?php if(is_array($v['sign'])): foreach($v['sign'] as $key=>$s): ?><a class="account_original text_center valign_middle" href="javascript:"><?php echo ($sign[$s['sign']]['signname']); ?></a><?php endforeach; endif; ?>
                                </div><?php endif; ?>
                        </div>
                    </div>
                </div>
            </td>
            <td width="75">
                <div class="account_others">
                    <span class="account_others_title">粉丝数</span>
                    <span class="account_others_content"><?php echo ($v["fans"]); ?>万</span>
                </div>
            </td>
            <td width="480">
                <table class="account_price">
                    <thead>
                    <tr>
                        <?php if(is_array($v['spec'])): foreach($v['spec'] as $k=>$p): ?><th width="<?php echo (return_width($v['spec'])); ?>%"><span class="account_others_title"><?php echo ($spec[$p['specid']]['specname']); ?></span></th><?php endforeach; endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php if(is_array($v['spec'])): foreach($v['spec'] as $key=>$p): ?><td><span class="color_high_light"><b class="money">￥<?php echo ($p["price"]); ?></b></span></td><?php endforeach; endif; ?>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="35"></td>
            <td>
                <div class="account_others">
                    <span class="account_others_title">订单数</span>
                    <div class="account_others_content account_use_times">
                        <span>月订单：</span><em><?php echo ($v["monthorder"]); ?></em>次
                    </div>
                </div>
            </td>
            <td>
                <div class="account_others">
                    <span class="account_others_title">配合度</span>
                    <a href="/weibo/<?php echo ($v['id']); ?>" target="_blank" class="account_others_content account_addimg relative"><img width="13" src="/Application/Home/Public/images/group_2x.png">账号详情</a>
                </div>
            </td>
        </tr>
        </tbody><?php endforeach; endif; ?>
</table>
<div style="width:100%;text-align: center;overflow: hidden"><?php echo ($page); ?></div>
                        <?php elseif($typeid == 3): ?>
                        <?php if(empty($list)): ?><div class="content">
        <div class="search_station_wrap clearfix">
            <ul data-bind="" class="clearfix">
                <li>
                    <img src="/Application/Home/Public/images/list_info_2x.png" width="14" class="valign_middle">
                    您设置的账号要求下，可以推荐的优质账号过少，您可以清空或重新设置账号要求
                </li>
            </ul>
        </div>
    </div><?php endif; ?>
<table class="list_table" width="100%">
    <?php if(is_array($list)): foreach($list as $key=>$v): ?><tbody>
        <tr>
            <td style="width:30px" class="account_check">
                <input type="checkbox" name="cart<?php echo ($v["id"]); ?>" data-id="<?php echo ($v["id"]); ?>" onclick="checkbox_cart(<?php echo ($v["id"]); ?>,1,this,event,190)">
            </td>
            <td width="300">
                <div class="account_info" style="width: 380px; padding-right: 20px;">
                    <p class="account_head">
        <span>
            <a href="<?php echo ($v["link"]); ?>" rel="nofollow" style="width: 56px; height: 56px; overflow: hidden; display: block;">
                <img class="valign_middle js_avatar" src="<?php echo ($v["pic"]); ?>" id="goodsimg<?php echo ($v['id']); ?>" style="width: 56px; height: auto;">
            </a>
        </span>
                        <?php if($v['isyy'] == 1): ?><span class="account_order"></span><?php endif; ?>
                    </p>
                    <div class="account_info_wrap">
                        <div class="account_info_others">
                            <p class="account_name">
                                <?php if($v['platcatid'] == 24): ?><span class="icon_list_platform icon_list_meipai valign_middle"></span>
                                    <?php elseif($v['platcatid'] == 45): ?>
                                    <span class="icon_list_platform icon_list_kuaishou valign_middle"></span>
                                    <?php elseif($v['platcatid'] == 46): ?>
                                    <span class="icon_list_platform icon_list_bilibili valign_middle"></span>
                                    <?php elseif($v['platcatid'] == 84): ?>
                                    <span class="icon_list_platform icon_list_youku valign_middle"></span>
                                    <?php elseif($v['platcatid'] == 44): ?>
                                    <span class="icon_list_platform icon_list_yingke valign_middle"></span>
                                    <?php elseif($v['platcatid'] == 82): ?>
                                    <span class="icon_list_platform icon_list_yizhibo valign_middle"></span>
                                    <?php elseif($v['platcatid'] == 84): ?>
                                    <span class="icon_list_platform icon_list_huajiao valign_middle"></span>
                                    <?php else: ?>
                                    <span class="icon_list_platform icon_list_miaopai valign_middle"></span><?php endif; ?>
                                <?php if($v['isrz'] == 1): ?><img class="valign_middle" width="17" src="/Application/Home/Public/images/v_miaopai_2x_v2.png"><?php endif; ?>
                                <a href="<?php echo ($v["link"]); ?>" rel="nofollow" target="_blank"><?php echo ($v["name"]); ?></a>
                                <?php if($v['sex'] == 1): ?><img src="/Application/Home/Public/images/male_2x.png" width="15" class="valign_middle">
                                    <?php else: ?>
                                    <img src="/Application/Home/Public/images/female_2x.png" width="15" class="valign_middle"><?php endif; ?>
                                <img src="/Application/Home/Public/images/area_2x.png" width="11" class="valign_middle icon_area">
                                <span class="valign_middle" title="<?php echo ($v["area"]); ?>"><?php echo ($v["area"]); ?></span>
                            </p>
                            <div class=" account_moments">
                                <span class="account_weixin_name font_size_small valign_middle" title="<?php echo ($v["instro"]); ?>"><?php echo ($v["instro"]); ?></span>
                            </div>
                            <?php if(!empty($v['sign'])): ?><div class="font_size_small">
                                    <?php if(is_array($v['sign'])): foreach($v['sign'] as $key=>$s): ?><a class="account_original text_center valign_middle" href="javascript:"><?php echo ($sign[$s['sign']]['signname']); ?></a><?php endforeach; endif; ?>
                                </div><?php endif; ?>
                        </div>
                    </div>
                </div>
            </td>
            <td width="75">
                <div class="account_others">
                    <span class="account_others_title">粉丝数</span>
                    <span class="account_others_content"><?php echo ($v["fans"]); ?>万</span>
                </div>
            </td>
            <td>
                <div class="account_others">
                <span class="account_others_title">参考报价</span>
                <div class="account_list_data">
                    <?php if(is_array($v['spec'])): foreach($v['spec'] as $key=>$p): ?><span><?php echo ($spec[$p['specid']]['specname']); ?>:</span> <b class="color_high_light money">￥<?php echo ($p["price"]); ?></b><br><?php endforeach; endif; ?>
                </div>
            </div>
            </td>
            <td width="130">
                <span class="account_others_title">平均播放数</span>
                <span class="account_others_content"><?php echo ($v["reading"]); ?></span><br>
            </td>
            <td>
                <div class="account_others">
                    <span class="account_others_title">平均互动数</span>
                    <div class="account_others_content account_use_times">
                        <span>点赞数：</span><em><?php echo ($v["liked"]); ?></em>
                        <br>
                        <span>评论：</span><em><?php echo ($v["comment"]); ?></em>
                    </div>
                </div>
            </td>
            <td>
                <div class="account_others">
                    <span class="account_others_title">配合度</span>
                    <a href="/weibo/<?php echo ($v['id']); ?>" target="_blank" class="account_others_content account_addimg relative"><img width="13" src="/Application/Home/Public/images/group_2x.png">账号详情</a>
                </div>
            </td>
        </tr>
        </tbody><?php endforeach; endif; ?>
</table>
<div style="width:100%;text-align: center;overflow: hidden"><?php echo ($page); ?></div><?php endif; ?>
                </table>
            </div>
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