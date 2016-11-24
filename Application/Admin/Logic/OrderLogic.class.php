<?php
namespace Admin\Logic;
use Think\Model\RelationModel;
class OrderLogic extends RelationModel{
    /*
     * 获取订单信息
     */
    function get_order_info($orderid){
        $order = M('order')->where("id = $orderid")->find();
        $user = M('user')->where("id = {$order['userid']}")->find();
        $ordergoods = M()->query("SELECT og.*,g.name,g.typeid,g.pic,g.isrz FROM ordergoods og LEFT JOIN goods g ON g.id = og.goodsid WHERE og.orderid = ".$orderid);

        foreach($ordergoods as $k => $v){
            if(!empty($v['spec'])){
                $spec = M()->query("SELECT g.specname FROM goodsspec g LEFT JOIN specprice s ON g.id = s.specid WHERE s.id = ".$v['spec']);
                $ordergoods[$k]['spec'] = $spec[0]['specname'];
            }

            if(!empty($v['hzid'])){
                $hzmode = M()->query("SELECT hzname from hzmode where id in (".$v['hzid'].")");
                $ordergoods[$k]['hzid'] = $hzmode;
            }

            $ordergoods[$k]['files'] = explode(',',$v['files']);
        }

        $order['goods'] = $ordergoods;
        $order['user'] = $user;
        return $order;
    }
}