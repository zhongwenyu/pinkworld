<?php if (!defined('THINK_PATH')) exit(); if(empty($cart)): ?><div class="shoppingCart_empty" id="js_empty_cart_div">
        <div class="shoppingCart_empty_main">
            <img src="/Application/Home/Public/images/shoppingCart_empty.png" class="main_img">
            <p>
                选号车内空空如也，<br>赶紧去挑选心仪的账号吧~
            </p>
        </div>
    </div>
    <?php else: ?>
    <div class="js_shoppingCart_list_wrap">
        <div id="wrapper" class="sc_dataList_wrap">
            <div id="scroller" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
                <ul class="shoppingCart_list" id="js_cart_list_ul">
                    <?php if(is_array($cart)): foreach($cart as $key=>$v): ?><li class="clearfix">
                            <div class="accountHeader text_center relative">
                                <img src="<?php echo ($v['goods']['pic']); ?>" class="accountHeader_avatar">
                                <?php if($v['typeid'] == 1): ?><img src="/Application/Home/Public/images/icon_s_weixin.png" class="shoppingCart_platform">
                                    <?php elseif($v['typeid'] == 2): ?>
                                    <img src="/Application/Home/Public/images/icon_s_sina.png" class="shoppingCart_platform">
                                    <?php elseif($v['typeid'] == 3): ?>
                                    <img src="/Application/Home/Public/images/icon_s_miaopai.png" class="shoppingCart_platform"><?php endif; ?>
                            </div>
                            <div class="accountWrap">
                                <div class="accountInner">
                                    <p class="accountNick"><?php echo ($v['goods']['name']); ?></p>
                                    <p class="color_light">
                                        <span class="accountName font_size_small">
                                            <?php if($v['typeid'] == 1): ?>微信号：<em title="saysayaa"><?php echo ($v['goods']['wechat']); ?></em>
                                                <?php else: ?>
                                                粉丝数：<em title="saysayaa"><?php echo ($v['goods']['fans']); ?></em><?php endif; ?>
                                        </span> <img class="fr shoppingCart_delete js_cart_delete" src="/Application/Home/Public/images/icon_del.png" onclick="del_cart(<?php echo ($v['id']); ?>,this)"></p>
                                </div>
                            </div>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="iScrollVerticalScrollbar iScrollLoneScrollbar" style="position: absolute; z-index: 9999; width: 7px; bottom: 2px; top: 2px; right: 1px; overflow: hidden; pointer-events: none;"><div class="iScrollIndicator" style="box-sizing: border-box; position: absolute; border: 1px solid rgba(255, 255, 255, 0.901961); border-radius: 3px; width: 100%; transition-duration: 0ms; display: none; height: 701px; transform: translate(0px, 0px) translateZ(0px); transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); background: rgba(0, 0, 0, 0.498039);"></div></div></div>
    </div><?php endif; ?>