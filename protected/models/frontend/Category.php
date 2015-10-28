<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category extends CFormModel {

    private $table = "{{categories}}";
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
            $instance = new Category();
        }
        return $instance;
    }

    public function getCategories($limit = 5, $offset = 0, $where = array(), $query = false, $or_where = false, $order = false, $by = false) {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }

        if ($where && is_array($where)) {
            foreach ($where as $key => $value) {
                if (!is_array($value)) {
                    $this->command->where("$key =:$key", array("$key" => $value));
                }
//                else {
//                    foreach ($value as $k => $v) {
//                        $this->command->where("$k :=$k", array("$k" => $v));
//                    }
//                }
            }
        }

        $results = $this->command->select('*')
                ->from($this->table)
                ->queryAll();

        return $results;
        //$this->command->reset();
    }

    public function getCategoryById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id =" . $id . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryRow();
        return $result;
    }

    public function getCategoryByAlias($alias) {
        $query = "SELECT * FROM " . $this->table . " WHERE alias =" . $alias . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryRow();
        return $result;
    }

   

}
