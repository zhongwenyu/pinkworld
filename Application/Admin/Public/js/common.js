/*
 * ajax添加数据
 */
function ajax_add(id,url){
    $.ajax({
        type:'post',
        dataType:'json',
        data:$("#"+id).serialize(),
        url:url,
        beforeSend:function(){
            layer.load(2);
        },
        error:function(){
            layer.msg("系统繁忙，请稍后再试！");
        },
        success:function(data){
            layer.closeAll('loading'); //关闭加载层
            layer.msg(data.msg);
            if(data.url){
                var tz=setTimeout(function(){
                    window.location.href=data.url;
                },1000);
            }
        }
    })
}

/*
 * ajax修改显示
 * @pa: table 表名,key 查询键名,val 查询键值,field 更新键名,node 节点,
 */
function change_show(table,key,val,field,obj){
    $src=$(obj).attr("src");
    $.ajax({
        type:'post',
        dataType:'json',
        url:"/index.php/Admin/Api/change_show",
        data:{
            'table':table,
            'key':key,
            'val':val,
            'field':field
        },
        success:function(data){
            if(data.status){
                if($src.indexOf("yes")>0){
                    $(obj).attr("src",$src.replace(/yes/,"no"));
                }else{
                    $(obj).attr("src",$src.replace(/no/,"yes"));
                }
            }
        }
    })
}

/*
 * ajax修改排序
 * @pa: table 表名,key 查询键名,val 查询键值,field 更新键名
 */
function change_sort(table,key,val,field,obj){
    var fval=$(obj).val();
    $.ajax({
        type:'post',
        dataType:'json',
        url:"/index.php/Admin/Api/change_sort",
        data:{
            'table':table,
            'key':key,
            'val':val,
            'field':field,
            'fval':fval
        },
        success:function(data){
            if(data.status){
                window.location.reload();
            }
        }
    })
}

/*
 * ajax删除数据
 * @pa: url 路径,id id,
 */
function del(table,key,val){
    if(!confirm('确定要删除么？')){
        return false;
    }
    $.ajax({
        type:'post',
        url:"/index.php/Admin/Api/del",
        dataType:'json',
        data:{
            'table':table,
            'key':key,
            'val':val
        },
        success:function(data){
            if(data.status){
                layer.msg('删除成功!');
                window.location.reload();
            }else{
                layer.msg('删除失败!');
            }
        }
    })
}

/*
 * ajax搜索关键词
 * @pa: url 路径,id id,
 */
var search_back=1;
function ajax_search(formid){
    if(search_back){
        search_back = 0;
        $.ajax({
            type:'post',
            url:"/index.php/Admin/Goods/goods_search",
            data:$("#"+formid).serialize(),
            success:function(data){
                search_back = 1;
                $("#ajax_return").html("");
                $("#ajax_return").append(data);
            }
        })
    }
}

/*
 * ajax处理订单
 * @pa: url 路径,id id,
 */
var order_back=1;
function ajax_orderhandle(orderid,statusname,status){
    if(order_back){
        order_back = 0;
        $.ajax({
            type:'post',
            url:"/index.php/Admin/Order/order_handle",
            dataType:'json',
            data:{orderid:orderid,statusname:statusname,status:status},
            success:function(data){
                order_back = 1;
                layer.msg(data.msg);
                if(data.url){
                    var load = setTimeout(function(){
                        window.location.href=data.url;
                    },1000)
                }
            }
        })
    }
}