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
<div class="mod-box">
    <div class="mod-title">
        <h5>微信公众号</h5>
    </div>
    <div class="mod-search form-group">
        <form id="search-form1" action="" method="post" onsubmit="return false">
            <label for="key_word" class="fl mhg">微信名</label>
            <input type="text" class="msea fl mr18 form-control mhg" name="key_word" id="key_word" placeholder="请输入微信名" />
            <input type="hidden" name="type" value="1" />
            <a id="screen" class="fl btn btn-primary ma" onclick="ajax_search('search-form1')"><span class="glyphicon glyphicon-search glyadd"></span>搜索</a>
            <a href="<?php echo U('Admin/Goods/add_weixin',array('act'=>'add'));?>" class="fr btn btn-primary ma"><span class="glyphicon glyphicon-plus glyadd"></span>新增公众号</a>
        </form>
    </div>
    <div class="mod-table">
        <table cellspacing="0" class="table table-striped table-bordered ">
            <thead>
            <tr>
                <th>ID</th>
                <th>微信名</th>
                <th>微信号</th>
                <th>头像</th>
                <th>二维码</th>
                <th style="width:80px">是否认证</th>
                <th>认证信息</th>
                <th>粉丝数</th>
                <th>阅读量</th>
                <th>粉丝性别</th>
                <th style="width:80px">是否显示</th>
                <th style="width:110px;text-align: center">下标</th>
                <th style="width:80px">排序</th>
                <th style="width:130px">操作</th>
            </tr>
            </thead>
            <tbody id="ajax_return">
            <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><tr>
                    <td class="center"><?php echo ($v["id"]); ?></td>
                    <td class="center"><?php echo ($v["name"]); ?></td>
                    <td class="center"><?php echo ($v["wechat"]); ?></td>
                    <td class="center">
                        <img src="<?php echo ($v["pic"]); ?>" class="td-img" />
                    </td>
                    <td class="center">
                        <img src="<?php echo ($v["code"]); ?>" class="td-img" />
                    </td>
                    <td class="center">
                        <?php if($v['isrz']): ?>是
                          <?php else: ?>否<?php endif; ?>
                    </td>
                    <td class="center"><?php echo ($v["certify"]); ?></td>
                    <td class="center"><?php echo ($v["fans"]); ?></td>
                    <td class="center"><?php echo ($v["reading"]); ?></td>
                    <td class="center">
                        <?php if($v['fansex'] == 0): ?>无
                          <?php elseif($v['fansex'] == 1): ?>男
                          <?php elseif($v['fansex'] == 2): ?>女<?php endif; ?>
                    </td>
                    <td class="center">
                        <img src="/Application/Admin/Public/images/<?php if($v[isshow]): ?>yes.png<?php else: ?>no.png<?php endif; ?>" onclick="change_show('goods','id','<?php echo ($v[id]); ?>','isshow',this)" />
                    </td>
                    <td class="center">
                        <?php if(is_array($v['sign'])): foreach($v['sign'] as $key=>$s): ?><span class="sign-spa"><?php echo ($goodssign[$s]['signname']); ?></span><?php endforeach; endif; ?>
                    </td>
                    <td class="center">
                        <input type="text" class="form-control" style="height:30px" value="<?php echo ($v["sort"]); ?>" onblur="change_sort('goods','id','<?php echo ($v[id]); ?>','sort',this)" />
                    </td>
                    <td>
                        <a href="<?php echo U('Admin/Goods/add_weixin',array('act'=>'edit','typeid'=>$v['typeid'],'id'=>$v['id']));?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil pr3"></span>编辑</a>
                        <a href="javascript:void(0);" onclick="del('goods','id','<?php echo ($v[id]); ?>')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash pr3"></span>删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div style="width:100%;text-align: center"><?php echo ($page); ?></div>
    </div>
</div>
</body>
<script>

</script>
</html>