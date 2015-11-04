<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VideoscatController extends FrontEndController {

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
        $id = Request::getVar('id',null);
        $alias = Request::getVar('alias',null);
        $playlist = new Playlist();
        $data = array();
        $cc['videos'] = $playlist->CatPlaylist($id);
        $data['allPlaylist'] =$playlist->CatPlaylist($id);
        
        $this->setPageTitle(isset($cc['videos'][0]['name']) ? $cc['videos'][0]['name'] : '' . ', Xem video giả trí hay hay, clip giả trí, clip nóng mới nhất tại Nuseryty.Com');
        $this->metaDesc = isset($cc['videos'][0]['metadesc']) ? $cc['videos'][0]['metadesc'] : '';
        $this->metaKey = isset($cc['videos'][0]['metakey']) ? $cc['videos'][0]['metakey'] : '';
        //var_dump($data); die;
        $this->render('default', $data);
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
