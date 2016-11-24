<?php
namespace Admin\Controller;

class ManagerController extends BaseController{

    /*
     * 公司信息
     */
    public function data(){
        if(IS_POST){
            $post = $_POST;

            foreach($post as $k => $v){
                $v = htmlspecialchars(trim($v));  //输入过滤

                $res = M('config')->where("keyname = '{$k}'")->find();

                if($res){
                    $data['keyval'] = $v;
                    M('config')->where("id = {$res['id']}")->save($data);
                }else{
                    $data['keyname'] = $k;
                    $data['keyval'] = $v;
                    M('config')->add($data);
                }
            }

            exit(json_encode(array('msg'=>"编辑成功!")));
        }else{
            $config = M('config')->select();
            $config = return_config($config);
            $this->assign('config',$config);
            $this->display();
        }
    }

    /*
     * 密码修改
     */
    public function pwdchange(){
        if(IS_POST){
            I('oldpassword') && $oldpassword = I('oldpassword');

            if(isset($oldpassword)){
                $oldpassword = encrypt($oldpassword);
                $pwd = M('admin')->where("admin_id = $this->admin_id")->find();

                if($oldpassword != $pwd['password']){
                    $return['msg'] = "旧密码输入错误！";
                }else{
                    $password = I('password');
                    if(!empty($password)){
                        $data['password'] = encrypt($password);
                        $res = M('admin')->where("admin_id = $this->admin_id")->save($data);
                        if($res){
                            $return['msg'] = "密码修改成功！";
                        }else{
                            $return['msg'] = "系统繁忙，请联系管理员！";
                        }
                    }
                }

                exit(json_encode($return));
            }

        }else{
            $this->display();
        }
    }
}