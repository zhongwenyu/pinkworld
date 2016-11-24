<?php
namespace Admin\Controller;
use Think\Controller;

class ApiController extends BaseController{
    /*
     * ajax修改显示
     */
    public function change_show(){
        if(IS_POST){
            $table=I('table');
            $where=I('key')."=".I('val');
            $field=I('field');
            $keyval=M($table)->where($where)->getField($field);
            $data[$field]=$keyval ? 0 : 1;
            if(M($table)->where($where)->save($data)){
                exit(json_encode(array('status'=>1)));
            }else{
                exit(json_encode(array('status'=>0)));
            }
        }
    }

    /*
     * ajax修改排序
     */
    public function change_sort(){
        if(IS_POST){
            $table=I('table');
            $where=I('key')."=".I('val');
            $field=I('field');
            $data[$field]=I('fval');
            if(M($table)->where($where)->save($data)){
                exit(json_encode(array('status'=>1)));
            }else{
                exit(json_encode(array('status'=>0)));
            }
        }
    }

    /*
     * ajax删除数据
     */
    public function del(){
        if(IS_POST){
            $table=I('table');
            $where=I('key')."=".I('val');
            if($keyval=M($table)->where($where)->delete()){
                exit(json_encode(array('status'=>1)));
            }else{
                exit(json_encode(array('status'=>0)));
            }
        }
    }

    /*
     * 文件下载
     */
    public function download(){
        $uploadpath = $_SERVER["DOCUMENT_ROOT"];//设置文件上传路径，服务器上的绝对路径
        $id=$_GET['id'];//GET方式传到此方法中的参数id,即文件在数据库里的保存id.根据之查找文件信息。
        //如果id为空而出错时，程序跳转到项目的Index/index页面。或可做其他处理。
        if($id == ""){
            $this->redirect(U('Admin/Index/index'));
        }
        $file=M("files");//利用与表file对应的数据模型类FileModel来建立数据对象。
        $result= $file->find($id);//根据id查询到文件信息
        //如果查询不到文件信息而出错时，程序跳转到项目的Index/index页面。或可做其他处理
        if($result==false){
            $this->redirect(U('Admin/Index/index'));
        }
        $path = $file->path;//文件保存相对路劲
        $showname=$file->showname;//文件显示名
        $filename=$uploadpath.$path;//完整文件名（根目录加相对路劲）
        download($filename,$showname);
    }
}