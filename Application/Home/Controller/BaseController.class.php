<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public $user_id = 0;
    public $user = array();
    public $cart = array();

    /*
     * 初始化操作
     */
    public function _initialize(){
        if(session('user_id') > 0 ){
            $user_id = session('user_id');
            $user = M('user')->where("id = $user_id")->find();
            $cart = M('cart')->where("userid = $user_id")->select();
            $this->user = $user;
            $this->user_id = $user['id'];
            $this->cart = $cart;
            $this->assign("user",$user);
            $this->assign("cart",$cart);
        }
        $this->public_assign();
    }

    /**
     * 保存网站信息
     */
    public function public_assign(){
        $config = M('config')->select();
        $config = return_config($config);
        $this->assign('config',$config);
    }
}