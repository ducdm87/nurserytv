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

    function __construct() {
        parent::__construct();        
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
        
        $filter_catID = Request::getVar('filter_catID', 0);
        $filter_state = Request::getVar('filter_state', -2);
        
        $where = array();
        if($filter_catID != 0){
            $obj_cat_xref = YiiTables::getInstance(TBL_CATEGORIES_XREF);
            $list_id = $obj_cat_xref->loadColumn("pindex","cat_id = $filter_catID AND `type` = 2");
            if($list_id AND count($list_id) > 0){
                $list_id = implode(",", $list_id);
                $where[] = " id in(".$list_id.")";
            }else $where[] = " 1 = 0 ";
            
        }
        
        
        if($filter_state == 2 ) $where[] = "feature = 1";
        else if($filter_state != -2 ) $where[] = "status = $filter_state";
        $where = implode(" AND ", $where);
        $results = $obj_table->loads("*",$where);
                
        return $results;
    }
    
    function getList()
    {
        $list = array();
        
        $filter_catID = Request::getVar('filter_catID', 0);
        $filter_state = Request::getVar('filter_state', -2);
        
        $obj_module = YiiCategory::getInstance();
        $items[] = array("value"=>0, "text"=>"- Select category -");
        $_items = $obj_module->loadItems('id value, title text', "`scope` = 'playlists'");
        $items = array_merge($items,$_items);
        $list['filter_catID'] = buildHtml::select($items, $filter_catID, "filter_catID","", "onchange=\"document.adminForm.submit();\"");
         
        
        $items = array();
        $items[] = array("value"=>-2, "text"=>"- Select state -");
        $items[] = array("value"=>0, "text"=>"Unpublish");
        $items[] = array("value"=>1, "text"=>"Publish");
        $items[] = array("value"=>2, "text"=>"Feature");
       
        $list['filter_state'] = buildHtml::select($items, $filter_state, "filter_state", "", "onchange=\"document.adminForm.submit();\"");
        
        return $list;
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
        
        $list['status'] = buildHtml::select($items, $mainItem->status, "status");
        
        $items = array();
        $items[] = array("value"=>0, "text"=>"Disable");
        $items[] = array("value"=>1, "text"=>"Enable");        
        $list['feature'] = buildHtml::select($items, $mainItem->feature, "feature");        
        return $list;
    }

}
