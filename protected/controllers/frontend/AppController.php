<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AppController extends FrontEndController {

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

        $data = array();
        $this->setPageTitle('Xem video giả trí hay hay, clip giả trí, clip nóng mới nhất tại Nuseryty.Com');
        $this->metaDesc = "Nurseryty.Com trang chia sẻ các clip giải trí hay, clip được cập nhật liên tục với tốc độ load video cực nhanh và xem hoàn toàn miễn phí";
        $this->metaKey = "Nurseryty.Com trang chia sẻ các clip giải trí hay, clip được cập nhật liên tục với tốc độ load video cực nhanh và xem hoàn toàn miễn phí";

        $data['videos_viewed'] = $this->media->getMedias(4, 0, array('f.status=1'), array('f.viewed DESC'));
        $data['videos_update'] = $this->getVideoUpdates();
        $data['playlists'] = $this->getPlayLists();
        $this->render('default', $data);
    }

    private function getVideoUpdates() {
        $media = new Media();
        return $media->getMedias(4, 0, array('f.status=1'), array('f.cdate DESC'));
    }

    private function getPlayLists() {
        $video = new Media();
        $playlist = new Playlist();
        $data_playlists = $playlist->getPlaylists(2, 0);
        foreach ($data_playlists as $key => $play_id) {
            if ($data = $video->getVideoByPlayList($play_id['id'])) {

                $data_playlists[$key]['videos'] = $data;
            }
        }
        return $data_playlists;
    }

}
