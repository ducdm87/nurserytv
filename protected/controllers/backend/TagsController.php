<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TagsController extends BackEndController {

    var $tag;

    function init() {
        parent::init();
        yii::import('application.models.backend.tags.*');
        $this->tag = Tag::getInstance();
    }

    public function actionDisplay() {
        $lists = $this->getTags();
        $item = array();
        if (isset($_GET['id']) && $_GET['id']) {
            $item = $this->tag->getTagById($_GET['id']);
        }
        $this->render('default', array("lists" => $lists, 'item' => $item));
    }

    private function getTags() {
        $tag = Tag::getInstance();
        return $tag->getTags(0, 0);
    }

    public function actionAdd() {
        if (isset($_POST) && $_POST) {
            $data = array(
                'id' => isset($_POST['id']) ? $_POST['id'] : false,
                'name' => isset($_POST['name']) ? $_POST['name'] : false,
                'alias' => isset($_POST['alias']) ? $_POST['alias'] : false,
                'status' => isset($_POST['status']) ? $_POST['status'] : 0,
            );

            if (isset($data['id']) && $data['id']) {
                if ($this->tag->updateTag($data)) {
                    YError::raseWarning("Update has bean success!.");
                } else {
                    YError::raseNotice("Error! Update fail!.");
                }
            } else {
                if ($this->tag->addTag($data)) {
                    YError::raseWarning("Create bean has success!.");
                } else {
                    YError::raseNotice("Error! Created fail!.");
                }
            }
            $this->redirect($this->createUrl("/tags"));
        }
    }

    public function actionDelete($id = false) {
        if ($this->tag->deleteRecord($id)) {

            YError::raseWarning("Delete bean has success!.");
        } else {

            YError::raseNotice("Error! Delete fail!.");
        }
        $this->redirect($this->createUrl("/tags"));
    }

}
