<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class GoodsController extends BaseController {
    public $user_id = 0;
    public $user = array();

    /**
     * 析构流函数
     */
    public function  __construct() {
        parent::__construct();
        if(session('?user')){
            $user = session('user');
            session('user',$user);  //覆盖session 中的 user
            $this->user = $user;
            $this->user_id = $user['id'];
            $cart=M('cart')->where("userid = $this->user_id")->select();
            $this->assign('user',$user); //存储用户信息
            $this->assign("cart",$cart);
        }
    }

    /**
     * 产品详情
     */
    public function goods_detail(){
        $goodsid = I('get.id',1);
        $time = time();
        $weektime = $time - 86400;
        $monthtime = $time - 370285;
        //周订单
        $weekorder = M('ordergoods')->where("goodsid = $goodsid and addtime > $weektime")->count();
        //月订单
        $monthorder = M('ordergoods')->where("goodsid = $goodsid and addtime > $monthtime")->count();

        $goods=M('goods')->where("id = $goodsid and isshow = 1")->find();
        $specprice=M('specprice')->where("goodsid = $goodsid")->select();
        $goodsspec=M('goodsspec')->select();
        $goodsspec=convert_arr_key($goodsspec,'id');
        $goodssign=M('goodssign')->select();
        $goodssign=convert_arr_key($goodssign,'id');
        $goodscat=M('goodscat')->select();
        $goodscat=convert_arr_key($goodscat,'id');

        if(!empty($goods['sign'])){
            $sign=explode(',',$goods['sign']);
            foreach($sign as $v){
                $arr[]=$goodssign[$v]['signname'];
            }
            $goods['sign']=$arr;
        }
        if(!empty($goods['catid'])){
            $cat=explode(',',$goods['catid']);
            foreach($cat as $v){
                $arr1[]=$goodscat[$v]['catname'];
            }
            $goods['catid']=$arr1;
        }

        $typeid = $goods['typeid'];

        $goodsrand = M('goods')->where("isshow = 1 and typeid = $typeid")->order("reading desc")->limit(4)->select();
        $goodsbar = M('goods')->where("isshow = 1 and typeid = $typeid")->order("fans desc")->limit(6)->select();

        $seo['keytitle'] = $goods['keytitle'];
        $seo['keyword'] = $goods['keyword'];
        $seo['keyinfo'] = $goods['keyinfo'];

        $goods['weekorder'] = $weekorder+$goods['ischecked'];
        $goods['monthorder'] = $monthorder+$goods['ischecked'];

        $this->assign("seo",$seo);
        $this->assign("goods",$goods);
        $this->assign("typeid",$typeid);
        $this->assign("specprice",$specprice);
        $this->assign("goodsspec",$goodsspec);
        $this->assign("goodscat",$goodscat);
        $this->assign("goodsrand",$goodsrand);
        $this->assign("goodsbar",$goodsbar);

        if($typeid == 1){
            $this->display('goodsweixin');
        }
        if($typeid == 2){
            $this->display('goodsweibo');
        }
        if($typeid == 3){
            $this->display('goodslive');
        }

    }

    /**
     * 商品列表
     */
    public function goodslist(){
        I('get.typeid') && $typeid = I('get.typeid');
        I('post.typeid') && $typeid = I('post.typeid');
        $time = time();
        $weektime = $time - 86400;
        $monthtime = $time - 370285;

        if(isset($typeid)) {
            $sign = M('goodssign')->where("isshow = 1")->select();
            $sign = convert_arr_key($sign, 'id');
            $spec = M('goodsspec')->where("isshow = 1")->select();
            $spec = convert_arr_key($spec, 'id');
        }

        if(IS_POST){
            I('between') && $between = I('between');
            I('add') && $add = I('add');
            $keyname = I('post.keyname');
            $keyval = I('post.keyval');
            $keyword = trim(I('post.keyword'));
            //搜索条件初始化
            $where = "isshow = 1 and typeid = $typeid";
            //排序初始化
            $order = "fans desc";

            if(isset($keyname) && $keyname == "order"){
                if($keyval == "firstreading"){
                    $order = "firstreading desc";
                }

                if($keyval == "reading"){
                    $order = "reading desc";
                }

                if($keyval == "ckprice"){
                    $order = "ckprice asc";
                }
            }

            if(isset($keyname) && $keyname == "fans"){
                if($keyval == "以上"){
                    $where .= " and fans >= 100";
                }else{
                    $keyval = explode("-",$keyval);
                    if($keyval[0]){
                        $keyval[0] = $keyval[0];
                        $where .= " and fans >= ".$keyval[0];
                    };
                    if($keyval[1]){
                        $keyval[1] = $keyval[1];
                        $where .= " and fans <= ".$keyval[1];
                    }
                }
            }

            if(isset($keyname) && $keyname == "ckprice"){
                if($keyval == "以上"){
                    $where .= " and ckprice >= 5000";
                }else{
                    $keyval = explode("-",$keyval);
                    if($keyval[0]){
                        $where .= " and ckprice >= ".$keyval[0];
                    };
                    if($keyval[1]){
                        $where .= " and ckprice <= ".$keyval[1];
                    }
                }
            }

            if(isset($keyname) && $keyname == "isyy"){
                $where .= " and isyy = $keyval";
            }

            if(isset($keyname) && $keyname == "sign"){
                $where .= " and sign like '%".$add."%'";
            }

            if(isset($keyname) && $keyname == "isrz"){
                $where .= " and isrz = $keyval";
            }

            if(isset($keyname) && $keyname == "keyword" && $keyval == "weixin" && $keyword != ""){
                if($keyval == "weixin"){
                    $where .= " and wechat like '".$keyword."' or name like '".$keyword."'";
                }else{
                    $where .= " and name like '".$keyword."'";
                }
            }

            $Goods = M('goods'); // 实例化User对象
            $count = $Goods->where($where)->count();// 查询满足要求的总记录数
            $Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $Goods->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();

            foreach($list as $k => $v){
                $list[$k]['sign'] = explode(',',$v['sign']);
                $speclist = M('specprice')->where("goodsid = {$v['id']}")->select();
                $list[$k]['spec'] = $speclist;

                //周订单
                $weekorder = M('ordergoods')->where("goodsid = ".$v['id']." and addtime > $weektime")->count();
                //月订单
                $monthorder = M('ordergoods')->where("goodsid = ".$v['id']." and addtime > $monthtime")->count();

                $list[$k]['weekorder'] = $weekorder+$v['ischecked'];
                $list[$k]['monthorder'] = $monthorder+$v['ischecked'];
            }
            $this->assign("list",$list);
            $this->assign("page",$show);
            $this->assign("sign",$sign);
            $this->assign("spec",$spec);
            if($typeid == 1){
                $this->display('ajax_weixin');
            }
            if($typeid == 2){
                $this->display('ajax_weibo');
            }
            if($typeid == 3){
                $this->display('ajax_live');
            }
        }else{
			I('get.catid') && $catid = I('get.catid');
            $where = "isshow =1 and typeid = $typeid";
            if(!empty($catid)){
                if($typeid == 3){
                    $where .= " and (catid like '%".$catid."%' or platcatid like '%".$catid."%')";
                }else{
                    $where .= " and catid like '%".$catid."%'";
                }
                $seo_cat = M('goodscat')->where("id = $catid")->find();
                $seo['keytitle'] = $seo_cat['cattitle'];
                $seo['keyword'] = $seo_cat['catkeyword'];
                $seo['keyinfo'] = $seo_cat['catinfo'];
                $this->assign("seo",$seo);
                $this->assign("catid",$catid);
            }

            $cat = M('goodscat')->where("isshow = 1 and typeid =$typeid")->select();
            $Goods = M('goods'); // 实例化User对象
            $count = $Goods->where($where)->count();// 查询满足要求的总记录数
            $Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $Goods->where($where)->order('fans desc')->limit($Page->firstRow.','.$Page->listRows)->select();

            foreach($list as $k => $v){
                $list[$k]['sign'] = explode(',',$v['sign']);
                $speclist = M('specprice')->where("goodsid = {$v['id']}")->select();
                $list[$k]['spec'] = $speclist;
                //周订单
                $weekorder = M('ordergoods')->where("goodsid = ".$v['id']." and addtime > $weektime")->count();
                //月订单
                $monthorder = M('ordergoods')->where("goodsid = ".$v['id']." and addtime > $monthtime")->count();

                $list[$k]['weekorder'] = $weekorder+$v['ischecked'];
                $list[$k]['monthorder'] = $monthorder+$v['ischecked'];
            }

            $this->assign("count",$count);
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->assign("typeid",$typeid);
            $this->assign("sign",$sign);
            $this->assign("spec",$spec);
            $this->assign("cat",$cat);

            if($typeid == 1){
                $this->display('wxlist');
            }
            if($typeid == 2){
                $this->display('wblist');
            }
            if($typeid == 3){
                $platcat = M('goodscat')->where("isshow = 1 and typeid = 0")->select();
                $this->assign("platcat",$platcat);
                $this->display('lvlist');
            }
        }
    }

    /**
     * 商品搜索
     */
    public function search(){
        if(IS_POST){

        }
    }
}