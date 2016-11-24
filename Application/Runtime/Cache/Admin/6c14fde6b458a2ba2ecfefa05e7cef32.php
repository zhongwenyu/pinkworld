<?php if (!defined('THINK_PATH')) exit(); if(is_array($goods)): foreach($goods as $key=>$v): ?><tr>
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
        <td class="center"><?php echo ($v["sign"]); ?></td>
        <td class="center">
            <input type="text" class="form-control" style="height:30px" value="<?php echo ($v["sort"]); ?>" onblur="change_sort('goods','id','<?php echo ($v[id]); ?>','sort',this)" />
        </td>
        <td>
            <a href="<?php echo U('Admin/Goods/add_weixin',array('act'=>'edit','typeid'=>$v['id']));?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil pr3"></span>编辑</a>
            <a href="javascript:void(0);" onclick="del('goods','id','<?php echo ($v[id]); ?>')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash pr3"></span>删除</a>
        </td>
    </tr><?php endforeach; endif; ?>