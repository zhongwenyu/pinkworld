<?php
namespace Admin\Controller;
use Think\Verify;
class AdminController extends BaseController {
    public function index(){
        $this->display();
    }

    //后台登录
    public function login(){
        if(session('?admin_id') && session('admin_id')>0){
            $this->error("您已登录",U('Admin/Index/index'));
        }

        if(IS_POST){
            //验证码验证
            if(!check_code(I('post.verify'))){
                exit(json_encode(array('status'=>3,'msg'=>'验证码输入错误！')));
            }

            //账号密码验证
            $condition['username'] = I('post.username');
            $condition['password'] = I('post.password');
            if(!empty($condition['username']) && !empty($condition['password'])){
                $condition['password']=encrypt($condition['password']);
                $admin_info=M('admin')->where($condition)->find();
                if(is_array($admin_info)){
                    session('admin_id',$admin_info['admin_id']);
                    session('admin_name',$admin_info['username']);
                    $url = session('from_url') ? session('from_url') : U('Admin/Index/index');
                    exit(json_encode(array('status'=>1,'url'=>$url)));
                }else{
                    exit(json_encode(array('status'=>2,'msg'=>"账号密码输入错误！")));
                }
            }

        }

        $this->display();
    }

    //退出登录
    public function lgout(){
        session_unset();
        session_destroy();
        $this->success("退出成功",U('Admin/login'));
    }

    //验证码获取
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
}