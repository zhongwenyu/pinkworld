<?php
namespace Admin\Controller;
use Think\Page;

class MemberController extends BaseController{

    /*
     * 会员列表
     */
    public function mblist(){
        $Member = M('User');
        $count = $Member->count();
        $Page = new Page($count,25);
        $show = $Page->show();
        $list = $Member->order('regtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    /*
     * 会员密码修改
     */
    public function change(){
        if(IS_POST){
            I('password') && $data['password'] = encrypt(I('password'));
            $data['username'] = trim(I('username'));
            $data['phone'] = trim(I('phone'));
            $data['email'] = trim(I('email'));
            $userid = I('userid');
            $res=M('user')->where("id = $userid")->save($data);

            if($res){
                $return['msg']="修改成功！";
                $return['url']=U('Admin/Member/mblist');
            }
            exit(json_encode($return));
        }else{
            $userid = I('id');
            $user = M('user')->where("id = $userid")->find();
            $this->assign("user",$user);
            $this->assign("userid",$userid);
            $this->display();
        }
    }

    /*
     * 会员密码修改
     */
}