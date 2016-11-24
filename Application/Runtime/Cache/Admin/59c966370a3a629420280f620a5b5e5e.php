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
        <h5>商品分类</h5>
    </div>
    <div class="mod-search form-group">
        <a href="<?php echo U('Admin/Goods/add_cat',array('act'=>'add'));?>" class="fr btn btn-primary ma"><span class="glyphicon glyphicon-plus glyadd"></span>新增分类</a>
    </div>
    <div class="mod-table">
        <table cellspacing="0" class="table table-striped table-bordered ">
            <thead>
            <tr>
                <th style="width:100px">ID</th>
                <th style="width:500px">分类名称</th>
                <th style="width:100px">是否显示</th>
                <th style="width:200px">排序</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr id="0">
                <td class="center">0</td>
                <td><span class="glyphicon glyphicon-plus merge-add" onclick="merge_add(this)"></span>平台分类</td>
                <td class="center"></td>
                <td class="center"></td>
                <td></td>
            </tr>
            <?php if(is_array($platcat)): foreach($platcat as $key=>$k): ?><tr id="0-<?php echo ($k["id"]); ?>" style="display: none">
                    <td class="center"><?php echo ($k["id"]); ?></td>
                    <td class="merge2"><span class="merge-mod">|—&nbsp;</span><?php echo ($k["catname"]); ?></td>
                    <td class="center">
                        <img src="/Application/Admin/Public/images/<?php if($k[isshow]): ?>yes.png<?php else: ?>no.png<?php endif; ?>" onclick="change_show('goodscat','id','<?php echo ($k[id]); ?>','isshow','<?php echo U('Admin/Api/change_show');?>',this)" style="cursor: pointer" />
                    </td>
                    <td class="center">
                        <input type="text" class="form-control" style="height:30px" value="<?php echo ($k["sort"]); ?>" onblur="change_sort('goodscat','id','<?php echo ($k[id]); ?>','sort',this,'<?php echo U('Admin/Api/change_sort');?>')" />
                    </td>
                    <td>
                        <a href="<?php echo U('Admin/Goods/add_cat',array('act'=>'edit','catid'=>$k['id']));?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil pr3"></span>编辑</a>
                        <a href="javascript:void(0);" onclick="del('goodscat','id','<?php echo ($k[id]); ?>')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash pr3"></span>删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            <?php if(is_array($v['child'])): foreach($v['child'] as $key=>$k): ?><tr id="<?php echo ($v["id"]); ?>-<?php echo ($k["id"]); ?>" style="display: none">
                    <td class="center"><?php echo ($k["id"]); ?></td>
                    <td class="merge2"><span class="merge-mod">|—&nbsp;</span><?php echo ($k["catname"]); ?></td>
                    <td class="center">
                        <img src="/Application/Admin/Public/images/<?php if($k[isshow]): ?>yes.png<?php else: ?>no.png<?php endif; ?>" onclick="change_show('goodscat','id','<?php echo ($k[id]); ?>','isshow','<?php echo U('Admin/Api/change_show');?>',this)" style="cursor: pointer" />
                    </td>
                    <td class="center">
                        <input type="text" class="form-control" style="height:30px" value="<?php echo ($k["sort"]); ?>" onblur="change_sort('goodscat','id','<?php echo ($k[id]); ?>','sort',this,'<?php echo U('Admin/Api/change_sort');?>')" />
                    </td>
                    <td>
                        <a href="<?php echo U('Admin/Goods/add_cat',array('act'=>'edit','catid'=>$k['id']));?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil pr3"></span>编辑</a>
                        <a href="javascript:void(0);" onclick="del('<?php echo U('Admin/Api/del');?>','goodscat','id','<?php echo ($k[id]); ?>')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash pr3"></span>删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr id="<?php echo ($v["id"]); ?>">
                    <td class="center"><?php echo ($v["id"]); ?></td>
                    <td><span class="glyphicon glyphicon-plus merge-add" onclick="merge_add(this)"></span><?php echo ($v["name"]); ?></td>
                    <td class="center"></td>
                    <td class="center">
                        <input type="text" class="form-control" style="height:30px" value="<?php echo ($v["sort"]); ?>" onblur="change_sort('goodscat','id','<?php echo ($v[id]); ?>','sort',this,'<?php echo U('Admin/Api/change_sort');?>')" />
                    </td>
                    <td></td>
                </tr>
                <?php if(is_array($v['child'])): foreach($v['child'] as $key=>$k): ?><tr id="<?php echo ($v["id"]); ?>-<?php echo ($k["id"]); ?>" style="display: none">
                        <td class="center"><?php echo ($k["id"]); ?></td>
                        <td class="merge2"><span class="merge-mod">|—&nbsp;</span><?php echo ($k["catname"]); ?></td>
                        <td class="center">
                            <img src="/Application/Admin/Public/images/<?php if($k[isshow]): ?>yes.png<?php else: ?>no.png<?php endif; ?>" onclick="change_show('goodscat','id','<?php echo ($k[id]); ?>','isshow','<?php echo U('Admin/Api/change_show');?>',this)" style="cursor: pointer" />
                        </td>
                        <td class="center">
                            <input type="text" class="form-control" style="height:30px" value="<?php echo ($k["sort"]); ?>" onblur="change_sort('goodscat','id','<?php echo ($k[id]); ?>','sort',this,'<?php echo U('Admin/Api/change_sort');?>')" />
                        </td>
                        <td>
                            <a href="<?php echo U('Admin/Goods/add_cat',array('act'=>'edit','catid'=>$k['id']));?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil pr3"></span>编辑</a>
                            <a href="javascript:void(0);" onclick="del('<?php echo U('Admin/Api/del');?>','goodscat','id','<?php echo ($k[id]); ?>')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash pr3"></span>删除</a>
                        </td>
                    </tr><?php endforeach; endif; endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>