<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Media extends CFormModel {

    private $table = "{{videos}}";
    private $table_episode = "{{episode}}";
    private $table_categories = "{{categories}}";
    private $table_tags = "{{tags}}";
    private $table_category_index = "{{category_index}}";
    private $tag_index = "{{tag_index}}";
    private $playlist = "{{playlist}}";
    private $error = "{{error}}";
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
            $instance = new Media();
        }
        return $instance;
    }

    public function getCountTotal($where=false) {
        if ($where && is_array($where)) {
            $this->command->where($where);
        }
        $query = $this->command->select('*')
                ->from($this->table)
                ->queryAll();
        return (int) count($query);
    }

    public function getMedias($limit = 10, $offset = 0, $where = array(), $order = false) {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }

        if ($where && is_array($where)) {
            $this->command->where($where);
        }
        if ($order && is_array($order)) {
            $this->command->order($order);
        }
        $results = $this->command->select('f.*,c.id as cid,c.title as ctitle,c.alias as calias,t.name as tname,t.id as tid,idx.tag_id,cidx.cat_id,p.id as pid,p.name as pname')
                ->from("$this->table  f")
                ->leftJoin("$this->playlist p", "p.id=f.play_id")
                ->leftJoin("$this->tag_index idx", "f.id=idx.video_id")
                ->leftJoin("$this->table_tags t", "t.id=idx.tag_id")
                ->leftJoin("$this->table_category_index cidx", "f.id=cidx.pindex")
                ->leftJoin("$this->table_categories c", "c.id=cidx.cat_id")
                ->group('f.id')
                ->queryAll();

        return $results;
    }

    public function getVideoByPlayList($play_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE play_id =" . $play_id . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryAll();
        return $result;
    }

    public function getMediaById($id) {

        $query = "SELECT * FROM " . $this->table . " WHERE id =" . $id . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryRow();
        return $result;
    }

    public function setView($id) {
        $old_view = $this->get_readview($id);
        $new_view = isset($old_view['viewed']) ? $old_view['viewed'] + 1 : 1;
        $data = array('viewed' => $new_view);
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->update($this->table, $data, 'id=:id', array('id' => $id));
            $transaction->commit();
            return $new_view;
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollBack();
        }
    }

    private function get_readview($id) {
        $query = $this->command->select('viewed')
                ->from($this->table)
                ->where('id=:id', array('id' => $id))
                ->queryRow();
        return $query;
    }

    public function setLiked($id) {
        $old_like = $this->get_readlike($id);
        $new_like = isset($old_like['liked']) ? $old_like['liked'] + 1 : 1;
        $data = array('liked' => $new_like);
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->update($this->table, $data, 'id=:id', array('id' => $id));
            $transaction->commit();
            return $new_like;
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollBack();
        }
    }

    private function get_readlike($id) {
        $query = $this->command->select('liked')
                ->from($this->table)
                ->where('id=:id', array('id' => $id))
                ->queryRow();
        return $query;
    }

    /**
     * Model From Error data
     */
    public function saveError($data) {
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->insert($this->error, $data);
            return $transaction->commit();
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollBack();
        }
    }

}
