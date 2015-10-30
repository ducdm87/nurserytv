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
  

    public function getItems($limit = 10, $start = 0, $where = array()) {
        
        $filter_playlistID = Request::getVar('filter_playlistID', 0);
        $filter_state = Request::getVar('filter_state', -2);
        $filter_search = Request::getVar('filter_search', "");
        
        $where = array();
        if($filter_playlistID != 0){
            $obj_xref = YiiTables::getInstance(TBL_PLAYLIST_XREF);
            $list_id = $obj_xref->loadColumn("videoID","playlistID = $filter_playlistID");
            if($list_id AND count($list_id) > 0){
                $list_id = implode(",", $list_id);
                $where[] = " id in(".$list_id.")";
            }else $where[] = " 1 = 0 ";
        }
        if($filter_search != ""){
            $w = array();
            $w[] = " title like '%".$filter_search."%'";
            $w[] = " id like '%".$filter_search."%'";
            $where[] = "(".implode(" OR ", $w).")";
            
        }
 
        if($filter_state == 2 ) $where[] = "feature = 1";
        else if($filter_state != -2 ) $where[] = "status = $filter_state";
         
        $field = "*";
        $command = Yii::app()->db->createCommand()->select($field)
                ->from(TBL_VIDEOS);
        
        $command->order("id desc");
        if($limit != null)$command->limit($limit, $start);
        if(count($where) > 0){
            $where = implode(" AND ", $where);
            $command->where($where);
        }
        
        $results = $command->queryAll();
        
        return $results;
    }

    function getList()
    {
        $list = array();
         
        $filter_state = Request::getVar('filter_state', -2);
        $filter_search = Request::getVar('filter_search', "");
        
        $items = array();
        $items[] = array("value"=>-2, "text"=>"- Select state -");
        $items[] = array("value"=>0, "text"=>"Unpublish");
        $items[] = array("value"=>1, "text"=>"Publish");
        $items[] = array("value"=>2, "text"=>"Feature");
       
        $list['filter_state'] = buildHtml::select($items, $filter_state, "filter_state", "filter_state", "onchange=\"document.adminForm.submit();\"");
        
        return $list;
    }
    
    
    public function getItem($cid){
        $obj = YiiTables::getInstance(TBL_VIDEOS);        
        $obj->load($cid);
        return $obj;
    }
    
    public function getListEdit($mainItem)
    {
        $list = array();
        $cid = Request::getVar('cid', "");  

//        $obj_category = YiiCategory::getInstance();
//        $items = $obj_category->loadItems('id value, title text');
//        $list['category'] = buildHtml::select($items, $mainItem->catID, "catID","","size=7");
        $list_value = "";
        if($cid != 0){
            $obj_category_index = YiiTables::getInstance(TBL_PLAYLIST_XREF);
            $list_value = $obj_category_index->loadColumn("playlistID", "`videoID` = $mainItem->id");
        }
        
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
