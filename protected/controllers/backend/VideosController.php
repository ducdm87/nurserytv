<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VideosController extends BackEndController {

    private $film_model;
    private $category;

    function init() {
        parent::init();
        yii::import('application.models.backend.medias.*');
    }

    public function actionDisplay() {
        
        $task = Request::getVar('task', "");
        if ($task != "") {
            $cids = Request::getVar('cid');            
            for ($i = 0; $i < count($cids); $i++) {
                $cid = $cids[$i];
                if ($task == "publish")
                    $this->changeStatus ($cid, 1);
                else if ($task == "hidden")
                    $this->changeStatus ($cid, 2);
                elseif($task == "unpublish") $this->changeStatus ($cid, 0);
                else if($task == "feature.on") $this->changeStatus($cid, 1, "feature");                 
                else if($task == "feature.off") $this->changeStatus($cid, 0, "feature");
                else if($task == "hotweek.on") $this->changeStatus($cid, 1, "hotweek");
                else if($task == "hotweek.off") $this->changeStatus($cid, 0, "hotweek");
            }
            YiiMessage::raseSuccess("Successfully saved changes video(s)");
        }
        
        $this->addIconToolbar("New", $this->createUrl("/videos/new"), "new");
        $this->addIconToolbar("Edit", $this->createUrl("/videos/edit"), "edit", 1, 1, "Please select a item from the list to edit");        
        $this->addIconToolbar("Publish", $this->createUrl("/videos/publish"), "publish");
        $this->addIconToolbar("Unpublish", $this->createUrl("/videos/unpublish"), "unpublish");
        $this->addIconToolbar("Delete", $this->createUrl("/videos/remove"), "trash", 1, 1, "Please select a item from the list to Remove");        
        $this->addBarTitle("Videos <small>[manager]</small>", "user"); 
            
        $data = array();
            
        $model = Video::getInstance();
        $items = $model->getItems(); 
        $data["items"] = $items;
        $this->render('default', $data);
    }
    
    public function actionNew() {
        $this->actionEdit();
    }
    
    public function actionEdit() {
        $cid = Request::getVar('cid', "");        
        setSysConfig("sidebar.display", 0);
        
        $this->addIconToolbar("Save", $this->createUrl("/videos/save"), "save");
        $this->addIconToolbar("Apply", $this->createUrl("/videos/apply"), "apply");
        $this->addBarTitle("Video <small>[Edit]</small>", "user");
        $this->addIconToolbar("Close", $this->createUrl("/videos/cancel"), "cancel");
        $this->pageTitle = "Edit video";           
        
        
        $model = Video::getInstance();
        $item = $model->getItem($cid);
        $list = $model->getListEdit($item);
        
        $this->render('edit', array("item" => $item, "list"=>$list));
    }

    function actionApply() {
        $cid = $this->store();
        $this->redirect($this->createUrl('videos/edit') . "?cid=" . $cid);
    }
    
    function actionSave() {
        $cid = $this->store();
        $this->redirect($this->createUrl('videos/'));
    }
    
    function actionCancel()
    {
        $this->redirect($this->createUrl('videos/'));
    }
    
    public function store() {
        global $mainframe;
        
        $cid = Request::getVar("id", 0); 
        
        $obj_table = YiiTables::getInstance(TBL_VIDEOS);        
        $obj_table = $obj_table->load($cid); 
        
        $obj_table->bind($_POST);
        $obj_table->store();
        
        $playlistIDs = Request::getVar("playlistID", null); 
        
         $obj_xref = YiiTables::getInstance(TBL_PLAYLIST_XREF);
         $obj_xref->remove(null, "`videoID` = $obj_table->id");
        
        if($playlistIDs != null and count($playlistIDs)>0){
            foreach($playlistIDs as $playlistID){
                $obj_xref = YiiTables::getInstance(TBL_PLAYLIST_XREF, null, true);
                $obj_xref->playlistID = $playlistID;
                $obj_xref->videoID = $obj_table->id;
                $obj_xref->store();
            } 
        }
 
        YiiMessage::raseSuccess("Successfully save Category");
        return $obj_table->id;
    }
    
    
     function actionPublish()
    {
        $cids = Request::getVar("cid", 0);        
        if(count($cids) >0){
            for($i=0;$i<count($cids);$i++){
                $this->changeStatus($cids[$i], 1);
            }
        }
        YiiMessage::raseSuccess("Successfully publish Cateegory(s)");
        $this->redirect($this->createUrl('videos/'));
    }
    
    function actionUnpublish()
    {
        $cids = Request::getVar("cid", 0);        
        if(count($cids) >0){
            for($i=0;$i<count($cids);$i++){                
                $this->changeStatus($cids[$i], 0);
            }
        }
        YiiMessage::raseSuccess("Successfully unpublish Cateegory(s)");
        $this->redirect($this->createUrl('videos/'));
    }

    function changeStatus($cid, $value, $field = "status")
    {
        $obj = YiiTables::getInstance(TBL_VIDEOS);   
        $obj->load($cid); 
        $obj->$field = $value;
        $obj->store();
    }
}
