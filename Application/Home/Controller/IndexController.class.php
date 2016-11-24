<?php
namespace Home\Controller;
use Think\Controller;
use Home\Logic\GoodsLogic;

class IndexController extends BaseController {

    /**
     * 首页显示
     */
    public function index(){
        if(session('?user'))
        {
            $user = session('user');
            $user = M('user')->where("id = {$user['id']}")->find();
            session('user',$user);  //覆盖session 中的 user
            $this->assign('user',$user); //存储用户信息
        }

        $GoodsLogic = new GoodsLogic();

        $banner = M('banner')->select();

        $weixin = $GoodsLogic->index_goods(1);
        $weibo = $GoodsLogic->index_goods(2);
        $live = $GoodsLogic->index_goods(3);

        $platcat = M('goodscat')->where("typeid = 0")->select();
        $platcat = convert_arr_key($platcat,'id');

        //新闻资讯
        $news1 = M('news')->where("isshow = 1 and typeid = 1")->order("isreco desc,sort asc")->limit(7)->select();
        $news2 = M('news')->where("isshow = 1 and typeid = 2")->order("isreco desc,sort asc")->limit(7)->select();
        $news3 = M('news')->where("isshow = 1 and typeid = 3")->order("isreco desc,sort asc")->limit(7)->select();

        $this->assign("banner",$banner);
        $this->assign("weixin",$weixin);
        $this->assign("news1",$news1);
        $this->assign("news2",$news2);
        $this->assign("news3",$news3);
        $this->assign("weibo",$weibo);
        $this->assign("platcat",$platcat);
        $this->assign("live",$live);
        
        $this->display();
    }

    /**
     * 新闻资讯
     */
    public function news(){
        I('get.id') && $newsid = I('get.id');
        if($newsid){
            $news = M('news')->where("id = $newsid")->find();
            if($news){
                $seo['keytitle'] = $news['newstitle'];
                $seo['keyword'] = $news['keyword'];
                $seo['keyinfo'] = $news['keyinfo'];
                $this->assign("seo",$seo);
            }

            $sql1 = "SELECT * FROM `news` WHERE id >= (SELECT floor(RAND() * (SELECT MAX(id) FROM `news`))) ORDER BY id LIMIT 4";
            $sql2 = "SELECT * FROM `news` WHERE id >= (SELECT floor(RAND() * (SELECT MAX(id) FROM `news`))) ORDER BY id LIMIT 9";
            $sql3 = "SELECT * FROM `news` WHERE isreco = 1 and id >= (SELECT floor(RAND() * (SELECT MAX(id) FROM `news`))) ORDER BY id LIMIT 7";
            $hotnews = M()->query($sql1);  //热点阅读
            $ranknews = M()->query($sql2);  //热点排行
            $recronews = M()->query($sql2);  //精彩推荐

            $this->assign("hotnews",$hotnews);
            $this->assign("ranknews",$ranknews);
            $this->assign("recronews",$recronews);
            $this->assign("news",$news);
            $this->display();
        }
    }

    /**
     * 关于我们
     */
    public function aboutus(){
        $this->display();
    }
}