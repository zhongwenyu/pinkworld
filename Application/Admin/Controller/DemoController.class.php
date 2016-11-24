<?php
namespace Admin\Controller;
use Think\Controller;
class DemoController extends Controller {
    public function index(){
        $pp= I('get.id');
        if(!empty($pp) || $pp == 0){
            p(111);
        }
    }
}