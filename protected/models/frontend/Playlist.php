<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Playlist extends CFormModel {

    private $table = "{{playlist}}";
    private $table_tag_index = "{{tag_index}}";
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

    public function getPlaylists($limit = 5, $offset = 0, $where = array(), $order = false, $by = false) {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }
        $results = $this->command->select('*')
                ->from($this->table)
                ->queryAll();

        return $results;
    }

    public function countPlaylist() {
        $query = $this->command->select('*')
                ->from($this->table)
                ->queryAll();
        return (int) count($query);
    }

    public function getPlaylistById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id =" . $id . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryRow();
        return $result;
    }
    
    //bg Video playlist cbv
   function getItems($id)
    {
    $command = Yii::app()->db->createCommand();
        $items = $command->select('a.*,c.id id_list,c.name name_list,c.alias alias_list,c.videourl videourl_p,c.videocode videocode_p')
                ->from(TBL_VIDEOS ." a")                
                ->leftjoin(TBL_PLAYLIST_XREF ." b", 'a.id=b.videoID')
                ->leftjoin(TBL_PLAYLIST ." c", 'c.id=b.playlistID')
                ->where("b.playlistID=$id")
                ->queryAll();
  
            $obj_index = YiiTables::getInstance(TBL_PLAYLIST_XREF);
            foreach($items as &$item){
                $item['link'] = Yii::app()->createUrl("videos/detail", array("id" => $item['id'], "alias" => $item['alias']));
                $item['dem_video'] = $obj_index->getTotal("playlistID = ". $id );//tính so video trong playlist
            }
        
        return $items;
    }
    function getplayist_cat($id, $alias = null){
        $command = Yii::app()->db->createCommand();
        $items = $command->select('c.*')
                ->from(TBL_PLAYLIST ." a")
                ->leftjoin(TBL_CATEGORIES_XREF ." b", 'a.id=b.pindex')
                ->leftjoin(TBL_CATEGORIES ." c", 'c.id=b.cat_id')
                ->where("b.pindex=$id")
                ->order("c.id DESC")
                ->queryAll();
            $obj_index = YiiTables::getInstance(TBL_CATEGORIES_XREF);
            foreach($items as &$item){
                $item['link_cat'] = Yii::app()->createUrl("videoscat/", array("id" => $item['id'], "alias" => $item['alias']));
                $item['dem_playlist'] = $obj_index->getTotal("cat_id = ". $item['id'] );//tính so video trong playlist
                addObjectID($item['id'], "playlist");
                
            }
       // var_dump($items); die;
        return $items;
    }
    //cbv
    function allPlaylist()//trang playlist
    {
    $command = Yii::app()->db->createCommand();
        $item = $command->select('a.*')
                ->from(TBL_PLAYLIST ." a")
                ->order("id DESC")
                ->queryAll();
//        $item['slug'] = $item['id']."-".$item['alias'];
//        $item['catslug'] = $item['catID']."-".$item['cat_alias'];
//        $item['link'] = Yii::app()->createUrl("videos/detail", array("id"=>$item['id'],"alias"=>$item['alias']));       
//        $item['catlink'] = Yii::app()->createUrl("videos/category", array("alias"=>$item['cat_alias']));
        //var_dump($item); die;
        $arr=array();
        foreach ($item as $v){
            $id=$v['id'];
            $command = Yii::app()->db->createCommand();
            $itemz = $command->select('a.id')
                ->from(TBL_VIDEOS ." a")                
                ->leftjoin(TBL_PLAYLIST_XREF ." b", 'a.id=b.videoID')
                ->where("b.playlistID={$v['id']}")
                ->queryAll();
                $video=  count($itemz);
            $v['status']=$video;
            $arr[]=$v;
        }
        return $arr;
    }
    
     function CatPlaylist($cat_id=0)
    {
    $command = Yii::app()->db->createCommand();
        $item = $command->select('a.*,d.title cat_title, d.id cat_id')
                ->from(TBL_PLAYLIST ." a")
                ->leftjoin(TBL_PLAYLIST_XREF ." b", 'a.id=b.playlistID')
                ->leftjoin(TBL_CATEGORIES_XREF ." c", 'b.playlistID=c.pindex')
                ->leftjoin(TBL_CATEGORIES ." d", 'd.id=c.cat_id')
                ->where("d.id={$cat_id}")
                ->group('a.id')
                ->order("a.id DESC")
                ->queryAll();
//        $item['slug'] = $item['id']."-".$item['alias'];
//        $item['catslug'] = $item['catID']."-".$item['cat_alias'];
//        $item['link'] = Yii::app()->createUrl("videos/detail", array("id"=>$item['id'],"alias"=>$item['alias']));       
//        $item['catlink'] = Yii::app()->createUrl("videos/category", array("alias"=>$item['cat_alias']));
        //var_dump($item); die;
        $arr=array();
        foreach ($item as $v){
            $id=$v['id'];
            $command = Yii::app()->db->createCommand();
            $itemz = $command->select('a.id')
                ->from(TBL_VIDEOS ." a")                
                ->leftjoin(TBL_PLAYLIST_XREF ." b", 'a.id=b.videoID')
                ->where("b.playlistID={$v['id']}")
                ->queryAll();
                $video=  count($itemz);
            $v['status']=$video;
            $arr[]=$v;
        }
        return $arr;
    }
   
    //E video playlist  cbv
}
