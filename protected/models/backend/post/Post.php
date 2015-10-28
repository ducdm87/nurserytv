<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Post extends CFormModel {

    private $table = "{{posts}}";
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

    public function addPost($data) {
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->insert($this->table, $data);
            return $transaction->commit();
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollBack();
        }
    }

    public function updatePost($data) {
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->update($this->table, $data, 'id=:id', array('id' => $data['id']));
            return $transaction->commit();
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollBack();
        }
    }

    public function getPosts($limit = 10, $offset = 0, $where = array()) {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }

        if ($where && is_array($where)) {
            foreach ($where as $key => $value) {
                if (!is_array($value)) {
                    $this->command->where($key, $value);
                } else {
                    foreach ($value as $k => $v) {
                        $this->command->where($k, $v);
                    }
                }
            }
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

    public function deleteRecord($id) {
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->delete($this->table, 'id=:id', array('id' => $id));

            return $transaction->commit();
            ;
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());

            return $transaction->rollback();
        }
    }

    /**
     * 
     * @return type
     */
    public function getCountTotal() {
        $query = $this->command->select('*')
                ->from($this->table)
                ->queryAll();
        return (int) count($query);
    }

}
