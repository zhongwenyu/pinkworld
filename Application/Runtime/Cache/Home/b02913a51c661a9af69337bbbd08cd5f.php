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
<div style="width:100%;text-align: center;overflow: hidden"><?php echo ($page); ?></div>