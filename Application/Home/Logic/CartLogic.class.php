<?php
namespace Home\Logic;
use Think\Model\RelationModel;
class CartLogic extends RelationModel{
    /*
     * 显示购物车商品详情
     */
    function cart_goods($cart){
        if(!empty($cart)){
            foreach($cart as $k=>$v){
                $goods=M('goods')->where("id = {$v['goodsid']}")->find();
                $specprice=M('specprice')->where("goodsid = {$v['goodsid']}")->select();
                $goodsspec=M('goodsspec')->select();
                foreach($specprice as $g=>$o){
                    $specprice[$g]['specname']=$goodsspec[$o['specid']]['specname'];
                }
                $goods['spec']=$specprice;
                $cart[$k]['goods']=$goods;
            }
            return $cart;
        }
    }

    /*
     * 新增订单
     */
    function add_order($post,$file,$userid){
        $goodsprice = 0;
        $time=time();

        foreach($post as $k => $v){
            $goodsprice = $goodsprice+$v['goodsprice'];
        }

        //插入订单
        $order['ordersn'] = ordersn();
        $order['userid'] = $userid;
        $order['goodsprice'] = $goodsprice;
        $order['addtime'] = $time;
        $orderid=M('order')->filter('strip_tags')->add($order);

        if($orderid){
            //插入订单物品
            foreach($post as $k => $v){
                $goodsid[] = $v['goodsid'];
                $file_key = "goods".$v['goodsid'];
                $goods['orderid'] = $orderid;
                $goods['hzid'] = implode(',',$v['hzid']);
                $goods['content'] = trim($v['content']);
                $goods['gaptime'] = $v['begin']."至".$v['over'];
                $goods['backtime'] = $v['back'];
                $goods['spec'] = $v['spec'];
                $goods['addtime'] = $time;
                $goods['goodsprice'] = $v['goodsprice'];
                $goods['goodsid'] = $v['goodsid'];

                $fileid=array();
                foreach($file[$file_key] as $g){
                    $data['showname'] = $g['savename'];
                    $data['savename'] = $g['savename'];
                    $data['path'] = "/Public/upload/files/".$g['savepath'].$g['savename'];
                    $data['addtime'] = $time;
                    $data['userid'] = $userid;
                    $fileid[] = M('files')->add($data);
                }

                $goods['files'] = implode(',',$fileid);
                $ordergoods[] = $goods;
            }

            $res1 = M('ordergoods')->filter('strip_tags')->addAll($ordergoods);
            if($res1){
                //插入订单操作日记
                $action['orderid']=$orderid;
                $action['logtime']=$time;
                $action['actionuser']=$userid;
                $res2=M('orderaction')->add($action);

                if($res2){
                    //删除购物车信息
                    $goodsid = implode(',',$goodsid);
                    M('cart')->where(array('goodsid '=>array('in',$goodsid)))->delete();

                    $return['status'] = 1;
                    $return['orderid'] = $orderid;
                    return $return;
                }
            }
        }
    }
}