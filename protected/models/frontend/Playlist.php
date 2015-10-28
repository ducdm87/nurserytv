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
    
    
    
}
