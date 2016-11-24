<?php
namespace Admin\Controller;
class UploadifyController extends BaseController{
    public function upload(){
        $func = I('func');
        $classname = I('classname');
        $path = I('path','temp');
        $info = array(
            'num'=> I('num',10),
            'title' =>  I('title')=='undefined' ? '' : I('title'),
            'upload' =>U('Admin/Ueditor/imageUp',array('savepath'=>$path)),
            'size' => I('size','4MB'),
            'type' =>'jpg,png,gif,jpeg',
            'func' => empty($func) ? 'undefined' : $func,
            'classname' => empty($classname) ? 'undefined' : $classname,
        );
        $this->assign('info',$info);
        $this->display();
    }

    //删除上传的图片
    public function delImg(){
        $action=isset($_GET['action']) ? $_GET['action'] : null;
        $filename= isset($_GET['filename']) ? $_GET['filename'] : null;
        $filename= str_replace('../','',$filename);
        $filename= str_replace(__ROOT__,'',$filename);
        $filename= trim($filename,'.');
        $filename= trim($filename,'/');
        if($action=='del' && !empty($filename)){
            $size = getimagesize($filename);
            $filetype = explode('/',$size['mime']);
            if($filetype[0]!='image'){
                return false;
                exit;
            }
            unlink($filename);
            exit;
        }
    }
}