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
                else if($task == "feature.on") $this->changeStatus ($cid, 1,"feature");
                else if($task == "feature.off") $this->changeStatus ($cid, 0,"feature");
            }
            YiiMessage::raseSuccess("Successfully saved changes playlist(s)");
        }
        
        $this->addIconToolbar("New", $this->createUrl("/playlists/new"), "new");
        $this->addIconToolbar("Edit", $this->createUrl("/playlists/edit"), "edit", 1, 1, "Please select a item from the list to edit");        
        $this->addIconToolbar("Publish", $this->createUrl("/playlists/publish"), "publish");
        $this->addIconToolbar("Unpublish", $this->createUrl("/playlists/unpublish"), "unpublish");
        $this->addIconToolbar("Delete", $this->createUrl("/playlists/remove"), "trash", 1, 1, "Please select a item from the list to Remove");        
        $this->addBarTitle("Playlists <small>[manager]</small>", "user"); 
        
        $model = Playlist::getInstance();
        $items = $model->getItems(0, 0);
         
        $data['items'] = $items;
        $this->render('default', $data); 
    }

    public function actionNew() {
        $this->actionEdit();
    }
    
    public function actionEdit($type = false) {
        
        $cid = Request::getVar('cid', "");        
        setSysConfig("sidebar.display", 0);
        
        $this->addIconToolbar("Save", $this->createUrl("/playlists/save"), "save");
        $this->addIconToolbar("Apply", $this->createUrl("/playlists/apply"), "apply");
        $this->addBarTitle("Playlist <small>[Edit]</small>", "user");
        $this->addIconToolbar("Close", $this->createUrl("/playlists/cancel"), "cancel");
        $this->pageTitle = "Edit playlist";     
        
        $model = Playlist::getInstance();
        $item = $model->getItem($cid);
        
        $data['item'] = $item;
        $data['list'] = $model->getListEdit($item);;
        
        $this->render('edit', $data);
    }
    
    
    function actionApply() {
        $cid = $this->store();
        $this->redirect($this->createUrl('playlists/edit') . "?cid=" . $cid);
    }
    
    function actionSave() {
        $cid = $this->store();
        $this->redirect($this->createUrl('playlists/'));
    }
    
    function actionCancel()
    {
        $this->redirect($this->createUrl('playlists/'));
    }
    
    public function store() {
        global $mainframe;
        
        $cid = Request::getVar("id", 0); 
        
        $obj_table = YiiTables::getInstance(TBL_PLAYLIST);
        $obj_table = $obj_table->load($cid); 
 
        $obj_table->bind($_POST);
        
        $obj_table->store();
         
        $catIDs = Request::getVar("catID", null); 
        
         $obj_xref = YiiTables::getInstance(TBL_CATEGORIES_XREF);
         $obj_xref->remove(null, "`pindex` = $obj_table->id AND `type` = 2");
        
        if($catIDs != null and count($catIDs)>0){
            foreach($catIDs as $catID){
                $obj_xref = YiiTables::getInstance(TBL_CATEGORIES_XREF, null, true);
                $obj_xref->cat_id = $catID;
                $obj_xref->pindex = $obj_table->id;
                $obj_xref->type = 2;
                $obj_xref->store();
            } 
        }
 
        YiiMessage::raseSuccess("Successfully save Playlist");
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
        YiiMessage::raseSuccess("Successfully publish Playlist(s)");
        $this->redirect($this->createUrl('playlist/'));
    }
    
    function actionUnpublish()
    {
        $cids = Request::getVar("cid", 0);        
        if(count($cids) >0){
            for($i=0;$i<count($cids);$i++){                
                $this->changeStatus($cids[$i], 0);
            }
        }
        YiiMessage::raseSuccess("Successfully unpublish Playlist(s)");
        $this->redirect($this->createUrl('playlist/'));
    }
    
    function actionRemove()
    {
        $cids = Request::getVar("cid", 0);
        if(count($cids) >0){
            for($i=0;$i<count($cids);$i++){                
               $obj_table = YiiPlaylist::getInstance();
               $obj_table->remove($cids[$i]);
            }
        }
        YiiMessage::raseSuccess("Successfully delete Playlist(s)");
        $this->redirect($this->createUrl('playlists/'));
    }

    function changeStatus($cid, $value, $field = "status")
    {
        $obj_table = YiiTables::getInstance(TBL_PLAYLIST);
        $obj_table = $obj_table->load($cid); 
        $obj_table->load($cid); 
        $obj_table->$field = $value;
        $obj_table->store();
    }
}
