<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PostController extends BackendController{

    private $post_model;

    function init() {
        parent::init();
        yii::import('application.models.backend.post.*');
        $this->post_model = Post::getInstance();
    }

    public function actionDisplay() {
        $data = array();
        if(isset($_GET['delete']) && $_GET['delete']){
            $this->deletePost($_GET['delete']);
        }
        $data['posts'] = $this->post_model->getPosts(0, 0);

        $this->render('default', $data);
    }

    public function actionCreate($type = false) {
        $data = array();
        if (isset($_GET['id']) && $_GET['id']) {
            $data['item'] = $this->post_model->getPostById($_GET['id']);
        }
        
        $this->render('add', $data);
    }

    public function actionAdd() {
        if (isset($_POST) && $_POST) {

            $data = array(
                'id' => isset($_POST['id']) ? $_POST['id'] : false,
                'title' => Request::getVar('title', ''),
                'alias' => Request::getVar('alias', ''),
                'introtext' => Request::getVar('introtext', ''),
                'fulltext' => $_POST['content'],
                'thumbnail' => Request::getVar('image', ''),
                'metakey' => Request::getVar('metakey', ''),
                'metadesc' => Request::getVar('metadesc', ''),
                'status' => Request::getVar('status', ''),
                'link_original' => Request::getVar('link_original', ''),
                'cdate' => date('Y:m:d H:i:s', time()),
                'created' => date('Y:m:d H:i:s', time()),
                'mdate' => isset($_POST['id']) ? date('Y:m:d H:i:s', time()) : false
            );

            if (isset($data['id']) && $data['id']) {
                if (!$this->post_model->updatePost($data)) {

                    YError::raseWarning("Update bean has success!.");
                } else {
                    YError::raseNotice("Error! Update fail!.");
                }
            } else {
                if (!$this->post_model->addPost($data)) {
                    YError::raseWarning("Create bean has success!.");
                } else {
                    YError::raseNotice("Error! Created fail!.");
                }
            }
            $this->redirect($this->createUrl("/posts"));
        }
    }

    private function deletePost($id) {
        if (!$this->post_model->deleteRecord($id)) {

            YError::raseWarning("Delete bean has success!.");
        } else {

            YError::raseNotice("Error! Delete fail!.");
        }
        $this->redirect($this->createUrl("/posts"));
    }

}
