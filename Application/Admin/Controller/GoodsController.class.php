<?php
namespace Admin\Controller;
use Think\Page;
use Admin\Logic\GoodsLogic;

class GoodsController extends BaseController {

    /*
     * 商品分类
     */
    public function goods_cat(){
        $goodscat=M('goodscat')->order("sort asc")->select();
        $platcat=M('goodscat')->where("typeid = 0 and isshow =1")->order("sort asc")->select();
        $goodstype=M('goodstype')->select();
        $list=two_merge($goodstype,$goodscat,'typeid');

        $this->assign("list",$list);
        $this->assign("platcat",$platcat);

        $this->display();
    }

    /*
     * 添加编辑分类
     */
    public function add_cat(){
        if(IS_POST){
            $data['catname']=trim(I('catname'));
            $data['cattitle']=trim(I('cattitle'));
            $data['catkeyword']=trim(I('catkeyword'));
            $data['catinfo']=trim(I('catinfo'));
            $data['typeid']=I('typeid',1);
            $data['isshow']=I('isshow',1);
            $data['sort']=I('sort',100);
            I('img') && $data['img'] = I('img');
            $action=I('action');
            if($action == 'add'){
                $res=M('goodscat')->add($data);
                if($res){
                    $return['msg']="添加成功！";
                    $return['url']=U('Admin/Goods/add_cat');
                }else{
                    $return['msg']="添加失败！";
                }
            }
            if($action == 'edit'){
                $catid=I('catid');
                $res=M('goodscat')->where("id=$catid")->save($data);
                if($res){
                    $return['msg']="编辑成功！";
                    $return['url']=U('Admin/Goods/goods_cat');
                }else{
                    $return['msg']="编辑失败！";
                }
            }

            exit(json_encode($return));
        }else{
            $action=I('get.act','add');
            $catid=I('get.catid',0);
            $catdetail=array();
            if($action == 'edit'){
                $catdetail=M('goodscat')->where("id=$catid")->find();
            }

            $goodstype=M('goodstype')->select();
            $this->assign("action",$action);
            $this->assign("catid",$catid);
            $this->assign("catdetail",$catdetail);
            $this->assign("goodstype",$goodstype);
            $this->display();
        }
    }

    /*
     * 商品属性
     */
    public function goods_spec(){
        $goodstype=M('goodstype')->select();
        $goodsspec=M('goodsspec')->order("sort asc")->select();
        $list=two_merge($goodstype,$goodsspec,'typeid');

        $this->assign("list",$list);
        $this->display();
    }

    /*
     * 添加编辑属性
     */
    public function add_spec(){
        if(IS_POST){
            $data['specname']=trim(I('specname'));
            $data['typeid']=I('typeid',1);
            $data['isshow']=I('isshow',1);
            $data['sort']=I('sort',100);
            $action=I('action');
            if($action == 'add'){
                $res=M('goodsspec')->add($data);
                if($res){
                    $return['msg']="添加成功！";
                    $return['url']=U('Admin/Goods/add_type');
                }else{
                    $return['msg']="添加失败！";
                }
            }
            if($action == 'edit'){
                $id=I('id');
                $res=M('goodsspec')->where("id=$id")->save($data);
                if($res){
                    $return['msg']="编辑成功！";
                    $return['url']=U('Admin/Goods/goods_spec');
                }else{
                    $return['msg']="编辑失败！";
                }
            }

            exit(json_encode($return));
        }else{
            $action=I('get.act','add');
            $id=I('get.id',0);
            $specdetail=array();
            if($action == 'edit'){
                $specdetail=M('goodsspec')->where("id=$id")->find();
            }

            $goodstype=M('goodstype')->select();
            $this->assign("action",$action);
            $this->assign("id",$id);
            $this->assign("specdetail",$specdetail);
            $this->assign("goodstype",$goodstype);
            $this->display();
        }
    }

    /*
     * 商品下标
     */
    public function goods_sign(){
        $goodssign=M('goodssign')->order("sort asc")->select();
        $this->assign("goodssign",$goodssign);
        $this->display();
    }

    /*
     * 添加编辑下标
     */
    public function add_sign(){
        if(IS_POST){
            $data['signname']=trim(I('signname'));
            $data['addtime']=time();
            $data['sort']=I('sort',100);
            $action=I('action');
            if($action == 'add'){
                $res=M('goodssign')->add($data);
                if($res){
                    $return['msg']="添加成功！";
                    $return['url']=U('Admin/Goods/add_sign');
                }else{
                    $return['msg']="添加失败！";
                }
            }
            if($action == 'edit'){
                $signid=I('signid');
                $res=M('goodssign')->where("id=$signid")->save($data);
                if($res){
                    $return['msg']="编辑成功！";
                    $return['url']=U('Admin/Goods/goods_sign');
                }else{
                    $return['msg']="编辑失败！";
                }
            }

            exit(json_encode($return));
        }else{
            $action=I('get.act','add');
            $signid=I('get.signid',0);
            $signdetail=array();
            if($action == 'edit'){
                $signdetail=M('goodssign')->where("id=$signid")->find();
            }

            $this->assign("action",$action);
            $this->assign("signid",$signid);
            $this->assign("signdetail",$signdetail);
            $this->display();
        }
    }

    /*
     * 合作方式
     */
    public function hzmode(){
        $goodstype=M('goodstype')->select();
        $goodsspec=M('hzmode')->select();
        $list=two_merge($goodstype,$goodsspec,'typeid');

        $this->assign("list",$list);
        $this->display();
    }

