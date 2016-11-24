<?php if (!defined('THINK_PATH')) exit(); if(empty($list)): ?><div class="content">
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