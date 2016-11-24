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
<link rel="stylesheet" href="/Application/Home/Public/css/all_built.css">
<script>
    function return_check(){
        var flag=true;
        $("span[id^='demandcheck']").each(function(){
            if($(this).html() == "未添加需求描述"){
                layer.msg("还有账号未添加需求描述！");
                flag=false;
            }
        });
        if(flag){
            document.getElementById("form1").submit();
        }
    }
</script>
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
                    <img class="icon" width="29" src="/Application/Home/Public/images/writeorder.png"/>
                    <span>完善订单信息</span>

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
            <div class="nav_top_btn">
                <a target="_blank" href="/regist">注册</a>
                <a target="_blank" href="http://www.ftx9.com">登录</a>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="process_bar">
        <div class="process_bar_line"></div>
        <ul>
            <li class="process_bar_current">
                <em>1</em>
                <p>填写预约需求</p>
            </li>
            <li class="process_bar_past">
                <em>2</em>
                <p>提交已选账号</p>
            </li>
            <li class="process_bar_past">
                <em>3</em>
                <p>选择支付方式</p>
            </li>
        </ul>
    </div>
</div>

<form action="<?php echo U('Home/Cart/order_handle');?>" id="form1" method="post" enctype="multipart/form-data">
<div style="padding-bottom: 80px;min-height: 600px" class="content">
    <p class="font_size_small fr">账号数：<em class="color_high_light"><?php echo count($cart);?> </em></p>
    <div style="" class="account_commit_box">
        <table class="list_table font_size_small reservationOrder_table" width="100%">
            <thead>
            <tr>
                <th class="reservationOrder_accountTitle">账号名称</th>
                <th>粉丝数</th>
                <th>参考报价</th>
                <th>需求添加状态</th>
                <th>操作</th>
            </tr>
            </thead>
        <?php if(is_array($cart_goods)): foreach($cart_goods as $key=>$v): ?><tbody class="tbody<?php echo ($v["id"]); ?>"><tr class="order_list_split"></tr></tbody>
            <tbody class="js_shopping_car focus tbody<?php echo ($v["id"]); ?>">
            <tr>
                <td width="320" class="reservation_require_account">
                    <div class="account_info clearfix">
                        <p class="account_head">
                            <a class="fl" href="/single?weibo_id=yigerenting179&amp;weibo_type=9&amp;sign=2171057836" target="_blank">
                                <img width="68" height="68" src="<?php echo ($v['goods']['pic']); ?>">
                            </a>
                        </p>
                        <div class="account_info_wrap">
                            <div class="account_info_others">
                                <p class="account_name">
                                    <?php if($v['goods']['typeid'] == 1): ?><span class="icon_list_platform icon_list_wechat valign_middle"></span>
                                        <?php elseif($v['goods']['typeid'] == 2): ?>
                                           <span class="icon_list_platform icon_list_weibo valign_middle"></span>
                                        <?php elseif($v['goods']['typeid'] == 3): ?>
                                           <span class="icon_list_platform icon_list_meipai valign_middle"></span><?php endif; ?>

                                    <?php if($v['goods']['isrz']): if($v['goods']['typeid'] == 1): ?><img class="valign_middle account_level" width="53" src="/Application/Home/Public/images/v_weixin_2x.png">
                                            <?php elseif($v['goods']['typeid'] == 2): ?>
                                            <img class="valign_middle account_level" width="20" src="/Application/Home/Public/images/v_weibo_2x.png">
                                            <?php elseif($v['goods']['typeid'] == 3): ?>
                                            <img class="valign_middle account_level" width="16" src="/Application/Home/Public/images/v_miaopai_2x_v2.png"><?php endif; endif; ?>
                                    <a href="<?php echo U('Home/Goods/goods_detail',array('id'=>$v['goodsid']));?>" target="_blank" class="color_default valign_middle" title="<?php echo ($v['goods']['name']); ?>"><?php echo ($v['goods']['name']); ?></a>
                                </p>
                                <p class="account_weixin">
                                    <a href="javascript:;" class="js_showCodeDetail">
                                        <img width="15" class="valign_middle" src="/Application/Home/Public/images/qr_code_2x.png">
                                    </a>
                                    <span class="account_weixin_name font_size_small valign_middle cart_spa1">
                                        <?php if($v['goods']['typeid'] == 1): echo ($v['goods']['wechat']); ?>
                                            <?php elseif($v['goods']['typeid'] == 2): ?>
                                              <?php echo ($v['goods']['instro']); endif; ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                </td>
                <td width="80">
                    <div class="account_others" style="text-align: left">
                        <span class="order_explain"><?php echo ($v['goods']['reading']); ?></span>
                    </div>
                </td>

                <td width="180">
                    <?php if(is_array($v['goods']['spec'])): foreach($v['goods']['spec'] as $key=>$g): ?><span><?php echo ($g["specname"]); ?></span>
                        <b class="color_high_light money">￥<?php echo ($g["price"]); ?></b><br><?php endforeach; endif; ?>
                </td>
                <td width="200">
                    <span class="js_desc_status color_high_light" id="demandcheck<?php echo ($v["id"]); ?>">未添加需求描述</span>
                </td>
                <td width="100" class="relative">
                    <div class="account_others order_operate">

                        <a href="javascript:void(0)" onclick="show_demand('cartdemand<?php echo ($v["id"]); ?>')" class="btn_icon btn_modify js_add_document_reservation_order_list">添加需求描述</a>
                        <a href="javascript:void(0)" class="btn_icon btn_check js_detail_document_reservation_order_list" style="display: none;"><span class="btn_wrap">查看需求描述</span></a>
                        <br>
                        <a href="javascript:void(0)" class="btn_icon btn_delete reservation_operate_btn deleteShoppingCart" onclick="del_goods('tbody<?php echo ($v["id"]); ?>')">删除</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="empty">
                    <div class="reservationOrders_inner" id="cartdemand<?php echo ($v["id"]); ?>"  style="display: none;">

                        <div style="display: none;" class="updateButton">
                            <a href="javascript:void(0)" class="js_update_document_reservation_order_list button btn_normal_important" data-platform="9" data-packtype="2" data-val="530694"><span class="btn_wrap">修改需求描述</span></a>
                            <a href="javascript:void(0)" class="shoppingcart_copy_document button btn_normal_important" data-val="530694">
                            <span class="btn_wrap">
                                <span class="shoppingcart_copy_document_text" title="其他“未填写需求描述”的账号均使用此内容">
                                    需求同步
                                </span>
                            </span>
                            </a>
                        </div>
                        <div class="js_document_or_requirement">
                            <div class="js_show_doc">
                                <div style="" class="createReservation_box">
    <p class="js_doc_require text_right">注<b class="color_high_light">*</b>为必填项</p>
    <table style="" class="documentTable">
        <tbody style="">
        <tr class="requireditem field_hidden">
            <th>
                <span>投放平台</span>
            </th>
            <td class="js_platformLabel">微信公众号</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="requireditem">
            <th>
                <span class="js_title">参考执行价<span class="reservation_document_title_colon">：</span></span>
            </th>
            <td colspan="2" class="goods-price"><em>¥</em><em id="goods_price<?php echo ($v['id']); ?>"><?php echo ($v['goods']['spec'][0]['price']); ?></em></td>
            <input type="hidden" name="goods<?php echo ($v['id']); ?>[goodsprice]" id="goodsprice<?php echo ($v['id']); ?>" value="<?php echo ($v['goods']['spec'][0]['price']); ?>" />
        </tr>
        <!--<tr class="requireditem">
            <th>
                <span class="js_title">合作形式<span class="reservation_document_title_colon">：</span></span>
            </th>
            <td>
                <?php if(is_array($v['goods']['hzid'])): foreach($v['goods']['hzid'] as $key=>$g): ?><label for="hzid<?php echo ($g['id']); ?>"><input value="<?php echo ($g["id"]); ?>" title="合作形式" name="goods<?php echo ($v['id']); ?>[hzid][]" id="hzid<?php echo ($g['id']); ?>" type="checkbox" /><?php echo ($g["hzname"]); ?></label><?php endforeach; endif; ?>
            </td>
            <td></td>
        </tr>-->
        <tr class="requireditem">
            <th>
                <span>发布位置</span>
            </th>
            <td>
                <?php if(is_array($v['goods']['spec'])): foreach($v['goods']['spec'] as $k=>$g): ?><label for="spec<?php echo ($g['id']); ?>"><input title="发布位置" <?php if($k == 0): ?>checked="checked"<?php endif; ?> value="<?php echo ($g["id"]); ?>" data-price="<?php echo ($g["price"]); ?>" id="spec<?php echo ($g['id']); ?>" name="goods<?php echo ($v['id']); ?>[spec]" type="radio" onchange="add_price(this,<?php echo ($v["id"]); ?>)" /><?php echo ($g["specname"]); ?></label><?php endforeach; endif; ?>
            </td>
            <td></td>
        </tr>
        <tr class="requireditem">
            <th>
                <span>推广时间</span>
            </th>
            <td>
                <input type="text" title="推广开始时间" class="get-time" name="goods<?php echo ($v["id"]); ?>[begin]" id="goods<?php echo ($v["id"]); ?>begin">
                <span>—</span>
                <input type="text" title="推广结束时间" class="get-time" name="goods<?php echo ($v["id"]); ?>[over]" id="goods<?php echo ($v["id"]); ?>over">
            </td>
            <td></td>
        </tr>
        <tr class="requireditem">
            <th>
                <span>反馈时间</span>
            </th>
            <td>
                <input type="text" title="反馈时间" class="get-time" name="goods<?php echo ($v["id"]); ?>[back]" id="goods<?php echo ($v["id"]); ?>back">
            </td>
            <td></td>
        </tr>
        <tr class="requireditem">
            <th scope="row" align="right" valign="top">
                <span class="js_title">需求描述</span>
            </th>
            <td style="" class="td_multi-line">
                <textarea name="goods<?php echo ($v['id']); ?>[content]" title="需求描述" class="require-text"></textarea>
                <p class="validateItem">
                    <label class="validateTips" for="">请详细描述您的需求,让名人/媒体知道您想让他干什么，越具体越好，请不要超过5000字</label>
                    <label class="validateLabel"></label>
                </p>
            </td>
            <td>
                <label class="validateIcon"></label>
            </td>
        </tr>
        <tr>
            <th>
                <span class="js_title" style="color:red;font-weight: bold">在这里上传图片</span>
            </th>
            <td colspan="2">
                <div class="js_uploadAttach">
                    <span style="color:#999!important;" class="max_upload_tips color_high_light font_size_small"><em>单文件最大20M，最多4个，格式为 gif，png，bmp，jpg，jpeg</em></span>
                </div>
                <div style="width:450px">
                    <input type="file" class="file-upload" name="goods<?php echo ($v['goodsid']); ?>[]" accept="image/gif,image/png,image/bmp,image/jpeg"  onchange="add_file(this)" />
                </div>
            </td>
        </tr>
        <tr>
            <th>
                <span class="js_title" style="color:red;font-weight: bold">在这里上传文档</span>
            </th>
            <td colspan="2">
                <div class="js_uploadAttach">
                    <span style="color:#999!important;" class="max_upload_tips color_high_light font_size_small"><em>单文件最大20M，最多4个，格式为 doc，docx，xlsx，pptx</em></span>
                </div>
                <div style="width:450px">
                    <input type="file" class="file-upload" name="goods<?php echo ($v['goodsid']); ?>[]" accept="image/gif,image/png,image/bmp,image/jpeg"  onchange="add_file(this)" />
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
                            </div>
                            <div class="js_buttons">
                                <div class="createReservationStep text_center">
                                    <a href="javascript:void(0)" onclick="demand_check(<?php echo ($v["id"]); ?>)" class="button btn_middle_important js_submit_button">
                                        <span class="btn_wrap">确定</span>
                                    </a>
                                </div>
                            </div>
                            <div class="create_reservation_box_bottom"></div>
                        </div>
                    </div>
                </td>
            </tr>
            <!--            <tr class="order_list_split"></tr>-->
            </tbody>
            <input type="hidden" name="goods<?php echo ($v["id"]); ?>[typeid]" value="<?php echo ($v["typeid"]); ?>" />
            <input type="hidden" name="goods<?php echo ($v["id"]); ?>[goodsid]" value="<?php echo ($v["goodsid"]); ?>" /><?php endforeach; endif; ?>
        </table>


        <div class="text_center creat_active_commit">
            <a href="<?php echo U('Home/Goods/goodslist',array('typeid'=>1));?>" class="button btn_large_common"><span class="btn_wrap">继续添加账号</span></a>
            <a href="javascript:void(0)" onclick="return_check()" class="button btn_large_important button_split active_submit cart_btn1"><span class="btn_wrap batchAddToOrder">提交</span></a>
        </div>
    </div>
</div>
    </form>
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
<!--页脚-->
<script type="text/javascript" src="/Application/Home/Public/js/laydate.dev.js"></script>
<script>
    <?php if(is_array($cart_goods)): foreach($cart_goods as $key=>$v): ?>laydate({
            elem: '#goods<?php echo ($v["id"]); ?>begin'
        });
        laydate({
            elem: '#goods<?php echo ($v["id"]); ?>over'
        });
        laydate({
            elem: '#goods<?php echo ($v["id"]); ?>back'
        });<?php endforeach; endif; ?>
</script>
</body>
</html>