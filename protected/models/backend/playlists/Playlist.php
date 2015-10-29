<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Playlist extends CFormModel {

    private $table = "{{playlist}}";
    private $table_category_index = "{{category_index}}";
    private $table_category = "{{categories}}";
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
            $instance = new Playlist();
        }
        return $instance;
    }
    
    public function getItems($limit = 5, $offset = 0) {
        $obj_table = YiiTables::getInstance(TBL_PLAYLIST);         
        $results = $obj_table->loads();
        return $results;
    }

    public function getItem($cid) {
        $obj_table = YiiTables::getInstance(TBL_PLAYLIST);
        $result = $obj_table->load($cid);        
        return $result;
    }

    public function getListEdit($mainItem)
    {
        $list = array();
        $obj_category_index = YiiTables::getInstance(TBL_CATEGORIES_XREF);
        $list_cat = $obj_category_index->loadColumn("cat_id", "`pindex` = $mainItem->id AND `type` = 2");
        
        $obj_module = YiiCategory::getInstance();
        $items = $obj_module->loadItems('id value, title text', "`scope` = 'playlists'");
        $list['category'] = buildHtml::select($items, $list_cat, "catID[]","","size=7 multiple");
         
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
