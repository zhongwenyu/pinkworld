<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/12
 * Time: 11:17
 */
/*
 * 验证码
 */
function check_code($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/*
 * 密码转换
 * @param $str 账号密码
 */
function encrypt($str){
    return md5(C("AUTH_CODE").$str);
}

/*
 * 打印函数
 */
function p($arr){
    echo '<pre>'.print_r($arr,true).'</pre>';
}

/*
 * 无限级子分类
 */
function get_child_merge($node,$pid=0){
    $arr=array();
    foreach($node as $k => $v){
        if($v['pid'] == $pid){
            $v['child']=get_child_merge($node,$v['id']);
            $arr[]=$v;
        }
    }
    return $arr;
}

/*
 * 父子类合并
 */
function two_merge($parent,$child,$key){
    $arr=array();
    foreach($parent as $v){
        foreach($child as $k){
            if($k[$key] == $v['id']){
                $v['child'][] = $k;
            }
        }
        $arr[]=$v;
    }
    return $arr;
}

/*
 * 将数据库中查出的列表以指定的ID作为数组的键名
 */
function convert_arr_key($arr, $key_name)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        $arr2[$val[$key_name]] = $val;
    }
    return $arr2;
}

/*
 * 信息配置
 */
function return_config($config){
    $arr = array();
    foreach($config as $v){
        $arr[$v['keyname']] = $v['keyval'];
    }
    return $arr;
}

/*
 *
 */
function convert_arr_key2($arr,$key_name,$val_name){
    $arr2=array();
    foreach($arr as $k => $v){
        $arr2[$v[$key_name]][] = $v[$val_name];
    }
    return $arr2;
}

function file_handle($file){
    $arr = array();
    foreach($file as $k => $v){
        $arr[$v['key']][] = $v;
    }
    return $arr;
}

/*
 * 生成订单编号
 */
function ordersn(){
    return date('Ymd').str_pad(mt_rand(1,99999), 5, '0', STR_PAD_LEFT);
}

/*
 * 大额数字返回万结尾
 */
function return_wan($num){
    if(intval($num,10) > 100000){
        $str = "100000+";
        return $str;
    }else{
        return $num;
    }
}

/*
 * 文件下载
 */
function download ($filename, $showname='',$content='',$expire=180) {
    if(is_file($filename)) {
        $length = filesize($filename);
    }elseif(is_file(UPLOAD_PATH.$filename)) {
        $filename = UPLOAD_PATH.$filename;
        $length = filesize($filename);
    }elseif($content != '') {
        $length = strlen($content);
    }else {
        E($filename.L('下载文件不存在！'));
    }
    if(empty($showname)) {
        $showname = $filename;
    }
    $showname = basename($showname);
    if(!empty($filename)) {
        $finfo 	= 	new \finfo(FILEINFO_MIME);
        $type 	= 	$finfo->file($filename);
    }else{
        $type	=	"application/octet-stream";
    }
    //发送Http Header信息 开始下载
    header("Pragma: public");
    header("Cache-control: max-age=".$expire);
    //header('Cache-Control: no-store, no-cache, must-revalidate');
    header("Expires: " . gmdate("D, d M Y H:i:s",time()+$expire) . "GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s",time()) . "GMT");
    header("Content-Disposition: attachment; filename=".$showname);
    header("Content-Length: ".$length);
    header("Content-type: ".$type);
    header('Content-Encoding: none');
    header("Content-Transfer-Encoding: binary" );
    if($content == '' ) {
        readfile($filename);
    }else {
        echo($content);
    }
    exit();
}


function get_type($typeid){
    if($typeid == 1){
        return "微信公众号";
    }elseif($typeid == 2){
        return "新浪微博";
    }
    elseif($typeid == 3){
        return "视频直播";
    }
}

function return_width($arr){
    $k = count($arr);
    $width = floor(100/$k);
    return $width;
}

/*
 * 去掉html
 */
function replace_html_tag($string, $tagname, $clear = false){
    $re = $clear ? '' : '1';
    $sc = '/<' . $tagname . '(?:s[^>]*)?>([sS]*?)?</' . $tagname . '>/i';
    return preg_replace($sc, $re, $string);
}

/*
 * 返回排行
 */
function return_rank($k,$b){
    return $k+$b;
}
