<?php
namespace Home\Controller;
use Home\Logic\CartLogic;

class CartController extends CommonController {
    /**
     * ajax加载购物车列表
     */
    public function get_cart(){
        if(IS_POST){
            $CartLogic = new CartLogic();
            $cart=$CartLogic->cart_goods($this->cart);
            $this->assign('cart',$cart);
            $this->display('ajax_cart');
        }
    }

    /**
     * 加入购物车
     */
    public function add_cart(){
        if(IS_POST){
            if(session('user_id') > 0 ){
                $user_id =session('user_id');
            }
            if(!isset($user_id)){
                $return['msg'] = "请先登录！";
                $return['url'] = U('Home/User/regist');
                exit(json_encode($return));
            }

            $goodsid = I('post.goodsid');
            if(isset($goodsid)){
                $isexit = M('cart')->where("userid = $user_id and goodsid = $goodsid")->find();
                if($isexit){
                    $return['msg'] = "已添加过该物品！";
                    exit(json_encode($return));
                }else{
                    $add['userid'] = $user_id;
                    $add['goodsid'] = $goodsid;
                    $add['typeid'] = I('post.typeid');
                    $add['addtime'] = time();

                    $res = M('cart')->add($add);
                    if($res){
                        $return['status'] = 1;
                        $return['msg'] = "添加成功！";
                        exit(json_encode($return));
                    }
                }
            }
        }
    }

    /**
     * 批量加入购物车
     */
    public function all_cart(){
        if(IS_POST){
            if(session('user_id') > 0 ){
                $user_id =session('user_id');
            }
            if(!isset($user_id)){
                $return['msg'] = "请先登录！";
                $return['url'] = U('Home/User/regist');
                exit(json_encode($return));
            }

            $goodsid = I('post.goodsid');
            if(isset($goodsid)){
                $typeid = I('post.typeid');
                $time = time();
                foreach($goodsid as $k => $v){
                    $isexit = M('cart')->where("userid = $user_id and goodsid = $v")->find();
                    if(!$isexit){
                        $add['userid'] = $user_id;
                        $add['goodsid'] = $v;
                        $add['typeid'] = $typeid;
                        $add['addtime'] = $time;
                        $data[] = $add;
                    }
                }

                $res = M('cart')->addAll($data);
                if($res){
                    $return['status'] = 1;
                    $return['num'] = count($data);
                    $return['msg'] = "添加成功！";
                    exit(json_encode($return));
                }else{
                    $return['msg'] = "已添加过该物品！";
                    exit(json_encode($return));
                }
            }
        }
    }

    /**
     * 删除购物车
     */
    public function del_cart(){
        if(IS_POST){
            I('act') && $act = I('act');
            if($act == 'all'){
                $res=M('cart')->where("userid=$this->user_id")->delete();
                if($res){
                    exit(json_encode(array('status'=>1)));
                }
            }else{
                $id = I('id');
                if(isset($id)){
                    $res=M('cart')->where("id=$id")->delete();
                    if($res){
                        exit(json_encode(array('status'=>1)));
                    }
                }
            }
        }
    }

    /**
     * 购物车结算
     */
    public function cart(){
        $CartLogic = new CartLogic();
        $cart_goods=$CartLogic->cart_goods($this->cart);
        $spec = M('goodsspec')->select();
        /*$hzmode=M('hzmode')->select();
        $hzmode=convert_arr_key($hzmode,'id');
        foreach($cart_goods as $k => $v){
            if(!empty($v['goods']['hzid'])){
                $arr=array();
                $hzid=explode(',',$v['goods']['hzid']);
                foreach($hzid as $g){
                    $arr[]=$hzmode[$g];
                }
                $cart_goods[$k]['goods']['hzid']=$arr;
            }
        }*/

        $this->assign('spec',$spec);
        $this->assign('cart_goods',$cart_goods);
        $this->display();
    }

    /**
     * 订单处理
     */
    public function order_handle(){
        if(IS_POST){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('gif','png','bmp','jpg','jpeg','doc','docx','xlsx','pptx');// 设置附件上传类型
            $upload->rootPath  =     './Public/upload/files/'; // 设置附件上传根目录
            $upload->savePath  =     date('Y') . '/' . date('m') . '/'; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            $info = file_handle($info);

            $CartLogic = new CartLogic();
            $return = $CartLogic->add_order($_POST,$info,$this->user_id);
            $orderid = $return['orderid'];

            if($return['status']){
                $this->redirect('Cart/pay',array('orderid'=>$orderid));
            }

            $this->display();
        }
    }

    /**
     * 订单支付
     */
    public function pay(){
        I('get.orderid') && $orderid = I('get.orderid');

        if(isset($orderid)){
            $order = M('order')->where("id = $orderid")->find();

            $this->assign("order",$order);
            $this->display();
        }
    }

    /**
     * 查看支付结果
     */
    public function ispay(){
        if(IS_POST){
            I('orderid') && $orderid = I('orderid');
            if($orderid){
                $res = M('order')->where("id = $orderid")->find();
                $paystatus = $res['paystatus'];
                exit(json_encode(array('status'=>$paystatus)));
            }
        }
    }
}