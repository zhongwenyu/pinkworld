<?php
namespace Home\Logic;
use Think\Model\RelationModel;
class GoodsLogic extends RelationModel{
    /*
     * 首页商品显示
     */
    function index_goods($typeid){

        $cat = M('goodscat')->where("isshow = 1 and typeid = $typeid")->order("sort asc")->limit(6)->select();
        foreach($cat as $k => $v){
            $goods = M('goods')->where("isshow = 1 and catid = {$v['id']}")->order("fans desc")->limit(8)->select();
            $cat[$k]['goods'] =  $goods;
        }
        return $cat;
    }

    /*
     * 商品列表显示
     */
    function goods_list(){

    }
}