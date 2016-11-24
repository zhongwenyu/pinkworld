<?php
namespace Home\Controller;
use Home\Logic\UserLogic;
use Think\Verify;
use Think\Page;

class UserController extends CommonController {
    /**
     * 会员登录
     */
    public function login(){
        if(IS_POST){
            //验证码验证
            if(!check_code(I('post.verify'))){
                exit(json_encode(array('msg'=>'验证码输入错误！')));
            }

            $condition['account'] = I('post.account');
            $condition['password'] = I('post.password');
            if(!empty($condition['account']) && !empty($condition['password'])){
                $condition['password']=encrypt($condition['password']);
                $user=M('user')->where($condition)->find();
                if(is_array($user)){
                    session('user_id',$user['id']);
                    session('user',$user);
                    $return['status'] = 1;
                    $return['msg'] = "登录成功！";
                }else{
                    $return['status'] = 0;
                    $return['msg'] = "账号或密码输入错误！";
                }
                exit(json_encode($return));
            }
        }else{
            $this->display();
        }
    }

    /**
     * 服务条款
     */
    public function rule(){
        $this->display();
    }

    /**
     * 退出
     */
    public function lgout(){
        session_unset();
        session_destroy();
        $this->redirect('Index/index');
    }

    /**
     * 验证码判断获取
     */
    public function verify(){
        $config=array(
            'length' => 4,  //位数
            'fontSize' => 30,  //字体大小
            'useNoise' => false,  //是否开启杂点
            'useCurve' => false,  //是否开启混淆曲线
            'bg' => array(238,238,238),  //背景颜色
            'reset'     =>  false,
            'fontttf' => '5.ttf'
        );
        $Verify = new Verify($config);
        $Verify->entry();
    }

    /**
     * 会员注册
     */
    public function regist(){
        if(IS_POST){
            //验证码验证
            if(!check_code(I('post.verify'))){
                exit(json_encode(array('msg'=>'验证码输入错误！')));
            }

            $add=array();
            I('post.account') && $add['account'] = trim(I('post.account'));
            I('post.password') && $add['password'] = encrypt(trim(I('post.password')));
            I('post.username') && $add['username'] = trim(I('post.username'));
            I('post.phone') && $add['phone'] = trim(I('post.phone'));
            I('post.email') && $add['email'] = trim(I('post.email'));
            $add['regtime'] = time();

            $res = M('user')->add($add);
            if($res){
                session('user_id',$res);
                $return['url'] = session('from_url') ? session('from_url') : U('Home/User/index');
                $return['msg'] = "注册成功！";
                exit(json_encode($return));
            }

        }else{
            $this->display();
        }
    }

    /**
     * 会员中心
     */
    public function index(){
        $this->display();
    }

    /**
     * 会员中心首页
     */
    public function firstpage(){
        $count1 = M('order')->where("paystatus  = 0")->count();
        $count2 = M('order')->where("paystatus  = 1 and isback = 0")->count();
        $count3 = M('order')->where("isback = 1")->count();

        $this->assign("count1",$count1);
        $this->assign("count2",$count2);
        $this->assign("count3",$count3);
        $this->display();
    }

    /**
     * 订单列表
     */
    public function orderlist(){
        //搜索条件初始化
        $where = "isdel = 0";
        $paystatus = I('get.paystatus');
        if($paystatus == 0 && $paystatus != ""){
            $where .= " and paystatus = $paystatus";
        }
        if(isset($_GET['isback'])){
            $isback = I('isback');
            $where .= " and paystatus = 1 and isback = $isback";
        }

        $Order = M('order');
        $count = $Order->where($where)->count();
        $Page = new Page($count,15);
        $show = $Page->show();
        $list = $Order->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $UserLogic = new UserLogic();
        foreach($list as $k => $v){
            $order_goods = $UserLogic->get_order_goods($v['id']);
            if($v['paystatus'] == 0){
                $list[$k]['status'] = 0;
            }else{
                if($v['isback'] == 0){
                    $list[$k]['status'] = 1;
                }else if($v['isback'] == 1){
                    $list[$k]['status'] = 2;
                }
            }

            $list[$k]['goods'] = $order_goods;
        }

        $goodsspec = M('goodsspec')->select();
        $goodsspec = convert_arr_key($goodsspec,'id');

        $this->assign("goodsspec",$goodsspec);
        $this->assign("list",$list);
        $this->assign('page',$show);
        $this->display();
    }

    /**
     * 资料编辑
     */
    public function useredit(){
        if(IS_POST){
            I('username') && $data['username'] = I('username');
            I('phone') && $data['phone'] = I('phone');
            I('email') && $data['email'] = I('email');

            $res = M('user')->where("id = $this->user_id")->save($data);
            if($res){
                $return['msg'] = "编辑成功！";
                exit(json_encode($return));
            }

        }else{
            $user=M('user')->where("id = $this->user_id")->find();

            $this->assign("user",$user);
            $this->display();
        }
    }

    /**
     * 密码修改
     */
    public function pwdchange(){
        if(IS_POST){
            I('password') && $data['password'] = encrypt(I('password'));

            $res = M('user')->where("id = $this->user_id")->save($data);
            if($res){
                $return['msg'] = "修改成功！";
                exit(json_encode($return));
            }

        }
        $this->display();
    }
}