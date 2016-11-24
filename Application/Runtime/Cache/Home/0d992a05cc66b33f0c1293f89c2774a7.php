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
    <li class="tender_cur"><a>资料编辑</a><b></b></li>
    <div class="clear"></div>
</ul>
<form action="<?php echo U('Home/User/useredit');?>" id="form1" method="post" onsubmit="return false;">
    <div class="user-form">
        <div class="uf-mod">
            <span class="spa1">姓名：</span>
            <input type="text" name="username" value="<?php echo ($user["username"]); ?>" />
        </div>
        <div class="uf-mod">
            <span class="spa1">手机：</span>
            <input type="text" name="phone" value="<?php echo ($user["phone"]); ?>" />
        </div>
        <div class="uf-mod">
            <span class="spa1">邮箱：</span>
            <input type="text" name="email" value="<?php echo ($user["email"]); ?>" />
        </div>
        <div class="uf-mod" style="padding-top: 15px">
            <a href="javascript:void(0)" class="uf-sub" onclick="ajax_add('form1','<?php echo U('Home/user/useredit');?>')">保存</a>
        </div>
    </div>
</form>
</body>
</html>