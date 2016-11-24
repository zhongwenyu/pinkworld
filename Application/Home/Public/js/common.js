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

/**
 * 加入购物车
 */
function add_cart(goodsid,typeid,event,y){
    var offset = $("#js_cart_icon_div").offset();
    var img = $("#goodsimg"+goodsid).attr('src');
    var flyer = $('<img class="u-flyer" src="'+img+'">');
	var scrolltop = $(document).scrollTop();
    flyer.fly({
        start: {
            left: event.pageX, //开始位置（必填）#fly元素会被设置成position: fixed
            top: event.pageY-$(document).scrollTop() //开始位置（必填）
        },
        end: {
            left: offset.left+10, //结束位置（必填）
            top: offset.top-$(document).scrollTop(), //结束位置（必填）
            width: 0, //结束时宽度
            height: 0 //结束时高度
        },
        onEnd: function(){ //结束回调
            this.destory(); //移除dom

        }
    });
    $.ajax({
        type:'post',
        dataType:'json',
        data:{goodsid:goodsid,typeid:typeid},
        url:"/index.php/Home/Cart/add_cart",
        beforeSend:function(){
            var index = layer.load(1, {
                shade: [0.3,'#fff'] //0.1透明度的白色背景
            });
        },
        success:function(data){
            layer.closeAll();
            layer.msg(data.msg);
            if(data.status){
                show_right();
            }
            if(data.url){
                var load = setTimeout(function(){
                    window.location.href=data.url;
                },1000)
            }
        }
    })
}

function show_right(){
    if(!$("#js_cart_icon_div").hasClass("sidebar_icon_selected")){
        $("#js_side_bar").animate({"right":"270px"},"fast");
        $("#js_cart_list_div").animate({"right":"220px","width":"270px"},"fast");
        $("#js_cart_icon_div").addClass("sidebar_icon_selected");
    }
    $.ajax({
        type:'post',
        url:"/index.php/Home/Cart/get_cart",
        success:function(data){
            $("#ajax_return").html("");
            $("#ajax_return").append(data);
        }
    })
}

/**
 * 单选加入购物车
 */
