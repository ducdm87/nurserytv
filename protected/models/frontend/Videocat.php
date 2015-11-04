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
  
 function getPlaylist($id=0)
    {
    $command = Yii::app()->db->createCommand();
        $item = $command->select('c.*')
                ->from(TBL_VIDEOS. " a")                
                ->leftjoin(TBL_PLAYLIST_XREF . " b", 'a.id = b.videoID')
                ->leftjoin(TBL_PLAYLIST . " c", 'c.id = b.playlistID')
                ->where("a.id=$id")
                ->queryRow();
        $item['slug'] = $item['id']."-".$item['alias'];
        $item['catslug'] = $item['id']."-".$item['alias'];
        $item['link'] = Yii::app()->createUrl("playlist/detail", array("id"=>$item['id'],"alias"=>$item['alias']));
        if($item['id']==null){$item=1;}
        return $item;  
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

//ChinhBV begin playlist
    function getVideos($limit = 2, $listid = ""){
        global $mainframe, $db;
        $where = " "; 
        if($listid != ""){ $where .= " AND id in($listid) "; }
        
        $query = "SELECT * FROM " . TBL_CATEGORIES  
                    ." WHERE feature = 1 AND `scope` ='playlists' "
                   ." ORDER BY ordering ASC";
        $query_command = $db->createCommand($query);
        $items = $query_command->queryAll();
          
        
        $arr_new = array();
         for($i=0;$i<count($items);$i++){
             $item = $items[$i];
             $item['link'] = Yii::app()->createUrl("playlist/detail",array("id"=>$item['id'],"alias"=>$item['alias']));
             $item['playlist'] = $this->getNewCategoy($item['id'],0, $limit);
             //var_dump($item['playlist']); die;
             $arr_new[$item['id']] = $item; 
         }
         $items = $arr_new;
         
         if($listid != ""){
             $listid = explode(",", $listid);
             $arr_new = array();
             foreach ($listid as $k=>$id){
                 if(isset($items[$id]))
                    $arr_new[$id] = $items[$id];
             }
             $items = $arr_new;
         }
       //var_dump($items); die;
        return $items; 
    }
    
    
     function getItems($alias)
    {
    $command = Yii::app()->db->createCommand();
        $where = array();
        $where[] = " a.status = 1 ";
        $where[] = " a.alias = '$alias' ";
        $where[] = " b.status = 1 ";
        $command->where(implode(" AND ", $where));
        
        $item = $command->select('a.*,b.title cat_title, b.alias cat_alias')
                ->from("$this->table  a")                
                ->leftjoin("$this->table_categories  b", 'a.catID=b.id')
                ->queryRow();
        $item['slug'] = $item['id']."-".$item['alias'];
        $item['catslug'] = $item['catID']."-".$item['cat_alias'];
        $item['link'] = Yii::app()->createUrl("videos/detail", array("id"=>$item['id'],"alias"=>$item['alias']));       
        $item['catlink'] = Yii::app()->createUrl("videos/category", array("alias"=>$item['cat_alias']));
        return $item;
    }
     function getItemsall($id)
    {
    $command = Yii::app()->db->createCommand();
        $item = $command->select('a.*')
                ->from("$this->table  a")                
                ->leftjoin(TBL_PLAYLIST_XREF ." b", 'a.id=b.videoID')
                ->where("b.playlistID=$id")
                ->queryAll();
        return $item;
    }
    function getVideodon($id)
    {
    $command = Yii::app()->db->createCommand();
        $item = $command->select('*')
                ->from("$this->table ")                
                ->where("id=$id")
                ->queryRow();
        return $item;
    }
    
    function getCategory($catID, $alias = null){
        $obj_table = YiiTables::getInstance(TBL_CATEGORIES);
        $obj_video = YiiTables::getInstance(TBL_VIDEOS);
        
        if(intval($catID) >0 )
            $item = $obj_table->loadRow("*", " status = 1 AND `id` = $catID");
        else
            $item = $obj_table->loadRow("*", " status = 1 AND `alias` = '$alias'");
         
         if($item){
            $item['link'] = Yii::app()->createUrl("videos/category",array("alias"=>$item['alias']));
            $item['total'] = $obj_video->getTotal(" status = 1 AND `catID` = ".$item['id']);
         }
         
        return $item;
    }
    
    function getNewCategoy($catID, $start = 0, $limit = 100)
    {
        global $mainframe, $db;
        $list_ids = getListObjectID("videos");

        $where = array();
        $where[] = "A.status = 1";
        
        $where[] = "B.cat_id = $catID ";
        if($list_ids != false and $list_ids != ""){
        	$where[] = "A.id not in($list_ids)";
        }
        $where = implode(" AND ",$where);
        
        $command = Yii::app()->db->createCommand();
        $command->select("A.*")
                ->from(TBL_PLAYLIST . " A")
                ->leftJoin(TBL_CATEGORIES_XREF . " B", "A.id = B.pindex")
                ->where($where)
                ->order("A.cdate DESC")
                ->limit($limit, $start)
                ;
        $items = $command->queryAll();
        
        if(count($items)){
            $obj_index = YiiTables::getInstance(TBL_PLAYLIST_XREF);
            foreach($items as &$item){
                $item['link'] = Yii::app()->createUrl("playlist/detail", array("id" => $item['id'], "alias" => $item['alias']));
                $item['count'] = $obj_index->getTotal("playlistID = ". $item['id']);
                addObjectID($item['id'], "videos");
            }
        }
        //var_dump($items);
        return $items;
    } 
    
//END ChinhBV playlist
    
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
