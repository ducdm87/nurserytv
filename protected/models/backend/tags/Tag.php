<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tag extends CFormModel {

    private $table = "{{tags}}";
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
            $instance = new Tag();
        }
        return $instance;
    }

    public function addTag($data) {

        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->insert($this->table, $data);
            $transaction->commit();
            return TRUE;
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            $transaction->rollback();
            return false;
        }
       
    }

    public function updateTag($data) {
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->update($this->table, $data, 'id=:id', array('id' => $data['id']));
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollback();
        }
        return $transaction->commit();
    }

    public function getTags($limit = 5, $offset = 0, $where = array(), $order = false, $by = false) {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }
        $results = $this->command->select('*')
                ->from($this->table)
                ->queryAll();

        return $results;
    }

    public function countTag() {
        $query = $this->command->select('*')
                ->from($this->table)
                ->queryAll();
        return (int) count($query);
    }

    public function getTagById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id =" . $id . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryRow();
        return $result;
    }

    public function deleteRecord($id) {
        $transaction = $this->connection->beginTransaction();
        try {

            $query = "SELECT * FROM " . $this->table_tag_index . " WHERE tag_id =" . $id . "";
            $conmmand = Yii::app()->db->createCommand($query);
            $check_tags = $conmmand->queryAll();
            if ($check_tags) {
                foreach ($check_tags as $tag) {
                    $this->command->delete($this->table_tag_index, 'id=:id', array('id' => $tag['id']));
                }
            }
            $this->command->delete($this->table, 'id=:id', array('id' => $id));
            return $transaction->commit();
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollback();
        }
    }

}