function checkbox_cart(goodsid,typeid,obj,event,y){
    var offset = $("#js_cart_icon_div").offset();
    var img = $("#goodsimg"+goodsid).attr('src');
    var flyer = $('<img class="u-flyer" src="'+img+'">');
	var scrolltop = $(document).scrollTop();
    flyer.fly({
        start: {
            left: event.pageX, //开始位置（必填）#fly元素会被设置成position: fixed
            top: event.pageY-scrolltop //开始位置（必填）
        },
        end: {
            left: offset.left+10, //结束位置（必填）
            top: offset.top-scrolltop, //结束位置（必填）
            width: 0, //结束时宽度
            height: 0 //结束时高度
        },
        onEnd: function(){ //结束回调
            this.destory(); //移除dom
        }
    });
    if($(obj).prop("checked") == true){
        $.ajax({
            type:'post',
            dataType:'json',
            data:{goodsid:goodsid,typeid:typeid},
            url:"/index.php/Home/Cart/add_cart",
            beforeSend:function(){
                var index = layer.load(1, {
                    shade: [0.3,'#fff'] //0.1透明度的白色背景
                });
            },
            success:function(data){
                layer.closeAll();
                if(data.status){
                    cart_num(1,1);
                    show_right();
                }
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

/**
 * 批量加入购物车
 */
var allcart = 1;
function all_cart(obj,typeid){
    if($(obj).find("input").prop("checked") == true){
        $("input[name^='cart']").prop("checked",true);
        if(allcart){
            var goodsid = new Array();
            $("input[name^='cart']").each(function(){
                goodsid.push(parseInt($(this).attr("data-id")));
            });
            $.ajax({
                type:'post',
                dataType:'json',
                data:{goodsid:goodsid,typeid:typeid},
                url:"/index.php/Home/Cart/all_cart",
                beforeSend:function(){
                    var index = layer.load(1, {
                        shade: [0.3,'#fff'] //0.1透明度的白色背景
                    });
                },
                success:function(data){
                    layer.closeAll();
                    layer.msg(data.msg);
                    if(data.status){
                        cart_num(data.num,1);
                        show_right();
                    }
                }
            })
        }
    }else{
        $("input[name^='cart']").prop("checked",false);
    }

}

/**
 * 购物车数字变动,1增，0减
 */
function cart_num(num,type){
    var nownum = parseInt($("#cartnum").html());
    if(type){
        nownum = nownum + num;
        $("#cartnum").html(nownum);
    }else{
        nownum = nownum - num;
        $("#cartnum").html(nownum);
    }
}

/**
 * 移除购物车
 */
function del_cart(id,obj){
    $.ajax({
        type:'post',
        dataType:'json',
        data:{id:id},
        url:"/index.php/Home/Cart/del_cart",
        success:function(data){
            if(data.status){
                cart_num(1,0);
                $(obj).parent().parent().parent().parent().remove();
            }
        }
    })
}

/**
 * 清空购物车
 */
function del_allcart(){
    $.ajax({
        type:'post',
        dataType:'json',
        data:{act:'all'},
        url:"/index.php/Home/Cart/del_cart",
        success:function(data){
            if(data.status){
                $("#js_cart_list_ul").html("");
                window.location.reload();
            }
        }
    })
}

/**
 * 会员注册
 */
function regist(){
    if(verifyback){
        verifyback = 0;
        $.ajax({
            type:'post',
            dataType:'json',
            url:"/index.php/Home/User/regist",
            data:$("#form1").serialize(),
            success:function(data){
                verifyback = 1;
                layer.msg(data.msg);
                if(data.url){
                    var load = setTimeout(function(){
                        window.location.href=data.url;
                    },1000);
                }
            }
        })
    }
}

/**
 * 验证码刷新
 */
function reloadimg(){
    $("#verify_repeat").attr("src","/index.php/Home/User/verify"+"/"+Math.floor(Math.random()*100));
}

/**
 * 会员登录
 */
function user_login(){
    var account = $("input[name=account]").val();
    var password = $("input[name=password]").val();
    if(account == "" || password == ""){
        layer.msg("请输入账号或密码!");
        return false;
    }

    if(verifyback){
        verifyback = 0;
        $.ajax({
            type:'post',
            dataType:'json',
            url:"/index.php/Home/User/login",
            data:{
                verify:$("input[name=verify]").val(),
                account:account,
                password:password
            },
            success:function(data){
                verifyback = 1;
                layer.msg(data.msg);
                if(data.status){
                    var load = setTimeout(function(){
                        window.location.reload();
                    },1000);
                }
            }
        })
    }
}

/**
 * 加载购物车列表
 */
function show_cart(obj){
    if($(obj).hasClass("sidebar_icon_selected")){
        $("#js_side_bar").animate({"right":0},"fast");
        $("#js_cart_list_div").animate({"right":0,"width":"220px"},"fast");
        $(obj).removeClass("sidebar_icon_selected");
    }else{
        $("#js_side_bar").animate({"right":"270px"},"fast");
        $("#js_cart_list_div").animate({"right":"220px","width":"270px"},"fast");
        $(obj).addClass("sidebar_icon_selected");
    }
    $.ajax({
        type:'post',
        url:"/index.php/Home/Cart/get_cart",
        success:function(data){
            $("#ajax_return").html("");
            $("#ajax_return").append(data);
        }
    })
}

function close_cart(){
    $("#js_side_bar").animate({"right":0},"fast");
    $("#js_cart_list_div").animate({"right":0,"width":"220px"},"fast");
    $("#js_cart_icon_div").removeClass("sidebar_icon_selected");
}

/*
 * ajax加载商品列表
 */
var ajaxgoodslist = 1;
function show_goodslist(typeid,keyname,keyval,obj,style){
    var keyword;
    if(keyname == "keyword"){
        keyword = $("#search_input").val();
    }else if(style == "between"){
        var price1 = $("#"+keyval).val();
        var price2 = $("#"+obj).val();
        keyval = price1+"-"+price2;
    }else{
        if(style){
            $(obj).addClass(style).siblings("a").removeClass(style);
        }else{
            $(obj).addClass("current").parent().siblings("li").find("a").removeClass("current");
        }
    }
    if(ajaxgoodslist){
        ajaxgoodslist = 0;
        $.ajax({
            type:'post',
            url:"/index.php/Home/Goods/goodslist",
            data:{typeid:typeid,keyname:keyname,keyval:keyval,keyword:keyword},
            beforeSend:function(){
                $("#loading").show();
            },
            success:function(data){
                ajaxgoodslist = 1;
                $("#loading").hide();
                $("#accountListContainer").html("");
                $("#accountListContainer").append(data);
            }
        })
    }
}

function checkbox_goodslist(typeid,name,obj,add){
    if($(obj).prop("checked") == true){
        var keyname = name;
        var keyval = 1;
    }else{
        var keyname = "";
        var keyval = 0;
    }

    $.ajax({
        type:'post',
        url:"/index.php/Home/Goods/goodslist",
        data:{typeid:typeid,keyname:keyname,keyval:keyval,add:add},
        beforeSend:function(){
            $("#loading").show();
        },
        success:function(data){
            ajaxgoodslist = 1;
            $("#loading").hide();
            $("#accountListContainer").html("");
            $("#accountListContainer").append(data);
        }
    })
}

/*
 * 微信支付二维码获取
 */
function WxPay(id,obj){
    $.ajax({
        type:'post',
        data:{orderid:id},
        dataType:'json',
        url:"/index.php/Home/Wxpay/pay",
        success:function(data){
            goPay(obj);
            var url = data.url;
            new_code(url);
            var pay = setInterval(function(){
                ispay(id);
            },5000)
        }
    })
}

/*
 * 支付宝支付
 */
function alipay(id){
    var lay =layer.confirm("<div style='font-size: 19px;text-align: center;padding:20px 0 30px 0'>请在打开的新页面里支付</div>", {title: false,
        btn: ['已完成支付','选择其他支付方式'],closeBtn: 0//按钮
    }, function(){
        clearInterval(pay);
        $.ajax({
            type:'post',
            data:{orderid:id},
            dataType:'json',
            url:"/index.php/Home/Cart/ispay",
            success:function(data){
                if(data.status == 1){
                    window.location.href="/index.php/Home/User/index";
                }else{
                    layer.msg("支付失败");
                }
            }
        })
    }, function(){
        layer.close(lay);
    });
    var pay = setInterval(function(){
        ispay(id);
    },5000)
}

/*
 * 支付状态获取
 */
function ispay(id){
    $.ajax({
        type:'post',
        data:{orderid:id},
        dataType:'json',
        url:"/index.php/Home/Cart/ispay",
        success:function(data){
            if(data.status == 1){
                layer.msg("支付成功！");
                var load = setTimeout(function(){
                    window.location.href="/index.php/Home/User/index";
                },2000);
            }
        }
    })
}
