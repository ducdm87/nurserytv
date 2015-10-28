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

    public function getCountTotal() {
        $query = $this->command->select('*')
                ->from($this->table)
                ->queryAll();
        return (int) count($query);
    }

    public function addMedia($data) {

        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->insert($this->table, $data['video']);
            $fid = $this->connection->getLastInsertID();
            if (isset($data['tags']) && $data['tags']) {
                $data_tag = array();
                foreach ($data['tags'] as $tag) {
                    $data_tag['tag_id'] = $tag;
                    $data_tag['video_id'] = $fid;
                    $this->command->insert($this->tag_index, $data_tag);
                }
            }
            if (isset($data['categories']) && $data['categories']) {
                $data_categori = array();
                foreach ($data['categories'] as $cate) {
                    $data_categori['cat_id'] = $cate;
                    $data_categori['index'] = $fid;
                    $data_categori['type'] = 0;
                    $this->command->insert($this->table_category_index, $data_categori);
                }
            }
            $transaction->commit();
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
             $transaction->rollBack();
        }
        return $fid;
    }

    public function getMedias($limit = 10, $offset = 0, $where = array()) {

        if ($limit > 0) {
            $this->command->limit($limit, $offset);
        }

        if ($where && is_array($where)) {
            $this->command->where($where);
        }

        $results = $this->command->select('f.*,c.id as cid,c.title as ctitle,c.alias as calias,t.name,t.id as tid,idx.tag_id,cidx.cat_id,p.id as pid,p.name as pname,p.alias as palias')
                ->from("$this->table  f")
                ->leftJoin("$this->playlist p", "p.id=f.play_id")
                ->leftJoin("$this->tag_index idx", "f.id=idx.video_id")
                ->leftJoin("$this->table_tags t", "t.id=idx.tag_id")
                ->leftJoin("$this->table_category_index cidx", "f.id=cidx.pindex")
                ->leftJoin("$this->table_categories c", "c.id=cidx.pindex")
                ->group('f.id')
                ->queryAll();

        return $results;
    }

    public function deleteRecord($id) {
        $transaction = $this->connection->beginTransaction();
        try {
            $query_tag = "SELECT * FROM " . $this->tag_index . " WHERE video_id =" . $id . "";
            $conmmand_tag = Yii::app()->db->createCommand($query_tag);
            $check_tags = $conmmand_tag->queryAll();

            if ($check_tags) {
                foreach ($check_tags as $tag) {
                    $this->command->delete($this->tag_index, 'id=:id', array('id' => $tag['id']));
                }
            }

            $query_cate = "SELECT * FROM " . $this->table_category_index . " WHERE pindex =" . $id . " AND type=0";
            $conmmand_cate = Yii::app()->db->createCommand($query_cate);
            $check_cate = $conmmand_cate->queryAll();
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

    public function updateMedia($data) {
        $transaction = $this->connection->beginTransaction();
        try {

            $this->command->update($this->table, $data['video'], 'id=:id', array('id' => $data['video']['id']));
            if (isset($data['tags']) && $data['tags']) {
                foreach ($data['tags'] as $tag) {
                    $data_tags = array('tag_id' => $tag, 'video_id' => $data['video']['id']);
                    $query = "SELECT * FROM " . $this->tag_index . " WHERE tag_id =" . $tag . "";
                    $conmmand = Yii::app()->db->createCommand($query);
                    $check_tags = $conmmand->queryAll();
                    if ($check_tags) {
                        foreach ($check_tags as $t) {
                            $this->command->update($this->tag_index, $data_tags, 'id=:id', array('id' => $t['id']));
                        }
                    } else {
                        $this->command->insert($this->tag_index, $data_tags);
                    }
                }
            }


            if (isset($data['categories']) && $data['categories']) {
                foreach ($data['categories'] as $cate) {
                    $data_cates = array('cat_id' => $cate, 'pindex' => $data['video']['id'], 'type' => 0);
                    $query_cate = "SELECT * FROM " . $this->tag_index . " WHERE tag_id =" . $tag . "";
                    $conmmand_cate = Yii::app()->db->createCommand($query_cate);
                    $check_cates = $conmmand_cate->queryAll();
                    if ($check_cates) {
                        foreach ($check_tags as $c) {
                            $this->command->update($this->table_category_index, $data_cates, 'id=:id', array('id' => $c['id']));
                        }
                    } else {
                        $this->command->insert($this->tag_index, $data_cates);
                    }
                }
            }


            return $transaction->commit();
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            return $transaction->rollBack();
        }
    }

    public function getMediaById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id =" . $id . "";
        $conmmand = Yii::app()->db->createCommand($query);
        $result = $conmmand->queryRow();
        return $result;
    }

    public function getVideoAndByTag($fid) {
        $results = $this->command->select('idx.video_id,idx.tag_id,t.*')
                ->from("$this->tag_index  idx")
                ->join("$this->table_tags t", "t.id=idx.tag_id")
                ->where("idx.video_id=$fid")
                ->queryAll();
        return $results;
    }

    public function deleteTagIndexByVideo($fid) {
        $transaction = $this->connection->beginTransaction();
        try {
            $this->command->delete($this->tag_index, 'video_id=:vid', array('vid' => $fid));
            $transaction->commit();
            return TRUE;
        } catch (Exception $e) {
            Yii::log('Eror!: ' + $e->getMessage());
            $transaction->rollback();
            return false;
        }
    }

    public function getVideoAndByCategories($fid) {
        $results = $this->command->select('idx.pindex,idx.cat_id,c.*')
                ->from("$this->table_category_index  idx")
                ->join("$this->table_categories c", "c.id=idx.cat_id")
                ->where("idx.pindex=$fid")
                ->queryAll();
        return $results;
    }

    private function set_userdata($data) {
        $session = Yii::app()->session;
        $session['insertID'] = $data;
        return $session;
    }

}
