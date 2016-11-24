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
<div class="login_screen login_logo">
    <div class="content">
        <a href="http://www.ftx9.com" class="logo">
            <img src="/Application/Home/Public/images/logo_v2.jpg" width="400">
        </a>
    </div>
</div>
<script>
    $(document).ready(function(){
        var h = $(window).height()-165;
        $("#container").css("min-height",h);
    });
    /*alert($(window).height());*/
</script>
<div class="container" id="container">
    <!--主题部分开始-->
    <div class="content findPassword_wrap" style="margin-bottom:0!important;">
        <p class="fr login_txt">如果您已注册账号，请<a href="http://www.ftx9.com">直接登录</a></p>
        <form id="form1" name="form1" method="post" action="" class="registerForm_first">
            <input type="hidden" name="spm" value="">
            <table cellpadding="0" cellspacing="0" width="100%" class="creat_active_box registerTable">
                <tbody><tr>
                    <th align="right"><span class="color_high_light">*</span><span>用户名：</span></th>
                    <td>
                        <input type="text" class="inputTxt" value="" id="account" name="account">
                        <span class="text_danger"></span>
                        <p class="p1" id="username_show">6-16个字符（小写字母、数字），必须以小写字母开头</p>
                        <p class="p2 error_show" style="display:none">请输入用户名</p>
                    </td>
                </tr>
                <tr>
                    <th align="right"><span class="color_high_light">*</span><span>密码：</span></th>
                    <td><input type="password" class="inputTxt password" value="" id="password" name="password">
                        <span class="text_danger"></span>
                        <p class="p1">密码由9-16位字母和数字组成，字母区分大小写</p>
                        <p class="p2 error_show" style="display:none">请输入密码</p>
                    </td>
                </tr>
                <tr>
                    <th align="right"><span class="color_high_light">*</span><span>重复密码：</span></th>
                    <td><input type="password" class="inputTxt password" value="" id="repassword" name="repassword">
                        <span class="text_danger"></span>
                        <p class="p1">请再输入一遍密码</p>
                        <p class="p2 error_show" style="display:none">两次密码输入不一致</p>
                    </td>
                </tr>
                <tr>
                    <th width="32%"><span class="color_high_light">*</span><span>姓名：</span></th>
                    <td>
                        <input type="text" class="inputTxt" value="" id="username" name="username">
                        <span class="text_danger"></span>
                        <p class="p1">可输入4-22个字符，包括英文，中文</p>
                        <p class="p2 error_show" style="display:none">请输入姓名</p>
                    </td>
                </tr>
                <tr>
                    <th><span class="color_high_light">*</span><span>手机号：</span></th>
                    <td><input type="text" class="inputTxt" value="" id="phone" name="phone">
                        <span class="text_danger"></span>
                        <p class="p1">请输入联系电话</p>
                        <p class="p2 error_show" style="display:none">请输入联系电话</p>
                    </td>
                </tr>
                <tr>
                    <th><span class="color_high_light">*</span><span>邮箱：</span></th>
                    <td><input type="text" class="inputTxt" value="" id="email" name="email">
                        <span class="text_danger"></span>
                        <p class="p1">请输入邮箱</p>
                        <p class="p2 error_show" style="display:none">请输入邮箱</p>
                    </td>
                </tr>
                <tr>
                    <th><span class="color_high_light">*</span><span>验证码：</span></th>
                    <td>
                        <input type="text" class="inputTxt input_captcha" maxlength="4" value="" name="verify">
                        <img src="<?php echo U('Home/User/verify');?>" class="captcha" id="verify_repeat" onclick="reloadimg();">
                        <a href="javascript:void(0);" onclick="reloadimg();" class="change_another">看不清，换一张</a>
                        <p class="p1"></p>
                        <p class="p2 error_show" style="display:none">请输入验证码</p>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="checkbox" id="receive" name="receive" checked="checked">
                        <label for="receive">我已阅读并同意相关 <a class="js_change_cap" target="_black" href="<?php echo U('Home/User/rule');?>">《服务条款》</a></label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p>&nbsp;</p>
                        <a href="javascript:void(0)" onclick="submit_check()" class="button btn_large_important"><span class="btn_wrap">&nbsp;&nbsp;提交&nbsp;&nbsp;</span></a>
                        &nbsp; &nbsp;&nbsp;
                        <input type="reset" value="重新填写" class="reset_button" id="reset">
                    </td>
                </tr>
                </tbody></table>
        </form>
    </div>
    <!--页脚-->
</div><style>
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
<script>
    $(function(){
        $(".inputTxt").blur(function(){
            if($(this).val() == ""){
                $(this).siblings(".error_show").show();
            }else{
                $(this).siblings(".error_show").hide();
            }
        })
    });

    //结果回来前不重复提交
    var verifyback=1;
    function submit_check(){
        if(form1.account.value=="")
        {
            layer.msg("请输入您的姓名！");
            $("input[name=account]").focus();
            return false;
        }else if(form1.password.value =="")
        {
            layer.msg("请输入密码！");
            $("input[name=password]").focus();
            return false;
        }else if(form1.repassword.value != form1.password.value)
        {
            layer.msg("两次密码输入不一致！");
            $("input[name=repassword]").focus();
            return false;
        }else if(form1.username.value =="")
        {
            layer.msg("请输入姓名！");
            $("input[name=username]").focus();
            return false;
        }else if(form1.phone.value =="")
        {
            layer.msg("请输入电话！");
            $("input[name=phone]").focus();
            return false;
        }else if(form1.email.value =="")
        {
            layer.msg("请输入邮箱！");
            $("input[name=email]").focus();
            return false;
        }else if(form1.verify.value =="")
        {
            layer.msg("请输入邮箱！");
            $("input[name=verify]").focus();
            return false;
        }else if(!$("input[name=receive]").is(':checked') )
        {
            layer.msg("您还没有同意服务条款！");
            return false;
        }

        regist();
    }


</script>
</body>
</html>