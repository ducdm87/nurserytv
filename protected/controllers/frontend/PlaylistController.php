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
        $playlist = new Playlist();
        $data = array();
        //$data['videos'] = $this->getVideos($pid);
        $data['allPlaylist'] =$playlist->allPlaylist();
        
        $this->setPageTitle(isset($data['videos'][0]['name']) ? $data['videos'][0]['name'] : '' . ', Xem video giả trí hay hay, clip giả trí, clip nóng mới nhất tại Nuseryty.Com');
        $this->metaDesc = isset($data['videos'][0]['metadesc']) ? $data['videos'][0]['metadesc'] : '';
        $this->metaKey = isset($data['videos'][0]['metakey']) ? $data['videos'][0]['metakey'] : '';
        //var_dump($data); die;
        $this->render('default', $data);
    }

    private function getVideos($param = false) {
        $video = new Media();
        $playlist = new Playlist();

        $data_playlists = array();
        if (!$param) {
            $data_playlists = $playlist->getPlaylists();
            foreach ($data_playlists as $key => $play_id) {
                if ($data = $video->getVideoByPlayList($play_id['id'])) {$data_playlists[$key]['videos'] = $data;}
            }
        } else {
            $data_playlists[] = $playlist->getPlaylistById($param);
            $data_playlists[0]['videos'] = $video->getVideoByPlayList($param);
        }
        return $data_playlists;
    }

     //chinhBV action detail playlist begin 
     public function actionDetail() {
        $id = Request::getVar('id',null);
        $alias = Request::getVar('alias',null);
        $stt = Request::getVar('stt',null);
        $model = Playlist::getInstance();
        $items = $model->getItems($id);
        $cat = $model->getplayist_cat($id,$alias);
        if($stt==null)$stt=0;
        
        $data['stt'] = $stt;
        $data['items'] = $items;
        $data['category'] = $cat;
        if(isset($cat) && $cat!=null){
//            $page_title = $cat[0]["name"];        
//            $page_keyword = $cat[0]["metakey"];  
//            $page_description = $cat[0]["metadesc"];  
//            setSysConfig("seopage.title",$page_title); //xét với title của app-templat (tự đông insert với name tương ứng)
//            setSysConfig("seopage.keyword",$page_keyword); //xét với key word
//            setSysConfig("seopage.description",$page_description); // xét meta description
//            Request::setVar('alias',$cat[0]['alias']);
        }
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
