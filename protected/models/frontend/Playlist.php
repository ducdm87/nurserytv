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
                ->from(TBL_VIDEOS. " a")                
                ->leftjoin(TBL_PLAYLIST_XREF . " b", 'a.id = b.videoID')
                ->where("b.playlistID=$id")
                ->queryAll();
//        $item['slug'] = $item['id']."-".$item['alias'];
//        $item['catslug'] = $item['id']."-".$item['alias'];
//        $item['link'] = Yii::app()->createUrl("videos/detail", array("id"=>$item['id'],"alias"=>$item['alias']));       
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
    //E video playlist  cbv
}
