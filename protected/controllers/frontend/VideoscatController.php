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
        $getcategories = $playlist->getcat($id);
        $data['allPlaylist'] =$playlist->CatPlaylist($id);
        
        setSysConfig("seopage.title",$getcategories['title']); //xét với title của app-templat (tự đông insert với name tương ứng)
        setSysConfig("seopage.keyword",$getcategories['metakey']); //xét với key word
        setSysConfig("seopage.description",$getcategories['metadesc']); // xét meta description
        Request::setVar('alias',$getcategories['alias']);
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
