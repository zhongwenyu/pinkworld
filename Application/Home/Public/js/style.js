/**
 * Created by zhongwenyu1987 on 2016/9/11.
 */
$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() > $(window).height()){
            $("#gotop").show();
        }else{
            $("#gotop").hide();
        }
    })
});

$(function(){
    $(".js_notice_alert a").click(function(){
        $(this).siblings(".js_notice_content").show();
    });

    $(".js_content_close").click(function(){
        $(this).parent().hide();
    });

    $(".js_content_cancel").click(function(){
        $(this).parent().parent().parent().hide();
    })
});

function show_cat(id,obj){
    $(obj).addClass("active").siblings().removeClass("active");
    $("#"+id).show().siblings().hide();
}

function goTop(){
    document.documentElement.scrollTop = document.body.scrollTop =0;
}

function show_demand(id){
    if($("#"+id).is(":hidden")){
        $("#"+id).show();
    }else{
        $("#"+id).hide();
    }
}

function demand_check(id){
    var flag=true;
    $("input[name^='goods"+id+"']").each(function(){
        if($(this).attr("type")!="file" && $(this).val() == ""){
            flag=false;
            var html="请填写"+$(this).attr("title");
            layer.msg(html);
            return false;
        }
    });

    $("textarea[name^='goods"+id+"']").each(function(){
        if($(this).val() == ""){
            flag=false;
            var html="请填写"+$(this).attr("title");
            layer.msg(html);
            return false;
        }
    });

    if(flag){
        $("#demandcheck"+id).html("已添加需求描述").removeClass("color_high_light");
        $("#cartdemand"+id).hide();
    }
}

function add_file(obj){
    var html="<input type='file' class='file-upload' name='"+$(obj).attr("name")+"' accept='image/gif,image/png,image/bmp,image/jpeg,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' onchange='add_file(this)' />";
    if($(obj).parent().find("input").length < 4){
        $(obj).parent().append(html);
    }
}

function add_price(obj,id){
    var price=$(obj).attr("data-price");
    $("#goodsprice"+id).val(price);
    $("#goods_price"+id).html(price);
}

function del_goods(classname){
    $("."+classname).remove();
}

function show_morecat(id){
    if($("#"+id).hasClass("morecat")){
        $("#"+id).removeClass("morecat");
    }else{
        $("#"+id).addClass("morecat");
    }
}

function show_code(src){
    //iframe窗
    layer.open({
        type: 2,
        title: false,
        closeBtn: 1, //不显示关闭按钮
        shade: [0],
        area: ['430px', '430px'],
        shift: 2,
        content: [src, 'no'] //iframe的url，no代表不显示滚动条
    });
}

function onlogin(){
    layer.msg("请登录后再查看选号车！");
    var load = setTimeout(function(){
        window.location.href="http://www.ftx9.com";
    },1500)
}
