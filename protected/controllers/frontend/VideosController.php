<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VideosController extends FrontEndController {

    public $item = array();
    private $category;
    private $post;
    private $media;

    function init() {
        parent::init();
        $this->category = Category::getInstance();
        $this->post = Post::getInstance();
        $this->media = Media::getInstance();
    }

    public function actionDisplay() {

        $this->setPageTitle('Danh sách video, Xem video giả trí hay hay, clip giả trí, clip nóng mới nhất tại Nuseryty.Com');
        $this->metaDesc = "Nurseryty.Com trang chia sẻ các clip giải trí hay, clip được cập nhật liên tục với tốc độ load video cực nhanh và xem hoàn toàn miễn phí";
        $this->metaKey = "Nurseryty.Com trang chia sẻ các clip giải trí hay, clip được cập nhật liên tục với tốc độ load video cực nhanh và xem hoàn toàn miễn phí";

        $media = new Media();
        $data = array();

        $offset = isset($_GET['limitstart']) ? $_GET['limitstart'] : 0;
        $limit = 5;
        $data['total'] = $this->media->getCountTotal();
        $data['videos'] = $media->getMedias($limit, $offset);
        //var_dump($data); die;
        $this->render('default', $data);
    }

    public function actionSearch() {

        $this->setPageTitle($_GET['q'] . '-Tìm kiếm- kết quả tìm kiếm theo Video');
        $this->metaDesc = "Nurseryty.Com trang chia sẻ các clip giải trí hay, clip được cập nhật liên tục với tốc độ load video cực nhanh và xem hoàn toàn miễn phí";
        $this->metaKey = "Nurseryty.Com trang chia sẻ các clip giải trí hay, clip được cập nhật liên tục với tốc độ load video cực nhanh và xem hoàn toàn miễn phí";

        $media = new Media();
        $data = array();
        if (isset($_GET['q']) && $_GET['q']) {
            $keyword = $_GET['q'];
            $offset = isset($_GET['limitstart']) ? $_GET['limitstart'] : 0;
            $limit = 10;
            $data['total'] = $this->media->getCountTotal(array('like', 'title', "%$keyword%"));
            $data['videos'] = $media->getMedias($limit, $offset, array('like', 'f.title', "%$keyword%"), false);
        } else {
            $this->redirect('/app');
        }
        $data['video_hots'] = $this->getVideoHots();
        $data['video_new'] = $this->getVideoHots();
        $this->render('default', $data);
    }
 

    //chinhBV action detail begin
    public function actionDetail() {
        $id = Request::getVar('id', null);
        $alias = Request::getVar('alias', null);

        $model = Video::getInstance();
        if ($id == null OR $id == "") {
            if ($alias != null and $alias != "") {
                $obj_item = $model->getItemByAlias($alias);
            } else {
                header("Location: /");
            }
        } else {
            $obj_item = $model->getItem($id);
        }

        //var_dump($obj_item); die;
        $view = "";
        $playlist = $model->getItemsall($id);
        $page_title = $obj_item->title;
        $page_keyword = $obj_item->metakey != "" ? $obj_item->metakey : $page_title;
        $page_description = $obj_item->metadesc != "" ? $obj_item->metadesc : $page_title;

        setSysConfig("seopage.title", $page_title); //xét với title của app-templat (tự đông insert với name tương ứng)
        setSysConfig("seopage.keyword", $page_keyword); //xét với key word
        setSysConfig("seopage.description", $page_description); // xét meta description
        $view = "detail";
        $data['item'] = $obj_item;
        $data['playlist'] = $playlist;
        $this->render($view, $data);
    }
    
    function actionLikevideo(){
        $id = Request::getVar('id',null);
        $model = Video::getInstance();
        
        $like_videos = Yii::app()->session['like-video'];
        
        if($like_videos == null) $like_videos = array();
        if(isset($like_videos[$id])){
            $video = $model->getItem($id);
            $res = $video->like;
        }else{
            $model = Video::getInstance();
            $res = $model->likevideo($id);
        }
        
        $like_videos[$id] = $id;
        Yii::app()->session['like-video'] = $like_videos;        
        $str_out = "var vlvcdpd = $res; $('.entry-like .like-data').text(vlvcdpd) ";
        echo $str_out;
        die;
       
    }
    
    function actionSetView(){
        $video_id = Request::getVar("id",0);        
        if($video_id <=0) { 
            $return = new stdClass();
            $return ->status = false; 
             echo json_encode($return);
        }
        else {
            $model = Video::getInstance();
            $res = $model->setview($video_id);
            $str_out = "var vsvcdpd = $res; $('.entry-viewed span').text(vsvcdpd) ";
            echo $str_out;
        }
       
    }

    
    //End chinhbv action deltail
    public function actionAjaxSearch() {
        $media = new Media();
        $data = array();
        if (isset($_POST['keyword']) && $_POST['keyword']) {
            $keyword = $_POST['keyword'];
            $data = $media->getMedias(0, 0, array('like', 'f.title', "%$keyword%"), false);
        }
        echo json_encode($data);
    }

    private function getMediaByCategory($cid) {
        $media = new Media();
        $where_param = array('m.category_id' => $cid);
        return $media->getMedias(4, 0, $where_param);
    }

    private function getMediaRand() {
        $media = new Media();
        return $media->getMedias(6, 0, false, false, $order = 'm.viewed', $by = "DESC", true);
    } 

    public function actionCheckSession() {
        $media = Media::getInstance();
        $session = Yii::app()->session->get('user_data');
        if (!isset($session) && $session) {
            echo json_encode(FALSE);
        } else {

            $data = array(
                'uid' => $session['id'],
                'fid' => $_POST['id']
            );
            //Set like
            if (!$media->addUserLike($data)) {
                echo json_encode(TRUE);
            }
        }
    }

}
