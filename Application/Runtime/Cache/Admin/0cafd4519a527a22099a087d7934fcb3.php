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
<!--以下是在线编辑器 代码 -->
<script type="text/javascript">
    /*
     * 在线编辑器相 关配置 js
     *  参考 地址 http://fex.baidu.com/ueditor/
     */
    window.UEDITOR_Admin_URL = "/Public/plugins/Ueditor/";
    var URL_upload = "<?php echo ($URL_upload); ?>";  //图片上传配置
    var URL_fileUp = "<?php echo ($URL_fileUp); ?>";
    var URL_scrawlUp = "<?php echo ($URL_scrawlUp); ?>";
    var URL_getRemoteImage = "<?php echo ($URL_getRemoteImage); ?>";
    var URL_imageManager = "<?php echo ($URL_imageManager); ?>";
    var URL_imageUp = "<?php echo ($URL_imageUp); ?>";
    var URL_getMovie = "<?php echo ($URL_getMovie); ?>";
    var URL_home = "<?php echo ($URL_home); ?>";
</script>
<script type="text/javascript" charset="utf-8" src="/Public/plugins/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/plugins/Ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/plugins/Ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">

    var editor;
    $(function () {
        //具体参数配置在  editor_config.js  中
        var options = {
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 400, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign'
            , //允许的最大字符数 'fullscreen',
            pasteplain: true, autoHeightEnabled: true,
            autotypeset: {
                mergeEmptyline: true,        //合并空行
                removeClass: true,           //去掉冗余的class
                removeEmptyline: false,      //去掉空行
                textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
                imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
                pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
                clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
                clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
                removeEmptyNode: false,      // 去掉空节点
                                             //可以去掉的标签
                removeTagNames: {"font": 1},
                indent: false,               // 行首缩进
                indentValue: '0em'           //行首缩进的大小
            },
            toolbars: [
                ['fullscreen', 'source', '|', 'undo', 'redo',
                    '|', 'bold', 'italic', 'underline', 'fontborder',
                    'strikethrough', 'superscript', 'subscript',
                    'removeformat', 'formatmatch', 'autotypeset',
                    'blockquote', 'pasteplain', '|', 'forecolor',
                    'backcolor', 'insertorderedlist',
                    'insertunorderedlist', 'selectall', 'cleardoc', '|',
                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                    'customstyle', 'paragraph', 'fontfamily', 'fontsize',
                    '|', 'directionalityltr', 'directionalityrtl',
                    'indent', '|', 'justifyleft', 'justifycenter',
                    'justifyright', 'justifyjustify', '|', 'touppercase',
                    'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
                    'imagenone', 'imageleft', 'imageright', 'imagecenter',
                    '|', 'insertimage', 'emotion', 'insertvideo',
                    'attachment', 'map', 'gmap', 'insertframe',
                    'insertcode', 'webapp', 'pagebreak', 'template',
                    'background', '|', 'horizontal', 'date', 'time',
                    'spechars', 'wordimage', '|',
                    'inserttable', 'deletetable',
                    'insertparagraphbeforetable', 'insertrow', 'deleterow',
                    'insertcol', 'deletecol', 'mergecells', 'mergeright',
                    'mergedown', 'splittocells', 'splittorows',
                    'splittocols', '|', 'print', 'preview', 'searchreplace']
            ]
        };
        editor = new UE.ui.Editor(options);
        editor.render("goods_content");  //  指定 textarea 的  id 为 goods_content

    });
