<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/5
 * Time: 13:22
 */
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
    public $admin_id = 0;

    //初始化操作
    public function _initialize(){
        if(in_array(ACTION_NAME,array('login','lgout','verify')) || in_array(CONTROLLER_NAME,array('Ueditor','Uploadify'))){

        }else{
            if(session('admin_id') > 0 ){
                $this->admin_id = session('admin_id');
                return true;
            }else{
                $this->error('请先登陆',U('Admin/login'),1);
            }
        }
    }
}