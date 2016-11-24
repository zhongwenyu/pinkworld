/*PC端图片轮播插件，Create by zhongwenyu in 2016.05.28*/
$(docume)

function carousel(element,t){
    //属性初始化
    var length=$(element).children("a").length();
    var width=$(element).width();
    var next=1;
    var index=0;
    var carousel_timer=null;

    //样式初始化
    $(element).children("a").eq(0).css("zIndex",2);
    banner_css(0);

    //轮播计数器
    function carousel_fn(f){
        var s=f != undefined ? f : true;
        next = index >=length-1 ? 0 : index+1;
        carousel_change(index,next,0,s);
        index=next;
    }

    //图片更换
    function carousel_change(i,n,d,f){
        //设置图片进入方向,1为从左，0为从右,默认0
        var w= d ? -width : width;
        banner_css(n);

        if(f){
            $(element).children("a").eq(n).css({"left":w+"px","zIndex":2});
        }

        $(element).children("a").eq(n).animate({left:"0"},{time:10,step:30});
        $(element).children("a").eq(i).animate({left:-w+"px"},{time:10,step:30},function(){$(this).css("zIndex",1)});
    }

    //设置底部圆点和图片信息
    function banner_css(num,str){
        $(element).children(".carousel_alt").html($(element).children("img").eq(num).attr("alt"));    //底部图片信息，若不需要，可注释
        $(element).children("li").css("color","#b0b0b0").eq(num).css("color","#fc114a");
    }

    //正常轮播
    function carousel_begin(){
        carousel_timer=setInterval(function(){
            carousel_fn();
        },t);
    }

    //查看下一张
    function banner_next(f){
        var s=f != undefined ? f : true;
        clearInterval(carousel_timer);
        carousel_fn(s);
        carousel_begin();
    }

    //查看上一张
    function banner_prev(f){
        var s=f != undefined ? f : true;
        clearInterval(carousel_timer);
        carousel_change(index, index <= 0 ? length-1 : index-1,1,s);
        index = index <= 0 ? length-1 : index-1;
        carousel_begin();
    }

    //开始轮播
    carousel_begin();

    //右侧按钮查看下一张
    $(element).children(".carousel_right").click(function(){
        banner_next();
    });

    //左侧按钮查看上一张
    $(element).children(".carousel_left").click(function(){
        banner_prev();
    });

    //底部圆点查看指定图片
    $(element).children("li").click(function(){
        clearInterval(carousel_timer);
        var li=$(this).index();
        carousel_change(index,li,0,true);
        index=li;
        carousel_begin();
    });
}
