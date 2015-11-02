<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PlaylistController extends FrontEndController {

    public $item = array();

    function init() {
        parent::init();
    }

    public function actionDisplay() {

        $pid = false;
        if (isset($_GET['pid']) && $_GET['pid']) {
            $pid = $_GET['pid'];
        }

        $data = array();
        $data['videos'] = $this->getVideos($pid);
        $this->setPageTitle(isset($data['videos'][0]['name']) ? $data['videos'][0]['name'] : '' . ', Xem video giả trí hay hay, clip giả trí, clip nóng mới nhất tại Nuseryty.Com');
        $this->metaDesc = isset($data['videos'][0]['metadesc']) ? $data['videos'][0]['metadesc'] : '';
        $this->metaKey = isset($data['videos'][0]['metakey']) ? $data['videos'][0]['metakey'] : '';
        $this->render('default', $data);
    }

    private function getVideos($param = false) {
        $video = new Media();
        $playlist = new Playlist();

        $data_playlists = array();
        if (!$param) {
            $data_playlists = $playlist->getPlaylists();
            foreach ($data_playlists as $key => $play_id) {
                if ($data = $video->getVideoByPlayList($play_id['id'])) {

                    $data_playlists[$key]['videos'] = $data;
                }
            }
        } else {
            $data_playlists[] = $playlist->getPlaylistById($param);
            $data_playlists[0]['videos'] = $video->getVideoByPlayList($param);
        }
        return $data_playlists;
    }
//doan cu
//    public function actionDetail() { 
//        $video = new Media();
//        $data = array();
//        (int) $vid = '';
//        (int) $pid = '';
//        if (isset($_GET['pid']) && $_GET['pid']) {
//            $pid = $_GET['pid'];
//        }
//        if (isset($_GET['vid']) && $_GET['vslug']) {
//            $data['items'] = $this->getVideoById($pid, $_GET['vid']);
//        }
//        if (isset($data['items']) && $data['items']) {
//            $video->setView($_GET['vid']);
//        }
//
//        $this->setPageTitle(isset($data['items']['video']['title']) ? $data['items']['video']['title'] : '');
//        $this->metaDesc = isset($data['items']['video']['metadesc']) ? $data['items']['video']['metadesc'] : '';
//        $this->metaKey = isset($data['items']['video']['metakey']) ? $data['items']['video']['metakey'] : '';
//
//        $data['video_hots'] = $this->getVideoHots();
//        $data['video_new'] = $this->getVideoHots();
//        $this->render('detail', $data);
//        var_dump($data); die;
//    }
     //chinhBV action detail playlist begin 
     public function actionDetail() {
        $id = Request::getVar('id',null);
        $alias = Request::getVar('alias',null);
        $model = Playlist::getInstance();
        $items = $model->getItems($id);
        $items2 = $model->getItems($id);
        $obj_category = $model->getplayist($id,$alias);
        var_dump($items); die;
        $data['items'] = $items;
        $data['items2'] = $items2;
        $data['category'] = $obj_category;
        //var_dump($data['item']) ; die;
        $page_title = $obj_item->title;        
        $page_keyword = $obj_item->metakey != ""?$obj_item->metakey:$page_title;
        $page_description = $obj_item->metadesc != ""?$obj_item->metadesc:$page_title;
        
        setSysConfig("seopage.title",$page_title); //xét với title của app-templat (tự đông insert với name tương ứng)
        setSysConfig("seopage.keyword",$page_keyword); //xét với key word
        setSysConfig("seopage.description",$page_description); // xét meta description
        Request::setVar('alias',$obj_category['alias']);
        //var_dump($data); die;
        $this->render('detail', $data);
    }
    //End chinhbv action deltail playlist

    private function getVideoById($pid = false, $vid = false) {
        $video = new Media();
        $playlist = new Playlist();
        if (isset($pid) && $pid) {
            $data_play = $playlist->getPlaylistById($pid);
            $data = array();
            if ($data_play) {
                $data_play['playlists'] = $video->getVideoByPlayList($data_play['id']);
            }
            $data = $data_play;
        }

        $data['video'] = $video->getMediaById($vid);
        return $data;
    }

    public function actionSetlike() {
        $video = new Media();
        if (isset($_POST['id']) && $_POST['id']) {

            $like = $video->setLiked($_POST['id']);
            echo json_encode($like);
        }
    }

    public function actionSendError() {
        $err = new Media();
        if (isset($_POST) && $_POST) {
            $data = array(
                'vid' => $_POST['vid'],
                'subject' => isset($_POST['subject']) ? $_POST['subject'] : '',
                'message' => isset($_POST['message']) ? $_POST['message'] : '',
                'cdate' => date('Y:m:d H:i:s', time()),
            );
            $err->saveError($data);
        }
    }

}
