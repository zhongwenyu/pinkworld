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
<body>
<div class="header">
    <div class="fl">
        <div class="hl-logo">
            <img src="/Application/Admin/Public/images/hllogo.png" />
            <p>粉天下后台管理</p>
        </div>
    </div>
    <div class="fr">
        <div class="fl pr">
            <div class="hl-btn hbtn btn-down">
                <span><?php echo ($admin_name); ?></span>
                <span class="glyphicon glyphicon-chevron-down pl5"></span>
            </div>
            <ul class="bd-ul">
                <li><a href="<?php echo U('Admin/lgout');?>" class="hbtn">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="nav-left idh">
    <iframe src="<?php echo U('Index/nav');?>" width="100%" height="100%" frameborder="0"></iframe>
</div>
<div class="section-right">
    <div class="srbox idh">
        <iframe src="" name="mainsection" width="100%" height="100%" frameborder="0"></iframe>
    </div>
</div>
</body>
</html>