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
<link rel="stylesheet" href="/Application/Home/Public/css/index.css" type="text/css">
<link href="/Application/Home/Public/css/pages.css" rel="stylesheet" type="text/css">
<link href="/Application/Home/Public/css/video-js.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Application/Home/Public/video/video.js"></script>
<script type="text/javascript" src="/Application/Home/Public/js/jquery.slides.min.js"></script>
<script>
    videojs.options.flash.swf = "/Application/Home/Public/video/video-js.swf";
    //结果回来前不重复提交
    var verifyback=1;

    $(document).ready(function(){
        $('#banner').slidesjs({
            width:815,
            height:327,
            navigation:{  //是否生成上一个下一个按钮
                active:false
            },
            play: {
                active: false,  //是否生成停止播放按钮
                auto: true,
                interval: 4000
            }
        });
    })
</script>
<style>
    .captcha_img{width:82px!important;height:36px}
    .bgf8{background: #f8f8f8;}
    .wrapper{width:1100px;margin:0 auto}
    .mainbox{width:100%;overflow: hidden;background: #fff}
    .mt20{margin-top: 20px}
    .id-footer{background: #fff;overflow: hidden;padding-bottom: 20px}
    .idf-left{float: left;width:550px;}
    .idf-logo{width:204px;height:72px}
    .idf-logo img{display: block;width:100%}
    .idf-title{color:#666;font-size: 16px;line-height: 1.7}
    .copyright{background: #222;width:100%;padding:10px 0;color:#999}
    .copyright .spa2{margin-left: 30px}
    .cpr-right{float: right;margin-right: 60px}
    .cpr-right img{width:20px;margin-left: 5px}

    .idf-right{float: right}
    .idf-about{float: left;padding-top: 25px}
    .idf-about dl{float: left;margin-right: 30px;color:#666}
    .idf-about dl dt{font-size: 15px;padding-bottom: 10px;font-weight:bold}
    .idf-about dl dd{font-size: 14px;padding-bottom: 5px}
    .idf-weixin{width:120px;height:120px;float: left;margin-top: 25px}
    .idf-weixin img{display: block;width:100%;height:100%}
    .id-tpTop{display: none;position: fixed;right:50px;bottom:90px;width:53px;height:55px;float: left;margin-left: 10px;background: url("/Application/Home/Public/images/toTop.png") no-repeat;margin-top: 90px}
    .change-code{display: block;}
</style>
<body class="bgf8">
<!--页面内容区start-->
<!--头部内容开始-->
<div class="mainbox">
    <div class="header clearfix">
        <div class="topInfo">
            <div class="content">
                <ul class="topInfo_content">
                    <li>自媒体数量：<span id="account_num">627518</span></li>
                    <li>平台数：<span>6</span></li>
                    <li class="topInfo_content_contact"><img src="/Application/Home/Public/images/top_info_show01_v2.jpg"></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <a href="http://www.ftx9.com" class="logo">
                <img src="/Application/Home/Public/images/logo_v2.jpg" width="400">
            </a>
        </div>
        <div class="nav clearfix">
            <div class="content">
                <ul id="nav">
                    <li class="iconMedia"><a target="_blank" href="/shipin">视频直播<span></span></a></li>
                    <li class="iconFamous"><a target="_blank" class="nav_current" href="/weixin">微信公众号<span></span></a></li>
                    <li class="iconGrassroots"><a target="_blank" href="/weibo">微博自媒体<span></span></a></li>
                    <li class="iconAbout"><a href="/aboutus">关于粉天下<span></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--头部内容结束--><!--主要内容开始-->
    <div class="loginBox">
        <div class="content">
            <div class="loginBox_show container">
                <div class="bannerHome_show bannerBoxContent" id="banner">
                    <?php if(is_array($banner)): foreach($banner as $key=>$v): ?><a href="<?php echo ($v["link"]); ?>"><img src="<?php echo ($v["url"]); ?>"></a><?php endforeach; endif; ?>
                </div>
                <div class="bannerHome_fixedContent">
                    <span class="bannerHome_tabLeft"></span>
                    <ul class="bannerBoxControl">
                        <li class="bannerHome_tabBtn"></li>
                        <li class="bannerHome_tabBtn bannerHome_tabCurrent"></li><li class="bannerHome_tabBtn"></li>                </ul>
                    <span class="bannerHome_tabRight"></span>
                </div>
            </div>
            <div class="loginContent">
                <ul class="loginContent_title">
                    <li class="platform_A"><a class="platform_current" id="login_tab_link1" href="<?php echo U('Home/User/regist');?>">广告主<span></span></a></li>
                </ul>
                <div class="clear"></div>

                <?php if($user): ?><div class="login_welcome" id="login_tab_content_true" style="">
                        <p><span id="loginUserName"><?php echo ($user["username"]); ?></span>，您好！</p>

                        <p><a href="<?php echo U('Home/User/index');?>" style="color:#5A91BA" id="loginUserUrl">我的粉天下</a><span>|</span>
                            <a href="<?php echo U('Home/Cart/cart');?>" style="color:#5A91BA">选号车</a><span>|</span>
                            <a href="<?php echo U('Home/User/lgout');?>" id="loginUserOut">退出</a></p>
                    </div>
                <?php else: ?>
                    <table class="loginContent_table" id="login_tab_content1">
                        <tbody><tr>
                            <th>用户名：</th>
                            <td>
                                <div class="loginContent_input">
                                    <input type="text" name="account" tabindex="1" id="username_qiye">
                                    <p class="errorMsgTips">
                                        <span>请输入用户名！</span>
                                        <a href="javascript:void(0);" tabindex="-1"></a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>密&nbsp;&nbsp;码：</th>
                            <td>
                                <div class="loginContent_input">
                                    <input type="password" name="password" tabindex="52" id="password_qiye" maxlength="22">
                                    <p class="errorMsgTips">
                                        <span>请输入密码！</span>
                                        <a href="javascript:void(0);" tabindex="-1"></a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>验证码：</th>
                            <td>
                                <div class="loginContent_input">
                                    <input class="loginContent_input_Captcha" tabindex="53" id="verify" name="verify" maxlength="4">
                                    <img src="<?php echo U('Home/User/verify');?>" id="verify_repeat" class="captcha_img" onclick="reloadimg();">
                                    <a href="javascript:void(0);" onclick="reloadimg();" class="change-code"></a>
                                    <p class="errorMsgTips">
                                        <span>请输入验证码！</span>
                                        <a href="javascript:void(0);" tabindex="-1"></a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <label><input name="save_bozhu" id="save_qiye" type="checkbox" value="">记住用户名</label>
                                <span class="login_border"></span>
                                <a href="" target="_blank">忘记密码</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a class="btnLogin01" href="javascript:void(0)" onclick="user_login()"></a>
                                <a class="btnLogin03" href="/regist" target="_blank"></a>
                            </td>
                        </tr>
                        </tbody>
                    </table><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="mainContent content">
        <div class="accountCotent clearfix">
            <div class="success_stories weixin-content">
                <div class="id-title">
                    <h2>
                        <div class="title-logo">
                            <i class="icon-weixin"></i>
                        </div>
                        <div class="title-font">
                            <span>微信自媒体</span>
                            <em>粉天下入驻10万优质公众号资源</em>
                        </div>
                    </h2>
                    <div class="tab-option">
                        <?php if(is_array($weixin)): foreach($weixin as $k=>$v): ?><a <?php if($k == 0): ?>class="active"<?php endif; ?> href="javascript:void(0)" onmouseover="show_cat('<?php echo ($v["typeid"]); ?>-<?php echo ($v["id"]); ?>',this)"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; ?>
                    </div>
                </div>
                <div class="accountCotent_left_list clearfix">
                    <?php if(is_array($weixin)): foreach($weixin as $k=>$v): ?><div id="<?php echo ($v["typeid"]); ?>-<?php echo ($v["id"]); ?>" <?php if($k == 0): ?>style="display: block"<?php else: ?>style="display: none"<?php endif; ?> class="accountCotent_left_content clearfix">
                            <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$g): ?><dl class="accountCotent_box">
                                    <dt class="account_head">
                                        <img width="120" src="<?php echo ($g["pic"]); ?>">
                                        <a href="/weixin/<?php echo ($g['id']); ?>.html" class="btn_viewPrice" target="_blank" href="">查看报价</a>
                                    </dt>
                                    <dd>
                                        <span title="<?php echo ($g["name"]); ?>" class="accountName"><a href="<?php echo U('Home/Goods/goods_detail',array('id'=>$g['id']));?>" target="_blank" href=""><b><?php echo ($g["name"]); ?></b></a></span>
                                        <span title="<?php echo ($g["instro"]); ?>" class="accountInfo"><?php echo ($g["instro"]); ?></span>
                                <span class="account_fansNum">
                                    <em>平均阅读量：</em>
                                    <b><?php echo ($g["reading"]); ?></b></span>
                                        <img class="account_platform" src="/Application/Home/Public/images/wechat01_v2.jpg">
                                    </dd>
                                </dl><?php endforeach; endif; ?>
                        </div><?php endforeach; endif; ?>
                </div>
                <p class="link_toView">
                    <a href="/weixin" target="_blank" class="view_more" href="">查看更多微信公众号</a>
                    <a target="_blank" class="icon_jump" href="">
                        <img src="/Application/Home/Public/images/icon_jump_to.jpg">
                    </a>
                </p>
            </div>
        <div class="success_stories">
            <div class="id-title">
                <h2>
                    <div class="title-logo">
                        <i class="icon-suitcase"></i>
                    </div>
                    <div class="title-font">
                        <span>经典案例</span>
                        <em>粉天下经典案例展示</em>
                    </div>
                </h2>
            </div>
            <h2 class="stories_category">时尚品牌
            <span class="link_toView">
            <a target="_blank" class="view_more" href="/weixin">查看更多案例</a>
                <a class="icon_jump" href="/weixin">
                    <img src="/Application/Home/Public/images/icon_jump_to.jpg">
                </a>
            </span>
            </h2>
            <div class="success_stories_list">
                <div class="success_stories_content">
                    <a class="success_stories_img" target="_blank" herf="/">
                        <img src="/Application/Home/Public/images/stories_beilian.jpg">
                    </a>
                    <div class="success_stories_info">
                        <table>
                            <thead>
                            <tr><td colspan="2">男神窦骁与北面一同让训练重回户外</td>
                            </tr></thead>
                            <tbody>
                            <tr>
                                <th valign="top"><img src="/Application/Home/Public/images/icon_light.jpg"></th>
                                <td><b>案例亮点：</b><br>通过对品牌活动代言人的八卦引到品牌活动，引导粉丝关注运动及户外，导流效果更明显。</td>
                            </tr>
                            <tr>
                                <th valign="top"><img src="/Application/Home/Public/images/icon_suit.jpg"></th>
                                <td><b>适合此玩法的产品：</b><br>时尚、女性、服装、影视娱乐等相关</td>
                            </tr>
                            <tr>
                                <th valign="top"><img src="/Application/Home/Public/images/icon_eg.jpg"></th>
                                <td><b>玩法举例：</b><br>@IF 《找男票还是得找窦骁这种》</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="success_stories_content">
                    <a class="success_stories_img" target="_blank" herf="/">
                        <img src="/Application/Home/Public/images/stories_laofoyebaihuo.jpg">
                    </a>
                    <div class="success_stories_info">
                        <table>
                            <thead>
                            <tr><td colspan="2">老佛爷百货“时尚疯”购物节优惠不停歇</td>
                            </tr></thead>
                            <tbody>
                            <tr>
                                <th valign="top"><img src="/Application/Home/Public/images/icon_light.jpg"></th>
                                <td><b>案例亮点：</b><br>利用时尚账号精准的女性粉丝，推送购物活动，硬广效果也精彩。</td>
                            </tr>
                            <tr>
                                <th valign="top"><img src="/Application/Home/Public/images/icon_suit.jpg"></th>
                                <td><b>适合此玩法的产品：</b><br>时尚、女装、快消、电商等</td>
                            </tr>
                            <tr>
                                <th valign="top"><img src="/Application/Home/Public/images/icon_eg.jpg"></th>
                                <td><b>玩法举例：</b><br>@LADYMAX 《一年一度老佛爷百货“时尚疯”购物节》</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="success_stories live-content">
            <div class="id-title relative">
                <h2>
                    <div class="title-logo">
                        <i class="icon-video-camera"></i>
                    </div>
                    <div class="title-font">
                        <span>直播平台自媒体</span>
                        <em>粉天下入驻1万+直播网红资源</em>
                    </div>
                    <a target="_blank" class="liveDay">
                        <img src="/Application/Home/Public/images/liveDay.gif" alt="">
                    </a>
                </h2>
                <div class="tab-option">
                    <?php if(is_array($live)): foreach($live as $k=>$v): ?><a <?php if($k == 0): ?>class="active"<?php endif; ?> href="javascript:void(0)" onmouseover="show_cat('<?php echo ($v["typeid"]); ?>-<?php echo ($v["id"]); ?>',this)"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="accountCotent_left_list">
                <!--网红&nbsp;直播-->
                <?php if(is_array($live)): foreach($live as $k=>$v): ?><div id="<?php echo ($v["typeid"]); ?>-<?php echo ($v["id"]); ?>" <?php if($k == 0): ?>style="display: block"<?php else: ?>style="display: none"<?php endif; ?> class="accountCotent_left_content clearfix">
                        <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$g): ?><dl class="accountCotent_box relative">
                                <dt class="account_head">
                                    <img width="120" src="<?php echo ($g["pic"]); ?>">
                                    <a href="/shipin/<?php echo ($g['id']); ?>.html" class="btn_viewPrice" target="_blank">查看报价</a>
                                </dt>
                                <dd>
                                    <span title="<?php echo ($g["name"]); ?>" class="accountName"><a target="_blank" href="<?php echo U('Home/Goods/goods_detail',array('type'=>3,'id'=>$v['id']));?>"><b><?php echo ($g["name"]); ?></b></a></span>
                                    <span title="<?php echo ($g["instro"]); ?>" class="accountInfo"><?php echo ($g["instro"]); ?></span>
                                <span class="account_fansNum">
                                    <em>平均播放量：</em><b><?php echo ($g["reading"]); ?></b>
                                </span>
                                    <img class="account_platform" src="/Application/Home/Public/images/live_video.jpg">
                                    <img class="platform_name" src="<?php echo ($platcat[$g['platcatid']]['img']); ?>" height="40">
                                </dd>
                            </dl><?php endforeach; endif; ?>
                    </div><?php endforeach; endif; ?>
            </div>
                <p class="seeMore_folkAccount"><a href="/shipin" target="_blank">查看更多媒体/自媒体<img src="/Application/Home/Public/images/icon_jump_to.jpg"></a></p>
            </div>
            <div class="success_stories">
                <div class="id-title">
                    <h2>
                        <div class="title-logo">
                            <i class="icon-suitcase"></i>
                        </div>
                        <div class="title-font">
                            <span>经典案例</span>
                            <em>粉天下经典案例展示</em>
                        </div>
                    </h2>
                </div>
                <h2 class="stories_category">
                    数码3C
            <span class="link_toView">
                <a target="_blank" class="view_more" href="/shipin">查看更多案例</a>
                <a target="_blank" class="icon_jump" href="/shipin">
                    <img src="/Application/Home/Public/images/icon_jump_to.jpg">
                </a>
            </span>
                </h2>
                <div class="success_stories_list">
                    <div class="success_stories_content">
                        <div class="success_stories_video">
                            <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="240" height="240" poster="/Application/Home/Public/video/video-post-1.jpg" data-setup="{}">
                                <source src="http://7xtanv.com2.z0.glb.clouddn.com/video/officialwebsite/20160423/h9rc1k2hdaw3.mp4" type='video/mp4' /><track kind="captions" src="/Application/Home/Public/video/demo.captions.vtt" srclang="en" label="English"></track><track kind="subtitles" src="/Application/Home/Public/video/demo.captions.vtt" srclang="en" label="English"></track>
                            </video>
                        </div>
                        <div class="success_stories_info">
                            <table>
                                <thead>
                                <tr><td colspan="2">春晚最萌机器人，画风突变污力十足</td>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_light.jpg"></th>
                                    <td><b>案例亮点：</b><br>机器人各种鬼畜表演，让大众多角度了解Alpha机器人</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_suit.jpg"></th>
                                    <td><b>适合此玩法的产品：</b><br>数码3C、电商、快消等</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_eg.jpg"></th>
                                    <td><b>玩法举例：</b><br>@外星逗逗 Alpha机器人</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="success_stories_content">
                        <div class="success_stories_video">
                            <video id="example_video_2" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="240" height="240" poster="/Application/Home/Public/video/video-post-2.jpg" data-setup="{}">
                                <source src="http://7xtanv.com2.z0.glb.clouddn.com/video/officialwebsite/20160423/saz10zm12hdu.mp4" type='video/mp4' /><track kind="captions" src="/Application/Home/Public/video/demo.captions.vtt" srclang="en" label="English"></track><track kind="subtitles" src="/Application/Home/Public/video/demo.captions.vtt" srclang="en" label="English"></track>
                            </video>
                        </div>
                        <div class="success_stories_info">
                            <table>
                                <thead>
                                <tr><td colspan="2">搞定女友神器，ulike蒸脸器为爱正名</td>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_light.jpg"></th>
                                    <td><b>案例亮点：</b><br>时尚达人幽默演绎如何搞定野蛮女友，引起粉丝热议和关注</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_suit.jpg"></th>
                                    <td><b>适合此玩法的产品：</b><br>数码3C、电商、快消、美妆等</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_eg.jpg"></th>
                                    <td><b>玩法举例：</b><br>@刘阳Cary ulike蒸脸器</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="success_stories weibo-content">
                    <div class="id-title">
                        <h2>
                            <div class="title-logo">
                                <i class="icon-weibo"></i>
                            </div>
                            <div class="title-font">
                                <span>微博自媒体</span>
                                <em>粉天下入驻10万+热门微博资源</em>
                            </div>
                        </h2>
                        <div class="tab-option">
                            <?php if(is_array($weibo)): foreach($weibo as $k=>$v): ?><a <?php if($k == 0): ?>class="active"<?php endif; ?> href="javascript:void(0)" onmouseover="show_cat('<?php echo ($v["typeid"]); ?>-<?php echo ($v["id"]); ?>',this)"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="accountCotent_left_list">
                        <?php if(is_array($weibo)): foreach($weibo as $k=>$v): ?><div id="<?php echo ($v["typeid"]); ?>-<?php echo ($v["id"]); ?>" <?php if($k == 0): ?>style="display: block"<?php else: ?>style="display: none"<?php endif; ?> class="accountCotent_left_content clearfix">
                            <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$g): ?><dl class="accountCotent_box">
                                    <dt class="account_head">
                                        <img width="120" src="<?php echo ($g["pic"]); ?>">
                                        <a href="/weibo/<?php echo ($g['id']); ?>.html" class="btn_viewPrice" target="_blank">查看报价</a>
                                    </dt>
                                    <dd>
                                        <span title="<?php echo ($g["name"]); ?>" class="accountName"><a target="_blank" href="<?php echo U('Home/Goods/goods_detail',array('type'=>2,'id'=>$g['id']));?>"><b><?php echo ($g["name"]); ?></b></a></span>
                                        <span title="<?php echo ($g["instro"]); ?>" class="accountInfo"><?php echo ($g["instro"]); ?></span>
                                        <span class="account_fansNum">粉丝数：<b><?php echo ($g["fans"]); ?></b></span>
                                        <img class="account_platform" src="/Application/Home/Public/images/sina01_v2.jpg">
                                    </dd>
                                </dl><?php endforeach; endif; ?>
                            </div><?php endforeach; endif; ?>
                    </div>
                    <p class="seeMore_folkAccount"><a href="/weibo" target="_blank">查看更多微博自媒体<img src="/Application/Home/Public/images/icon_jump_to.jpg"></a></p>
                </div>
            </div>

            <div class="success_stories">
                <div class="id-title">
                    <h2>
                        <div class="title-logo">
                            <i class="icon-suitcase"></i>
                        </div>
                        <div class="title-font">
                            <span>经典案例</span>
                            <em>粉天下经典案例展示</em>
                        </div>
                    </h2>
                </div>
                <h2 class="stories_category">热点活动
            <span class="link_toView">
            <a target="_blank" class="view_more" href="/weibo">查看更多案例</a>
                <a class="icon_jump" href="/weibo">
                    <img src="/Application/Home/Public/images/icon_jump_to.jpg">
                </a>
            </span>
                </h2>
                <div class="success_stories_list">
                    <div class="success_stories_content">
                        <a class="success_stories_img" target="_blank" herf="/">
                            <img src="/Application/Home/Public/images/stories_weipinhui.jpg">
                        </a>
                        <div class="success_stories_info">
                            <table>
                                <thead>
                                <tr><td colspan="2">唯品会特卖也时尚，名人带动购物新潮流</td>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_light.jpg"></th>
                                    <td><b>案例亮点：</b><br>明星、行业评论人、草根大号各路大V体验唯品会特卖活动，微博扩散带动粉丝消费，完美塑造品牌。</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_suit.jpg"></th>
                                    <td><b>适合此玩法的产品：</b><br>各种活动、产品、服务等</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_eg.jpg"></th>
                                    <td><b>玩法举例：</b><br>@唯品会 ：名证言顺——唯品会品牌传播案例</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="success_stories_content">
                        <a class="success_stories_img" target="_blank" herf="/">
                            <img src="/Application/Home/Public/images/stories_baiwanyasewang.jpg">
                        </a>
                        <div class="success_stories_info">
                            <table>
                                <thead>
                                <tr><td colspan="2">百万亚瑟王 借力微博玩转不一样的游戏公测</td>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_light.jpg"></th>
                                    <td><b>案例亮点：</b><br>精准选择受众，通过名人、二次元、游戏大V账号，利用粉丝的强互动关系，引导用户进行游戏下载和体验</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_suit.jpg"></th>
                                    <td><b>适合此玩法的产品：</b><br>各种活动、产品、服务等</td>
                                </tr>
                                <tr>
                                    <th valign="top"><img src="/Application/Home/Public/images/icon_eg.jpg"></th>
                                    <td><b>玩法举例：</b><br>@百万亚瑟王：百万亚瑟王上线公测微博营销案例</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="platformAccount_user_channel">
            <h2 class="platformAccount_title">
                <b>渠道客户</b>
                <em>2000家公关/广告公司的选择</em>
            </h2>
            <table class="platformAccount_user_list" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td>
                        <div>
                            <a class="platformAccount_user_link" href="javascript:void(0)">
                                <img src="/Application/Home/Public/images/logo_platformaccount_user01.jpg">
                                <span>际恒集团</span>
                            </a>
                        </div>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user02.jpg">
                            <span>博拉数字营销</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user03.jpg">
                            <span>蓝色光标</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user04.jpg">
                            <span>罗德公关</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user05_v1.jpg">
                            <span>普纳公关</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user06.jpg">
                            <span>网迈</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user07.jpg">
                            <span>好耶</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user08_v1.jpg">
                            <span>电通</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user09_v1.jpg">
                            <span>口碑互联</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user10_v1.jpg">
                            <span>宣亚</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user11.jpg">
                            <span>斯恩克广告</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user12.jpg">
                            <span>博雅公关</span>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="platformAccount_user_brand">
            <h2 class="platformAccount_title">
                <b>品牌客户</b>
                <em>100家大品牌客户的选择</em>
            </h2>
            <table class="platformAccount_user_list" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user13.jpg">
                            <span>百度</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user14_v1.jpg">
                            <span>京东商城</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user15.jpg">
                            <span>联想</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user16.jpg">
                            <span>惠普</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user17.jpg">
                            <span>优酷</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user18.jpg">
                            <span>艺龙</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user19.jpg">
                            <span>盛大游戏</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user20.jpg">
                            <span>完美世界</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user21_v2.jpg">
                            <span>微视</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user22.jpg">
                            <span>唯品会</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user23.jpg">
                            <span>58同城</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user24.jpg">
                            <span>去哪网</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user25.jpg">
                            <span>VIDA</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user26.jpg">
                            <span>陌陌</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user27.jpg">
                            <span>中信银行</span>
                        </a>
                    </td>
                    <td>
                        <a class="platformAccount_user_link" href="javascript:void(0)">
                            <img src="/Application/Home/Public/images/logo_platformaccount_user28.jpg">
                            <span>美团</span>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="clear"></div>
    </div>
    <!--主要内容结束-->
    <!--新闻资讯-->
    <div class="xinwen">
        <h1 class="xwh1">相关最新资讯</h1>
        <ul>
            <li>
                <dl>
                    <dt><h3>微博营销知识</h3><i><a>更多</a></i></dt>
                    <?php if(is_array($news1)): foreach($news1 as $k=>$v): if($k == 0): ?><dd class="xinwen_c">
                                <a href="/news/<?php echo ($v['id']); ?>.html" target="_blank">
                                    <img src="<?php echo ($v["recopic"]); ?>" alt="<?php echo ($v["newstitle"]); ?>" width="150" height="90">
                                    <h4><?php echo ($v["newstitle"]); ?></h4>
                                </a>
                                <p><?php echo ($v["instro"]); ?></p>
                            </dd>
                            <?php else: ?>
                            <dd>
                                <a href="/news/<?php echo ($v['id']); ?>.html" target="_blank"><?php echo ($v["newstitle"]); ?></a>
                                <i><b></b><?php echo (date("y/m/d",$v["addtime"])); ?></i>
                            </dd><?php endif; endforeach; endif; ?>
                </dl>
            </li>
            <li class="xinwen_b">
                <dl>
                    <dt><h3>常见问题</h3><i><a>更多</a></i></dt>
                    <?php if(is_array($news2)): foreach($news2 as $k=>$v): if($k == 0): ?><dd class="xinwen_c">
                                <a href="/news/<?php echo ($v['id']); ?>.html" target="_blank">
                                    <img src="<?php echo ($v["recopic"]); ?>" alt="<?php echo ($v["newstitle"]); ?>" width="150" height="90">
                                    <h4><?php echo ($v["newstitle"]); ?></h4>
                                </a>
                                <p><?php echo ($v["instro"]); ?></p>
                            </dd>
                            <?php else: ?>
                            <dd>
                                <a href="/news/<?php echo ($v['id']); ?>.html" target="_blank"><?php echo ($v["newstitle"]); ?></a>
                                <i><b></b><?php echo (date("y/m/d",$v["addtime"])); ?></i>
                            </dd><?php endif; endforeach; endif; ?>
                </dl>
            </li>
            <li>
                <dl>
                    <dt><h3>最新推荐</h3><i><a>更多</a></i></dt>
                    <?php if(is_array($news3)): foreach($news3 as $k=>$v): if($k == 0): ?><dd class="xinwen_c">
                                <a href="/news/<?php echo ($v['id']); ?>.html" target="_blank">
                                    <img src="<?php echo ($v["recopic"]); ?>" alt="<?php echo ($v["newstitle"]); ?>" width="150" height="90">
                                    <h4><?php echo ($v["newstitle"]); ?></h4>
                                </a>
                                <p><?php echo ($v["instro"]); ?></p>
                            </dd>
                            <?php else: ?>
                            <dd>
                                <a href="/news/<?php echo ($v['id']); ?>.html" target="_blank"><?php echo ($v["newstitle"]); ?></a>
                                <i><b></b><?php echo (date("y/m/d",$v["addtime"])); ?></i>
                            </dd><?php endif; endforeach; endif; ?>
                </dl>
            </li>
        </ul>
    </div>
</div>
<!--新闻资讯-->
<!--关于我们-->
<div class="mainbox mt20">
    <div class="wrapper id-footer">
        <div class="idf-left">
            <div class="idf-logo"><img src="/Application/Home/Public/images/footer-logo.png" /></div>
            <p class="idf-title">
                粉天下—社交自媒体广告平台，为您提供社会化的媒体营销、社交媒体意见领袖、精准广告投放等服务！想了解更多微博营销推广、微信营销推广等信息，请到粉天下—社交自媒体广告平台！丰富媒体资源、精准广告投放！
            </p>
        </div>
        <div class="idf-right">
            <div class="idf-about">
                <dl>
                    <dt>关于我们</dt>
                    <dd>合作联系</dd>
                    <dd>人才招聘</dd>
                    <dd>合作</dd>
                    <dd>其它</dd>
                </dl>
                <!--<dl>
                    <dt>网站声明</dt>
                    <dd>版权声明</dd>
                    <dd>免责声明</dd>
                    <dd>安全提醒</dd>
                    <dd>产品简介</dd>
                </dl>-->
            </div>
            <div class="idf-weixin">
                <img src="/Application/Home/Public/images/weixin.jpg" />
            </div>
            <div class="id-tpTop" id="gotop" onclick="goTop()" style="cursor: pointer"></div>
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
<!--关于我们-->
</body>
</html>