    /*
    * 添加编辑合作方式
    */
    public function add_hzmode(){
        if(IS_POST){
            $data['hzname']=trim(I('hzname'));
            $data['typeid']=I('typeid',1);
            $action=I('action');
            if($action == 'add'){
                $res=M('hzmode')->add($data);
                if($res){
                    $return['msg']="添加成功！";
                    $return['url']=U('Admin/Goods/add_hzmode');
                }else{
                    $return['msg']="添加失败！";
                }
            }
            if($action == 'edit'){
                $id=I('id');
                $res=M('hzmode')->where("id=$id")->save($data);
                if($res){
                    $return['msg']="编辑成功！";
                    $return['url']=U('Admin/Goods/hzmode');
                }else{
                    $return['msg']="编辑失败！";
                }
            }

            exit(json_encode($return));
        }else{
            $action=I('get.act','add');
            $id=I('get.id',0);
            $modedetail=array();
            if($action == 'edit'){
                $modedetail=M('hzmode')->where("id=$id")->find();
            }

            $goodstype=M('goodstype')->select();
            $this->assign("action",$action);
            $this->assign("id",$id);
            $this->assign("modedetail",$modedetail);
            $this->assign("goodstype",$goodstype);
            $this->display();
        }
    }

    /*
     * 初始化编辑器配置
     * 本编辑器参考 地址 http://fex.baidu.com/ueditor/
     */
    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'weixin'))); // 图片上传目录
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'article'))); //  不知道啥图片
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'article'))); // 文件上传s
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'article')));  //  图片流
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'article'))); // 远程图片管理
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'article'))); // 图片管理
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'article'))); // 视频上传
        $this->assign("URL_Home","");
    }

    /*
     * 搜索商品
     */
    public function goods_search(){
        if(IS_POST){
            $key_word=I('key_word');
            $type=I('type',1);
            if(isset($key_word)){
                $goods=M()->query("select * from goods where name like '%$key_word%'");
                $this->assign('goods',$goods);
                if($type == 1){
                    $this->display('ajax_weixin');
                }elseif($type == 2){
                    $this->display('ajax_weibo');
                }elseif($type == 3){
                    $this->display('ajax_live');
                }
            }
        }
    }

    /*
     * 商品列表
     */
    private function goods(){
        $typeid=I('typeid',1);
        $Goods = M('goods'); // 实例化User对象
        $count = $Goods->where("typeid = $typeid")->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $goods = $Goods->where("typeid = $typeid")->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $goodssign=M('goodssign')->select();
        $goodssign=convert_arr_key($goodssign,'id');

        foreach($goods as $o => $v){
            if(!empty($v['sign'])){
                $sign_arr=explode(',',$v['sign']);
                $goods[$o]['sign']=$sign_arr;
            }
        }

        $this->assign('goodssign',$goodssign);
        $this->assign('goods',$goods);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
    }

    /*
     * 微信公众号
     */
    public function weixin(){
        $this->goods();
        $this->display();
    }

    /*
     * 新浪微博
     */
    public function weibo(){
        $this->goods();
        $this->display();
    }

    /*
     * 视频直播
     */
    public function live(){
        $this->goods();
        $this->display();
    }

    /*
     * 新增商品
     */
    private function add_goods(){
        $typeid=I('typeid',1);
        $goodscat=M('goodscat')->where("typeid = $typeid")->order("sort asc")->select();
        $goodsspec=M('goodsspec')->where("typeid = $typeid")->order("sort asc")->select();
        $goodssign=M('goodssign')->order("sort asc")->select();
        $hzmode=M('hzmode')->where("typeid = $typeid")->select();

        $action=I('act');
        if($action == 'edit'){
            $goodsid=I('id');
            $goods=M('goods')->where("id = $goodsid")->find();
            $specprice=M('specprice')->where("goodsid = $goodsid")->select();
            $specprice = convert_arr_key($specprice,'specid');
            $this->assign("goodsid",$goodsid);
            $this->assign("specprice",$specprice);
            $this->assign("goods",$goods);
        }

        $this->assign("action",$action);
        $this->assign("hzmode",$hzmode);
        $this->assign("goodscat",$goodscat);
        $this->assign("goodsspec",$goodsspec);
        $this->assign("goodssign",$goodssign);
    }

    /*
     * 新增微信产品
     */
    public function add_weixin(){
        if(IS_POST){
            $GoodsLogic = new GoodsLogic();
            $return=$GoodsLogic->add_goods($_POST,1,U('Admin/Goods/add_weixin'),U('Admin/Goods/weixin'));
            exit(json_encode($return));
        }else{
            $this->add_goods();
            $this->initEditor(); //Ueditor编辑器
            $this->display();
        }
    }

    /*
     * 新增新浪微博
     */
    public function add_weibo(){
        if(IS_POST){
            $GoodsLogic = new GoodsLogic();
            $return=$GoodsLogic->add_goods($_POST,2,U('Admin/Goods/add_weibo'),U('Admin/Goods/weibo'));
            exit(json_encode($return));
        }else{
            $this->add_goods();
            $this->initEditor(); //Ueditor编辑器
            $this->display();
        }
    }

    /*
     * 新增视频直播
     */
    public function add_live(){
        if(IS_POST){
            $GoodsLogic = new GoodsLogic();
            $return=$GoodsLogic->add_goods($_POST,3,U('Admin/Goods/add_live'),U('Admin/Goods/live'));
            exit(json_encode($return));
        }else{
            $this->add_goods();
            $platcat = M('goodscat')->where("isshow = 1 and typeid = 0")->select();
            $this->assign("platcat",$platcat);
            $this->initEditor(); //Ueditor编辑器
            $this->display();
        }
    }

}