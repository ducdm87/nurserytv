<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Playlist extends CFormModel {

    private $table = "{{playlist}}";
    private $table_category_index = "{{category_index}}";
    private $table_category = "{{categories}}";
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

    public function addPlaylist($data) {

        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->insert($this->table, $data['playlist']);
            $fid = $this->connection->getLastInsertID();
            if (isset($data['categories']) && $data['categories']) {
                $data_categori = array();
                foreach ($data['categories'] as $cate) {
                    $data_category['cat_id'] = $cate;
                    $data_category['pindex'] = $fid;
                    $data_category['type'] = 1;
                    $this->command->insert($this->table_category_index, $data_category);
                }
            }
            return $transaction->commit();
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            $transaction->rollback();
            return false;
        }
    }

    public function updatePlaylist($data) {
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->update($this->table, $data['playlist'], 'id=:id', array('id' => $data['playlist']['id']));
            if (isset($data['categories']) && $data['categories']) {
                foreach ($data['categories'] as $category) {
                    $data_cates = array('cat_id' => $category, 'pindex' => $data['playlist']['id'],'type'=>1);
                    $query = "SELECT * FROM " . $this->table_category_index . " WHERE cat_id =" . $category . "";
                    $conmmand = Yii::app()->db->createCommand($query);
                    $check_category = $conmmand->queryAll();
                    if ($check_category) {
                        foreach ($check_category as $t) {
                            $this->command->update($this->table_category_index, $data_cates, 'id=:id', array('id' => $t['id']));
                        }
                    } else {
                        $this->command->insert($this->table_category_index, $data_cates);
                    }
                }
            }
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollback();
        }
        return $transaction->commit();
    }

    public function getPlaylists($limit = 5, $offset = 0, $where = array(), $order = false, $by = false) {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }
        $results = $this->command->select('p.*,idx.cat_id')
                ->from("$this->table p")
                ->leftJoin("$this->table_category_index idx", "p.id=idx.cat_id")
                ->group('p.id')
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

    public function getCategoryByPlaylist($pid) {
        $query = "SELECT * FROM " . $this->table_category_index . " WHERE pindex =" . $pid . " AND type=1";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryAll();
        return $result;
    }

    public function deleteRecord($id) {
        $transaction = $this->connection->beginTransaction();
        try {

            $query = "SELECT * FROM " . $this->table_category_index . " WHERE cat_id =" . $id . "";
            $conmmand = Yii::app()->db->createCommand($query);
            $check_cate = $conmmand->queryAll();
            if ($check_cate) {
                foreach ($check_cate as $cate) {
                    $this->command->delete($this->table_category_index, 'id=:id', array('id' => $cate['id']));
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