</script>
<!--以上是在线编辑器 代码  end-->
<body>
<div class="mod-box">
    <div class="mod-title">
        <h5>
            <?php if($action == 'add'): ?>新增微博
                <?php else: ?>编辑微博<?php endif; ?>
        </h5>
    </div>
    <div class="mod-form pb50">
        <form action="" method="post" id="form1">
            <div class="mform-box form-group">
                <label for="name" class="mform-lab">微博名：</label>
                <input type="text" class="form-control mform-inp1" name="name" id="name" value="<?php echo ($goods["name"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label for="updatenum" class="mform-lab">更新次数：</label>
                <input type="text" class="form-control mform-inp1" name="updatenum" id="updatenum" value="<?php echo ($goods["updatenum"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label for="ischecked" class="mform-lab">被选次数：</label>
                <input type="text" class="form-control mform-inp1" name="ischecked" id="ischecked" value="<?php echo ($goods["ischecked"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label for="keytitle" class="mform-lab">微博链接：</label>
                <input type="text" class="form-control mform-inp1" name="link" id="link" value="<?php echo ($goods["link"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label for="keytitle" class="mform-lab">商品标题：</label>
                <input type="text" class="form-control mform-inp1" name="keytitle" id="keytitle" value="<?php echo ($goods["keytitle"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label for="keyword" class="mform-lab">商品关键词：</label>
                <input type="text" class="form-control mform-inp1" name="keyword" id="keyword" value="<?php echo ($goods["keyword"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label for="keyinfo" class="mform-lab">关键词描述：</label>
                <input type="text" class="form-control mform-inp1" name="keyinfo" id="keyinfo" value="<?php echo ($goods["keyinfo"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">关键词图片：</label>
                <input type="text" class="form-control mform-inp1 original_img3" name="keyimg" value="<?php echo ($goods["keyimg"]); ?>" />
                <a href="javascript:void(0)" onclick="GetUploadify('weixin','frm2','1','4MB','call_back','original_img3')" class="btn btn-default mod-btn">上传</a>
                <a href="javascript:void(0)" onclick="del_upimg('original_img3',this)" class="btn btn-default mod-btn del-img">删除</a>
                <div class="form-view">
                    <?php if(empty($goods)): ?><img src="/Application/Admin/Public/images/pic-moren.jpg" class="original_img3" />
                        <?php else: ?>
                        <img src="<?php echo ($goods["keyimg"]); ?>" class="original_img3" /><?php endif; ?>
                </div>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">所属分类：</label>
                <div class="mform-addnew">
                    <?php if(is_array($goodscat)): foreach($goodscat as $key=>$v): ?><input type="checkbox" name="cat[]" id="cat<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>" class="form-check form-cbox3" <?php if(!empty($goods)): if(in_array(($v['id']), is_array($goods['catid'])?$goods['catid']:explode(',',$goods['catid']))): ?>checked<?php endif; endif; ?> />
                        <label for="cat<?php echo ($v["id"]); ?>" class="btn btn-default"><?php echo ($v["catname"]); ?></label><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">添加属性：</label>
                <div class="mform-addnew">
                    <?php if(empty($goods)): if(is_array($goodsspec)): foreach($goodsspec as $key=>$v): ?><div class="mfad-mod">
                                <input type="checkbox" name="spec[]" id="gho<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>" class="form-check form-cbox2" onclick="inp_check(this,0)" />
                                <label for="gho<?php echo ($v["id"]); ?>" class="btn btn-default"><?php echo ($v["specname"]); ?></label>
                            </div><?php endforeach; endif; ?>
                        <?php else: ?>
                        <?php if(is_array($goodsspec)): foreach($goodsspec as $key=>$v): ?><div class="mfad-mod">
                                <input type="checkbox" name="spec[]" id="gho<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>" class="form-check form-cbox2" onclick="inp_check(this,0)" <?php if($specprice[$v['id']]): ?>checked<?php endif; ?> />
                                <label for="gho<?php echo ($v["id"]); ?>" class="btn btn-default"><?php echo ($v["specname"]); ?></label>
                                <?php if($specprice[$v['id']]): ?><input type="text" name="price[]" value="<?php echo ($specprice[$v['id']]['price']); ?>" class="form-control mform-inp2 mr10" placeholder="报价"><?php endif; ?>
                            </div><?php endforeach; endif; endif; ?>
                </div>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">添加下标：</label>
                <div class="mform-addnew">
                    <?php if(is_array($goodssign)): foreach($goodssign as $key=>$v): ?><input type="checkbox" name="sign[]" id="sign<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>" class="form-check form-cbox3" <?php if(in_array(($v['id']), is_array($goods['sign'])?$goods['sign']:explode(',',$goods['sign']))): ?>checked<?php endif; ?>  />
                        <label for="sign<?php echo ($v["id"]); ?>" class="btn btn-default"><?php echo ($v["signname"]); ?></label><?php endforeach; endif; ?>
                </div>
            </div>
            <!--<div class="mform-box form-group">
                <label class="mform-lab">合作方式：</label>
                <div class="mform-addnew">
                    <?php if(is_array($hzmode)): foreach($hzmode as $key=>$v): ?><input type="checkbox" name="hzid[]" id="hzid<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>" class="form-check form-cbox3" <?php if(in_array(($v['id']), is_array($goods['hzid'])?$goods['hzid']:explode(',',$goods['hzid']))): ?>checked<?php endif; ?>  />
                        <label for="hzid<?php echo ($v["id"]); ?>" class="btn btn-default"><?php echo ($v["hzname"]); ?></label><?php endforeach; endif; ?>
                </div>
            </div>-->
            <div class="mform-box form-group">
                <label for="instro" class="mform-lab">添加简介：</label>
                <textarea id="instro" name="instro" class="form-control mform-inp3"><?php echo ($goods["instro"]); ?></textarea>
            </div>
            <div class="mform-box form-group">
                <label for="fans" class="mform-lab">粉丝数：</label>
                <input type="text" class="form-control mform-inp1" name="fans" id="fans" value="<?php echo ($goods["fans"]); ?>" />
				<span style="display:block;float:left;height:35px;line-height:35px;margin-left:10px">万</span>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">性别：</label>
                <input type="radio" name="sex" id="isman" class="form-check form-cbox1" value="1" <?php if(empty($goods)): ?>checked<?php else: if($goods['sex'] == 0): ?>checked<?php endif; endif; ?> />
                <label for="isman" class="btn btn-default">男</label>
                <input type="radio" name="sex" id="iswoman" class="form-check form-cbox1" value="0" <?php if(!empty($goods)): if($goods['sex'] == 1): ?>checked<?php endif; endif; ?> />
                <label for="iswoman" class="btn btn-default">女</label>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">头像：</label>
                <input type="text" class="form-control mform-inp1 original_img1" name="pic" value="<?php echo ($goods["pic"]); ?>" />
                <a href="javascript:void(0)" onclick="GetUploadify('weixin','frm2','1','4MB','call_back','original_img1')" class="btn btn-default mod-btn">上传</a>
                <a href="javascript:void(0)" onclick="del_upimg('original_img1',this)" class="btn btn-default mod-btn del-img">删除</a>
                <div class="form-view">
                    <?php if(empty($goods)): ?><img src="/Application/Admin/Public/images/pic-moren.jpg" class="original_img1" />
                        <?php else: ?>
                        <img src="<?php echo ($goods["pic"]); ?>" class="original_img1" /><?php endif; ?>
                </div>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">是否微博认证：</label>
                <input type="radio" name="isrz" id="isrz" class="form-check form-cbox1" value="1" <?php if(empty($goods)): ?>checked<?php else: if($goods['isrz'] == 1): ?>checked<?php endif; endif; ?> />
                <label for="isrz" class="btn btn-default">是</label>
                <input type="radio" name="isrz" id="norz" class="form-check form-cbox1" value="0" <?php if(!empty($goods)): if($goods['isrz'] == 0): ?>checked<?php endif; endif; ?> />
                <label for="norz" class="btn btn-default">否</label>
            </div>
            <div class="mform-box form-group">
                <label for="certify" class="mform-lab">认证信息：</label>
                <input type="text" class="form-control mform-inp1" name="certify" id="certify" value="<?php echo ($goods["certify"]); ?>" />
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">是否显示：</label>
                <input type="radio" name="isshow" id="isshow" class="form-check form-cbox1" value="1" <?php if(empty($goods)): ?>checked<?php else: if($goods['isshow'] == 1): ?>checked<?php endif; endif; ?> />
                <label for="isshow" class="btn btn-default">是</label>
                <input type="radio" name="isshow" id="noshow" class="form-check form-cbox1" value="0" <?php if(!empty($goods)): if($goods['isshow'] == 0): ?>checked<?php endif; endif; ?> />
                <label for="noshow" class="btn btn-default">否</label>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">是否需要预约：</label>
                <input type="radio" name="isyy" id="isyy" class="form-check form-cbox1" value="1" <?php if(empty($goods)): ?>checked<?php else: if($goods['isyy'] == 1): ?>checked<?php endif; endif; ?> />
                <label for="isyy" class="btn btn-default">是</label>
                <input type="radio" name="isyy" id="noyy" class="form-check form-cbox1" value="0" <?php if(!empty($goods)): if($goods['isyy'] == 0): ?>checked<?php endif; endif; ?> />
                <label for="noyy" class="btn btn-default">否</label>
            </div>
            <div class="mform-box form-group">
                <label class="mform-lab">主要粉丝性别：</label>
                <input type="radio" name="fansex" id="notsex" class="form-check form-cbox1" value="1" <?php if(empty($goods)): ?>checked<?php else: if($goods['fansex'] == 0): ?>checked<?php endif; endif; ?> />
                <label for="notsex" class="btn btn-default">无</label>
                <input type="radio" name="fansex" id="man" class="form-check form-cbox1" value="0" <?php if(!empty($goods)): if($goods['fansex'] == 1): ?>checked<?php endif; endif; ?> />
                <label for="man" class="btn btn-default">男</label>
                <input type="radio" name="fansex" id="woman" class="form-check form-cbox1" value="0" <?php if(!empty($goods)): if($goods['fansex'] == 2): ?>checked<?php endif; endif; ?> />
                <label for="woman" class="btn btn-default">女</label>
            </div>
            <div class="mform-box form-group">
                <label for="contents" class="mform-lab">详情描述：</label>
                <div class="form-text">
                    <textarea id="goods_content" name="contents" title=""><?php if(!empty($goods)): echo ($goods["contents"]); endif; ?></textarea>
                </div>
            </div>
            <div class="mform-box">
                <input type="hidden" name="action" value="<?php echo ($action); ?>" />
                <input type="hidden" name="goodsid" value="<?php echo ($goodsid); ?>" />
                <input type="button" onclick="ajax_add('form1','<?php echo U('Admin/Goods/add_weibo');?>')" class="btn btn-primary mform-sub" value="保存" />
            </div>
        </form>
    </div>
</div>
</body>
<script>
    /*
     * 图片上传回调函数
     */
    function call_back(url,classname){
        $("input."+classname).val(url).siblings(".del-img").show();
        $("img."+classname).attr("src",url);
    }

    /*
     * 上传图片删除函数
     */
    function del_upimg(classname,obj){
        $.ajax({
            type:'get',
            data:{filename:$("input."+classname).val(),action:"del"},
            url:"<?php echo U('Admin/Uploadify/delImg');?>",
            success:function(data){
                $("input."+classname).val('');
                $("img."+classname).attr("src","/Application/Admin/Public/images/pic-moren.jpg");
                $(obj).hide();
            }
        })
    }
</script>
</html>