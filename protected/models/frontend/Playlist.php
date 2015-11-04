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
        $item = $command->select('a.*')
                ->from(TBL_VIDEOS ." a")                
                ->leftjoin(TBL_PLAYLIST_XREF ." b", 'a.id=b.videoID')
                ->where("b.playlistID=$id")
                ->queryAll();
//        $item['slug'] = $item['id']."-".$item['alias'];
//        $item['catslug'] = $item['catID']."-".$item['cat_alias'];
//        $item['link'] = Yii::app()->createUrl("videos/detail", array("id"=>$item['id'],"alias"=>$item['alias']));       
//        $item['catlink'] = Yii::app()->createUrl("videos/category", array("alias"=>$item['cat_alias']));
        return $item;
    }
    function getplayist($catID, $alias = null){
        $obj_table = YiiTables::getInstance(TBL_PLAYLIST);
        //$obj_video = YiiTables::getInstance(TBL_VIDEOS);
        if(intval($catID) >0 )
            $item = $obj_table->loadRow("*", " status = 1 AND `id` = $catID");
        else
            $item = $obj_table->loadRow("*", " status = 1 AND `alias` = '$alias'");
         if($item){
            $item['link'] = Yii::app()->createUrl("playlist/detail",array("id"=>$item['id'],"alias"=>$item['alias']));
            //$item['total'] = $obj_video->getTotal(" status = 1 AND `catID` = ".$item['id']);
         }
         //var_dump($item); die;
        return $item;
    }
    //cbv
    function allPlaylist()
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
