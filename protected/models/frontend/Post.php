<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Post extends CFormModel {

    private $table = "{{posts}}";
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
            $instance = new Post();
        }
        return $instance;
    }

    public function getPosts($limit = 10, $offset = 0, $where = '') {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }
        if ($where && is_array($where)) {
            
        }

        $results = $this->command->select('p.*')
                ->from("$this->table  p")
                ->queryAll();
        return $results;
    }

   

    public function getPostById($id) {

        $query = "SELECT * FROM " . $this->table . " WHERE id =" . $id . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryRow();
        return $result;
    }

}
