<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PlaylistsController extends BackEndController {

    var $playlist;

    function init() {
        parent::init();
        yii::import('application.models.backend.playlists.*');
        $this->playlist = Playlist::getInstance();
        yii::import('application.models.backend.category.*');
    }

    public function actionDisplay() {
        $lists = array();
        $lists['playlists'] = $this->getPlaylist();
        $cate = Category::getInstance();
        if (isset($_GET['active']) && $_GET['active']) {
            $playlist = Playlist::getInstance();
            $updateActive['playlist'] = array('id' => $_GET['id'], 'active' =>($_GET['active']==2)?0:$_GET['active']);
            $playlist->updatePlaylist($updateActive);
            $this->redirect($this->createUrl("/playlists"));
        }
        if (isset($_GET['id']) && $_GET['id']) {
            $lists['item'] = $this->playlist->getPlaylistById($_GET['id']);
            $lists['item']['categories'] = $this->getCategoryByPlaylist($_GET['id']);
        }
        $lists['categories'] = $cate->getCategories(0, 0);
        $this->render('default', $lists);
    }

    private function getCategoryByPlaylist($id) {
        $playlist = Playlist::getInstance();
        return $playlist->getCategoryByPlaylist($id);
    }

    private function getPlaylist() {
        $playlist = Playlist::getInstance();
        return $playlist->getPlaylists(0, 0);
    }

    public function actionAdd() {
        if (isset($_POST) && $_POST) {
            $data['playlist'] = array(
                'id' => isset($_POST['id']) ? $_POST['id'] : false,
                'name' => isset($_POST['name']) ? $_POST['name'] : false,
                'alias' => isset($_POST['alias']) ? $_POST['alias'] : false,
                'status' => isset($_POST['status']) ? $_POST['status'] : 0,
                'active' => isset($_POST['active']) ? $_POST['active'] : 0,
                'metadesc' => isset($_POST['metadesc']) ? $_POST['metadesc'] : '',
                'metakey' => isset($_POST['metakey']) ? $_POST['metakey'] : '',
            );
            if (isset($_POST['categories']) && $_POST['categories']) {
                $data['categories'] = $_POST['categories'];
            }
            if (isset($data['playlist']['id']) && $data['playlist']['id']) {
                if (!$this->playlist->updatePlaylist($data)) {
                    YError::raseWarning("Update has bean success!.");
                } else {
                    YError::raseNotice("Error! Update fail!.");
                }
            } else {
                if (!$this->playlist->addPlaylist($data)) {
                    YError::raseWarning("Create bean has success!.");
                } else {
                    YError::raseNotice("Error! Created fail!.");
                }
            }
            $this->redirect($this->createUrl("/playlists"));
        }
    }

    public function actionDelete($id = false) {
        if ($this->playlist->deleteRecord($id)) {

            YError::raseWarning("Delete bean has success!.");
        } else {

            YError::raseNotice("Error! Delete fail!.");
        }
        $this->redirect($this->createUrl("/playlists"));
    }

}
