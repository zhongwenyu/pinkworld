<?php
namespace Admin\Controller;
use Think\Page;

class ShowController extends BaseController{

    /*
     * 新闻列表
     */
    public function news(){
        $typeid = I('get.typeid');

        $News = M('news'); // 实例化User对象
        $count = $News->where("isshow = 1 and typeid = $typeid")->count();// 查询满足要求的总记录数
        $Page = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $News->where("isshow = 1 and typeid = $typeid")->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('typeid',$typeid);// 赋值分页输出
        $this->display(); // 输出模板
    }

    /*
     * 添加编辑新闻
     */
    public function add_news(){
        if(IS_POST){
            $newstitle = I('newstitle');
            if(!empty($newstitle) || $newstitle == 0){
                $data['newstitle'] = trim($newstitle);
            }
            $typeid = I('typeid');
            if(!empty($typeid) || $typeid == 0){
                $data['typeid'] = $typeid;
            }
            $newsfrom = I('newsfrom');
            if(!empty($newsfrom) || $newsfrom == 0){
                $data['newsfrom'] = trim($newsfrom);
            }
            $author = I('author');
            if(!empty($author) || $author == 0){
                $data['author'] = trim($author);
            }
            $isshow = I('isshow');
            if(!empty($isshow) || $isshow == 0){
                $data['isshow'] = $isshow;
            }
            $instro = I('instro');
            if(!empty($instro) || $instro == 0){
                $data['instro'] = trim($instro);
            }
            $keyword = I('keyword');
            if(!empty($keyword)){
                $data['keyword'] = trim($keyword);
            }
            $keyinfo= I('keyinfo');
            if(!empty($keyword)){
                $data['keyinfo'] = trim($keyinfo);
            }
            $isreco = I('isreco');
            if(!empty($isreco) || $isreco == 0){
                $data['isreco'] = $isreco;
            }
            $recopic = I('recopic');
            if(!empty($recopic) || $recopic == 0){
                $data['recopic'] = $recopic;
            }
            $newscontent = $_POST['newscontent'];
            if(!empty($newscontent) || $newscontent == 0){
                $data['newscontent'] = stripcslashes($newscontent);
            }
            $data['addtime'] = time();
            I('act') && $act = I('act');
            I('newsid') && $newsid = I('newsid');
            if($act == 'edit'){
                $res = M('news')->where("id = $newsid")->save($data);
                if($res){
                    $return['msg'] = "编辑成功！";
                    $return['url'] = U('Admin/Show/news',array('typeid'=>$typeid));
                }
            }else{
                $res = M('news')->add($data);
                if($res){
                    $return['msg'] = "添加成功！";
                    $return['url'] = U('Admin/Show/add_news');
                }
            }
            exit(json_encode($return));

        }else{
            p(time());
            I('get.id') && $newsid = I('get.id');
            $act = I('get.act');

            if($act == 'edit'){
                $news = M('news')->where("id = $newsid")->find();
                $this->assign("news",$news);
            }

            $this->assign("act",$act);
            $this->display();
        }
    }

    /*
     * 首页广告
     */
    public function bannerlist(){
        $banner = M('banner')->select();

        $this->assign("banner",$banner);
        $this->display();
    }

    /*
     * 添加删除广告
     */
    public function add_banner(){
        $time = time();
        if(IS_POST) {
            $act = I('act');
            if ($act == 'add') {
                $data['url'] = I('url');
                $data['link'] = I('link');
                $data['sort'] = I('sort');
                $data['position'] = 'index';
                $data['addtime'] = $time;
                $res = M('banner')->add($data);
                if ($res) {
                    $return['msg'] = '添加成功！';
                    $return['url'] = U('Admin/Show/bannerlist');
                }
            }else{
                $id = I('id');
                $data['url'] = I('url');
                $data['link'] = I('link');
                $data['addtime'] = $time;
                $res = M('banner')->where("id = $id")->save($data);
                if ($res) {
                    $return['msg'] = '编辑成功！';
                    $return['url'] = U('Admin/Show/bannerlist');
                }
            }
            exit(json_encode($return));
        }else{
            $act = I('get.act');
            $banner = M('banner')->select();
            I('get.id') && $id = I('get.id');
            if($id){
                $this->assign("id",$id);
            }

            $this->assign("banner",$banner);
            $this->assign("act",$act);
            $this->display();
        }
    }
}