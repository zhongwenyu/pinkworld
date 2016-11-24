$(document).ready(function(){
    var num1= 0;
    var num2= 0;
    //登录页背景
    $("#lgbg").css("minHeight",$(document).height());

    //顶部下拉菜单
    $(".btn-down").click(function(){
        if(num2++%2 == 0){
            $(this).addClass("bd-active").removeClass("hbtn").children(".glyphicon").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
            $(this).siblings(".bd-ul").show();
        }else{
            $(this).removeClass("bd-active").addClass("hbtn").children(".glyphicon").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
            $(this).siblings(".bd-ul").hide();
        }
    });

    //首页定高
    $(".idh").css("height",$(document).height()-50);

    //右侧菜单悬停
    $(".nav-btn").hover(function(){
        $(this).addClass("nav-hover");
    },function(){
        $(this).removeClass("nav-hover");
    });

    //右侧菜单显隐
    $(".nav-title").click(function(){
        if(num1++%2 == 0){
            $(this).children(".navt-left").removeClass("glyphicon-triangle-bottom").addClass("glyphicon-triangle-right");
            $(this).next(".nav-list").hide();
        }else{
            $(this).children(".navt-left").removeClass("glyphicon-triangle-right").addClass("glyphicon-triangle-bottom");
            $(this).next(".nav-list").show();
        }
    })
});

/*
 * 无限级子分类显隐
 */
function merge_add(obj){
    var tr=$(obj).parent().parent();
    var id=$(tr).attr("id");
    if($(obj).hasClass("glyphicon-plus")){
        $(obj).removeClass("glyphicon-plus").addClass("glyphicon-minus");
        $("tr[id^='"+id+"-']").show();
    }else{
        $(obj).removeClass("glyphicon-minus").addClass("glyphicon-plus");
        $("tr[id^='"+id+"-']").hide();
    }
}

/*
 * checkbox添加新属性
 */
function inp_check(obj,hasread){
    var html;
    if(hasread){
        html="<input type='text' name='readings[]' class='form-control mform-inp2 mr10' placeholder='阅读量' /><input type='text' name='price[]' class='form-control mform-inp2 mr10' placeholder='报价' />";
    }else{
        html="<input type='text' name='price[]' class='form-control mform-inp2 mr10' placeholder='报价' />";
    }

    if($(obj).prop("checked")){
        $(obj).parent().append(html);
    }else{
        $(obj).siblings(".mform-inp2").remove();
    }
}



