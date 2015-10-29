<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Video extends CFormModel {

    private $table = "{{videos}}";
    private $table_episode = "{{episode}}";
    private $table_categories = "{{categories}}";
    private $command;
    private $connection;

    function __construct() {
        parent::__construct();

        $this->command = Yii::app()->db->createCommand();
        $this->connection = Yii::app()->db;
    }

    static function getInstance() {
        static $instance;

        if (!is_object($instance)) {
            $instance = new Video();
        }
        return $instance;
    }
  

    function getItemsHotweek($limit = 5){ 
        global $mainframe, $db;
        
        $obj = YiiTables::getInstance(TBL_VIDEOS);        
        $items = $obj->loads("*", "`hotweek` = 1 ", "id DESC", $limit, 0);
        
        if($items){
            foreach ($items as &$item) {
                $item['link'] = Yii::app()->createUrl("videos/detail", array("id"=>$item['id'], 'alias'=>$item['alias']));
            }
        }
        
        return $items;
    }
    
    function getItemsLastUpdate($limit = 5){ 
        global $mainframe, $db;
        
        $obj = YiiTables::getInstance(TBL_VIDEOS);        
        $items = $obj->loads("*", null, "cdate DESC", $limit, 0);
        
        if($items){
            foreach ($items as &$item) {
                $item['link'] = Yii::app()->createUrl("videos/detail", array("id"=>$item['id'], 'alias'=>$item['alias']));
            }
        }
        
        return $items;
    }

    public function getItem($cid){
        $obj = YiiTables::getInstance(TBL_VIDEOS);        
        $obj->load($cid);
        return $obj;
    }
    
    public function getListEdit($mainItem)
    {
        $list = array();

//        $obj_category = YiiCategory::getInstance();
//        $items = $obj_category->loadItems('id value, title text');
//        $list['category'] = buildHtml::select($items, $mainItem->catID, "catID","","size=7");
         
        $obj_category_index = YiiTables::getInstance(TBL_PLAYLIST_XREF);
        $list_value = $obj_category_index->loadColumn("playlistID", "`videoID` = $mainItem->id");
        
        $obj_table = YiiTables::getInstance(TBL_PLAYLIST);    
        $items = $obj_table->loads('id value, name text');
        $list['playlist'] = buildHtml::select($items, $list_value, "playlistID[]","","size=7 multiple style=\"width: 100%;\"");
         
        $items = array();
        $items[] = array("value"=>0, "text"=>"Unpublish");
        $items[] = array("value"=>1, "text"=>"Publish");
        $items[] = array("value"=>-1, "text"=>"Hidden");
        $list['status'] = buildHtml::select($items, $mainItem->status, "status");
        
        $items = array();
        $items[] = array("value"=>0, "text"=>"Disable");
        $items[] = array("value"=>1, "text"=>"Enable");        
        $list['feature'] = buildHtml::select($items, $mainItem->feature, "feature");        
        return $list;
    }

}
