<?php
namespace Admin\Controller;
use Think\Page;
use Admin\Logic\OrderLogic;

class OrderController extends BaseController
{

    /*
     * 订单列表
     */
    public function orderlist()
    {
        $paystatus = I('get.pay');
        $orderstatus = I('get.status');

        $where = "isdel = 0 and orderstatus = $orderstatus and paystatus = $paystatus";
        $Order = M('order'); // 实例化User对象
        $count = $Order->where($where)->count();// 查询满足要求的总记录数
        $Page  = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show  = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $orderlist = $Order->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        foreach ($orderlist as $k => $v) {
            $user = M('user')->where("id = {$v['userid']}")->find();
            $orderlist[$k]['user'] = $user;
        }
        $this->assign("paystatus", $paystatus);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("orderstatus", $orderstatus);
        $this->assign("orderlist", $orderlist);
        $this->display();
    }

    /*
     * 订单详情
     */
    public function orderdetail()
    {
        $paymode = C('PAYMODE');

        I('id') && $orderid = I('id');
        if (isset($orderid)) {
            $OrderLogic = new OrderLogic();
            $order = $OrderLogic->get_order_info($orderid);

            $this->assign("order", $order);
        }

        $this->assign("paymode",$paymode);
        $this->display();
    }

    /*
     * 新增订单
     */
    public function add_order()
    {
        $this->display();
    }

    /*
     * 订单处理
     */
    public function order_handle()
    {
        if (IS_POST) {
            $orderid = I('orderid');
            $statusname = I('statusname');
            $status = I('status');

            if($statusname == 'paystatus' && $status == 0){
                $data['paystatus'] = 1;
                $return['msg'] = "订单已支付！";
                $return['url'] = U('Admin/Order/orderlist',array('status'=>0,'pay'=>1));
            }

            if ($statusname == 'orderstatus' && $status == 0) {
                $data['orderstatus'] = 1;
                $return['msg'] = "订单已处理！";
                $return['url'] = U('Admin/Order/orderlist', array('status' => 1,'pay'=>1));
            }

            if ($statusname == 'orderstatus' && $status == 1) {
                $data['orderstatus'] = 2;
                $return['msg'] = "订单已执行！";
                $return['url'] = U('Admin/Order/orderlist', array('status' => 2,'pay'=>1));
            }

            $res = M('order')->where("id = $orderid")->save($data);
            if ($res) {
                exit(json_encode($return));
            } else {
                exit(json_encode(array('msg' => "系统繁忙，请联系管理员！")));
            }
        }
    }

    /*
     * 填写反馈
     */
    public function add_feedback(){
        if(IS_POST){
            $orderid = I('orderid');
            $isback = M('order')->where("id = $orderid")->find();

            if(!$isback['isback'] && $isback['orderstatus'] == 2){
                $data['feedback'] = stripcslashes($_POST['feedback']);
                $data['isback'] = 1;
                $res = M('order')->where("id = $orderid")->save($data);
                if($res){
                    exit(json_encode(array('msg'=>"添加成功！",'url'=>U('Admin/Order/orderlist',array('status'=>2)))));
                }else{
                    exit(json_encode(array('msg'=>'添加失败')));
                }
            }

        }else{
            I('get.id')  && $orderid = I('get.id');
            if(!empty($orderid)){
                $this->assign("orderid",$orderid);
            }
            $this->display();
        }
    }
}