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
    <li class="tender_cur"><a>订单列表</a><b></b></li>
    <div class="clear"></div>
</ul>
<div class="order-table">
    <table>
        <?php if(empty($list)): ?><div class="order-empty">
                没有找到相关订单！
            </div><?php endif; ?>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tbody>
            <tr>
                <td colspan="5" class="ot-th">
                    <span class="spa-left">订单编号：<?php echo ($v["ordersn"]); ?></span>
                    <span class="spa-right">下单时间：<?php echo (date("Y-m-d",$v["addtime"])); ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$g): ?><div class="order-goods">
                            <img src="<?php echo ($g["pic"]); ?>" class="og-img" />
                            <div class="og-info">
                                <?php if($g['typeid'] == 1): ?><i class="og-icon iconweixin"></i>
                                    <?php elseif($g['typeid'] == 2): ?>
                                    <i class="og-icon iconweibo"></i>
                                    <?php elseif($g['typeid'] == 3): ?>
                                    <i class="og-icon iconlive"></i><?php endif; ?>
                                <span class="spa1"><?php echo ($g["name"]); ?></span>
                                <p class="p1"><?php echo ($goodsspec[$g['specid']]['specname']); ?></p>
                            </div>
                        </div><?php endforeach; endif; ?>
                </td>
                <td style="width:150px;text-align: center">￥<?php echo ($v["goodsprice"]); ?></td>
                <td style="width:120px;text-align: center">总数：<?php echo count($v['goods']);?></td>
                <td style="width:150px;text-align: center">
                    <?php if($v['status'] == 0): ?><span style="color:#f54016">待支付</span>
                        <?php elseif($v['status'] == 1): ?>
                        <span style="color:#1fd612">执行中</span>
                        <?php elseif($v['status'] == 2): ?>
                        <span style="color:#0777f5">已完成</span><?php endif; ?>
                </td>
                <td style="width:120px;text-align: center">
                    <?php if($v['status'] == 0): ?><a href="<?php echo U('Home/Cart/pay',array('orderid'=>$v['id']));?>" target="_blank" class="order-btn1">立即支付</a><?php endif; ?>
                    <?php if($v['isback'] == 1): ?><a href="javascript:show_demand('<?php echo ($v['feedback']); ?>')" target="_blank" class="order-btn1">查看反馈</a><?php endif; ?>
                </td>
            </tr>
            </tbody><?php endforeach; endif; ?>
    </table>
</div>
<script>
    function show_demand(str){
        layer.open({
            type: 1,
            title:"反馈信息",
            shade: 0,
            skin: 'layui-layer-rim', //加上边框
            area: ['800px', '400px'], //宽高
            content: "<div style='padding:10px'>"+str+"</div>"
        });
    }
</script>
</body>
</html>