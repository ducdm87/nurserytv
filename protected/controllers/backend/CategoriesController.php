<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoriesController extends BackEndController {

    var $primary = 'id';
    var $tablename = "{{categories}}";
    private $service_model;

    function init() {
        parent::init();
        yii::import('application.models.backend.category.*');
        $this->service_model = Category::getInstance();
    }

    public function actionDisplay() {
        $lists = $this->service_model->getCategories(10, 0);
        $item = array();
        if (isset($_GET['id']) && $_GET['id']) {
            $item = $this->actionEdit($_GET['id']);
        }
        $this->render('default', array("lists" => $lists, 'item' => $item));
    }

    public function actionAdd() {
        if (isset($_POST) && $_POST) {
            $data = array(
                'id' => (Request::getVar('id', '')) ? Request::getVar('id', '') : false,
                'title' => Request::getVar('name', ''),
                'alias' => Request::getVar('alias', ''),
                'status' => Request::getVar('status', ''),
                'description' => Request::getVar('description', ''),
                'metakey' => Request::getVar('metakey', ''),
                'metadesc' => Request::getVar('metadesc', ''),
                'type' => (Request::getVar('type', '')) ? Request::getVar('type', '') : 0,
                'cdate' => date('Y:m:d H:i:s', time()),
                'mdate' => isset($_POST['id']) ? date('Y:m:d H:i:s', time()) : false
            );
            if (isset($data['id']) && $data['id']) {
                if (!$this->service_model->updateCategory($data)) {
                    YError::raseWarning("Update bean has success!.");
                } else {
                    YError::raseNotice("Error! Update fail!.");
                }
            } else {// $_POST['id'] null add new 
                if ($this->service_model->addCategory($data)) {
                    YError::raseWarning("Create bean has success!.");
                } else {
                    YError::raseNotice("Error! Created fail!.");
                }
            }

            $this->redirect($this->createUrl("/categories"));
        }
    }

    public function actionEdit($id) {
        // if (isset($_POST['id']) && $_POST['id']) {
        $item = $this->service_model->getCategoryById($id);
        return $item;
        // }
    }

    public function actionDelete($id = false) {

        if ($this->service_model->deleteRecord($id)) {

            YError::raseWarning("Delete bean has success!.");
        } else {

            YError::raseNotice("Error! Delete fail!.");
        }
        $this->redirect($this->createUrl("/categories"));
    }

}
