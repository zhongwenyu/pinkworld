<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/css/common.css" />
    <script type="text/javascript" src="/Application/Admin/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Application/Admin/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Application/Admin/Public/layer/layer.js"></script>
    <script type="text/javascript" src="/Application/Admin/Public/js/style.js"></script>
    <script type="text/javascript" src="/Application/Admin/Public/js/common.js"></script>
    <script src="/Public/plugins/uploadify/uploadify.js" type="text/javascript"></script>
    <title>粉天下后台管理系统</title>
    <script type="text/javascript">
        //public地址
        $public="/Application/Admin/Public";
        //图片上传地址
        $uploadURL="<?php echo U('Admin/Uploadify/upload');?>";
    </script>
</head>
<body class="bg29">
<div class="nav-title nav-btn">
    <span class="glyphicon glyphicon-triangle-bottom navt-left"></span>
    <span class="navt-mid">商品管理</span>
    <span class="glyphicon glyphicon-cog navt-right"></span>
</div>
<ul class="nav-list">
    <li><a href="<?php echo U('Admin/Goods/weixin',array('typeid'=>1));?>" target="mainsection" class="nav-btn">微信公众号</a></li>
    <li><a href="<?php echo U('Admin/Goods/live',array('typeid'=>3));?>" target="mainsection" class="nav-btn">视频直播</a></li>
    <li><a href="<?php echo U('Admin/Goods/weibo',array('typeid'=>2));?>" target="mainsection" class="nav-btn">新浪微博</a></li>
    <li><a href="<?php echo U('Admin/Goods/goods_cat');?>" target="mainsection" class="nav-btn">商品分类</a></li>
    <li><a href="<?php echo U('Admin/Goods/goods_spec');?>" target="mainsection" class="nav-btn">商品属性</a></li>
    <li><a href="<?php echo U('Admin/Goods/goods_sign');?>" target="mainsection" class="nav-btn">商品下标</a></li>
    <!--<li><a href="<?php echo U('Admin/Goods/hzmode');?>" target="mainsection" class="nav-btn">合作方式</a></li>-->
</ul>
<div class="nav-title nav-btn">
    <span class="glyphicon glyphicon-triangle-bottom navt-left"></span>
    <span class="navt-mid">订单管理</span>
    <span class="glyphicon glyphicon-cog navt-right"></span>
</div>
<ul class="nav-list">
    <li><a href="<?php echo U('Admin/Order/orderlist',array('status'=>0,'pay'=>0));?>" target="mainsection" class="nav-btn">待支付订单</a></li>
    <li><a href="<?php echo U('Admin/Order/orderlist',array('status'=>0,'pay'=>1));?>" target="mainsection" class="nav-btn">待处理订单</a></li>
    <li><a href="<?php echo U('Admin/Order/orderlist',array('status'=>1,'pay'=>1));?>" target="mainsection" class="nav-btn">待执行订单</a></li>
    <li><a href="<?php echo U('Admin/Order/orderlist',array('status'=>2,'pay'=>1));?>" target="mainsection" class="nav-btn">已完成订单</a></li>
</ul>
<div class="nav-title nav-btn">
    <span class="glyphicon glyphicon-triangle-bottom navt-left"></span>
    <span class="navt-mid">会员管理</span>
    <span class="glyphicon glyphicon-cog navt-right"></span>
</div>
<ul class="nav-list">
    <li><a href="<?php echo U('Admin/Member/mblist');?>" target="mainsection" class="nav-btn">会员列表</a></li>
</ul>
<div class="nav-title nav-btn">
    <span class="glyphicon glyphicon-triangle-bottom navt-left"></span>
    <span class="navt-mid">新闻资讯</span>
    <span class="glyphicon glyphicon-cog navt-right"></span>
</div>
<ul class="nav-list">
    <li><a href="<?php echo U('Admin/Show/news',array('typeid'=>1));?>" target="mainsection" class="nav-btn">微博营销知识</a></li>
    <li><a href="<?php echo U('Admin/Show/news',array('typeid'=>2));?>" target="mainsection" class="nav-btn">常见问题</a></li>
    <li><a href="<?php echo U('Admin/Show/news',array('typeid'=>3));?>" target="mainsection" class="nav-btn">最新推荐</a></li>
</ul>
<div class="nav-title nav-btn">
    <span class="glyphicon glyphicon-triangle-bottom navt-left"></span>
    <span class="navt-mid">信息管理</span>
    <span class="glyphicon glyphicon-cog navt-right"></span>
</div>
<ul class="nav-list">
    <li><a href="<?php echo U('Admin/Manager/data');?>" target="mainsection" class="nav-btn">公司信息</a></li>
    <li><a href="<?php echo U('Admin/Show/bannerlist');?>" target="mainsection" class="nav-btn">首页广告</a></li>
</ul>
<div class="nav-title nav-btn">
    <span class="glyphicon glyphicon-triangle-bottom navt-left"></span>
    <span class="navt-mid">系统管理</span>
    <span class="glyphicon glyphicon-cog navt-right"></span>
</div>
<ul class="nav-list">
    <li><a href="<?php echo U('Admin/Manager/pwdchange');?>" target="mainsection" class="nav-btn">密码修改</a></li>
</ul>
</body>
</html>