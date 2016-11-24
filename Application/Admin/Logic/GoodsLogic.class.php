<?php
namespace Admin\Logic;
use Think\Model\RelationModel;
class GoodsLogic extends RelationModel{
    /*
     * 新增商品
     */
    function add_goods($post,$typeid,$addurl,$editurl){
        $data=array();
        $addtime=time();
        if(isset($post['name'])){
            $data['name'] = trim($post['name']);
        }
        if(isset($post['contents'])){
            $data['contents'] = stripcslashes($post['contents']);
        }
        if(isset($post['wechat'])){
            $data['wechat'] = trim($post['wechat']);
        }
        if(isset($post['cat'])){
            $data['catid'] = implode(',',$post['cat']);
        }
        if(isset($post['sign'])){
            $data['sign'] = implode(',',$post['sign']);
        }
        if(isset($post['hzid'])){
            $data['hzid'] = implode(',',$post['hzid']);
        }
        if(isset($post['platcat'])){
            $data['platcatid'] = implode(',',$post['platcat']);
        }
        if(isset($post['fans'])){
            $data['fans'] = trim($post['fans']);
        }
        if(isset($post['keyword'])){
            $data['keyword'] = trim($post['keyword']);
        }
        if(isset($post['keytitle'])){
            $data['keytitle'] = trim($post['keytitle']);
        }
        if(isset($post['keyinfo'])){
            $data['keyinfo'] = trim($post['keyinfo']);
        }
        if(isset($post['updatenum'])){
            $data['updatenum'] = trim($post['updatenum']);
        }
        if(isset($post['keyimg'])){
            $data['keyimg'] = $post['keyimg'];
        }
        if(isset($post['certify'])){
            $data['certify'] = trim($post['certify']);
        }
        if(isset($post['instro'])){
            $data['instro'] = trim($post['instro']);
        }
        if(isset($post['pic'])){
            $data['pic'] = $post['pic'];
        }
        if(isset($post['ischecked'])){
            $data['ischecked'] = $post['ischecked'];
        }
        if(isset($post['code'])){
            $data['code'] = $post['code'];
        }
        if(isset($post['isrz'])){
            $data['isrz'] = $post['isrz'];
        }
        if(isset($post['isshow'])){
            $data['isshow'] = $post['isshow'];
        }
        if(isset($post['isyy'])){
            $data['isyy'] = $post['isyy'];
        }
        if(isset($post['fansex'])){
            $data['fansex'] = $post['fansex'];
        }
        if(isset($post['sex'])){
            $data['sex'] = $post['sex'];
        }
        if(isset($post['liked'])){
            $data['liked'] = trim($post['liked']);
        }
        if(isset($post['comment'])){
            $data['comment'] = trim($post['comment']);
        }
        if(isset($post['age'])){
            $data['age'] = trim($post['age']);
        }
        if(isset($post['reward'])){
            $data['reward'] = trim($post['reward']);
        }
        if(isset($post['link'])){
            $data['link'] = trim($post['link']);
        }
        if(isset($post['pjgz'])){
            $data['pjgz'] = trim($post['pjgz']);
        }
        if(isset($post['zggz'])){
            $data['zggz'] = trim($post['zggz']);
        }
        if(isset($post['reading'])){
            $data['reading'] = trim($post['reading']);
        }
        if(isset($post['area'])){
            $data['area'] = $post['area'];
        }
        $data['typeid'] = $typeid;
        $data['addtime'] = $addtime;

        if($post['action'] == 'add'){
            $readings=array();
            $price=array();
            $goodsspec=$post['spec'];
            if(isset($post['readings']) && isset($goodsspec)){
                $readings = $post['readings'];
                foreach($goodsspec as $k => $v){
                    //保存多图文阅读量第一条以便搜索
                    if($v == 6 && $readings[$k]){
                        $data['firstreading'] = $readings[$k];
                    }
                }
            }
            if(isset($post['price'])){
                $price = $post['price'];

                //参考报价取最小
                foreach($price as $k => $v){
                    $imprice[] = (int)($v);
                }
                $data['ckprice'] = min($imprice);
            }

            //插入商品数据
            $goodsid=M('goods')->add($data);


            if(isset($goodsspec)){
                foreach($goodsspec as $k => $v){
                    $dataList[]=array('goodsid'=>$goodsid,'specid'=>$v,'reading'=>$readings[$k],'price'=>(int)($price[$k]),'addtime'=>$addtime);
                }
                $res=M('specprice')->addAll($dataList);
            }
            if($goodsid){
                $return['msg']='添加成功!';
                $return['url']=$addurl;
            }else{
                $return['msg']='添加失败!';
            }
        }else{
            $goodsid=$post['goodsid'];
            $goodsspec=$post['spec'];
            $readings=array();
            $price=array();

            if(isset($post['readings'])){
                $readings = $post['readings'];
            }
            if(isset($post['price'])){
                $price = $post['price'];

                //参考报价取最小
                foreach($price as $k => $v){
                    $imprice[] = (int)($v);
                }
                $data['ckprice'] = min($imprice);
            }
            if(isset($goodsspec)){
                M('specprice')->where("goodsid = $goodsid")->delete();
                foreach($goodsspec as $k => $v){
                    $dataList[]=array('specid'=>$v,'goodsid'=>$goodsid,'reading'=>$readings[$k],'price'=>$price[$k],'addtime'=>$addtime);

                    //保存多图文阅读量第一条以便搜索
                    if($v == 6 && $readings[$k]){
                        $data['firstreading'] = $readings[$k];
                    }
                }
                $addAll=M('specprice')->addAll($dataList);
            }

            $save=M('goods')->where("id = $goodsid")->save($data);
            if($save){
                $return['msg']='编辑成功!';
                $return['url']=$editurl;
            }else{
                $return['msg']='编辑失败!';
            }
        }

        return $return;
    }
}