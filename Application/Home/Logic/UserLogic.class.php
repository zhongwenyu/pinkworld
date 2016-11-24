<?php
namespace Home\Logic;
use Think\Model\RelationModel;
class UserLogic extends RelationModel{
    /*
     * 显示购物车商品详情
     */
    function get_order_goods($orderid){
        $sql = "SELECT og.*,g.name,g.typeid,g.pic,g.isrz FROM ordergoods og LEFT JOIN goods g ON g.id = og.goodsid WHERE og.orderid = ".$orderid;
        $goods_list = $this->query($sql);
        foreach($goods_list as $k => $v){
            if(!empty($v['spec'])){
                $specid = $this->query("select specid from specprice where id = {$v['spec']}");
                $goods_list[$k]['specid'] = $specid[0]['specid'];
            }
        }
        return $goods_list;
    }
}