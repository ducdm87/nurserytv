<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MenuItem extends CFormModel {

    private $table = '{{menu_item}}';
    private $tbl_menu = '{{menus}}';
    private $tbl_menu_xref = '{{module_menuitem_ref}}';
    private $command;
    private $connection;

    function __construct() {
        $this->command = Yii::app()->db->createCommand();
        $this->connection = Yii::app()->db;
    }

    static function getInstance(){
        static $instance;

        if (!is_object($instance)) {
            $instance = new MenuItem();
        }
        return $instance;
    } 
    
    /**
     * 
     * @param type $limit
     * @param type $offset
     * @param type $where
     * @param type $or_where
     * @param type $order
     * @param type $by
     * @param type $query 
     */
    public function getMenuItems() {

        $where = $this->_buildWhere();
        $limit = Request::getInt('limit', getSysConfig("pages.limit",15));
        $limitstart = Request::getInt('limitstart', 0);
        
        $this->command->limit($limit, $limitstart);

        $this->command->select("*");
        $this->command->from($this->table);
        $this->command->where($where);
        $sarch = Request::getVar('filter_search', "");
        if($sarch != ""){
            $s = "%$sarch%";
            $this->command->bindParam(':filter_search', $s );
        }
        
        $results = $this->command->select('*')
                ->from($this->table)
                ->queryAll();

        return $results;
    }
    
    function _buildWhere()
    {
        $where = array();
        $menuID = Request::getInt('menu', "");
        if($menuID>0)
            $where[]  = " menuID = $menuID ";
        
        $status = Request::getInt('filter_status', -1);
        if($status != -1){
            $where[]  = " status = $status ";
        }
        
        $sarch = Request::getVar('filter_search', "");
        if($sarch != ""){
            $w  = "( `title` like :filter_search ";
            $w  .= " OR `controller` like :filter_search  ";
            $w .= " OR `params` like :filter_search  )";
            $where[]  = " $w ";
        }
        if(count($where)>0) return "  ". implode (" AND ", $where);
        else return "";
    }

    
    function getList()
    {
        $menuID = Request::getInt('menu', "");
        
        $list = array();        
        $command = Yii::app()->db->createCommand();
        $results = $command->select('id value, title text')
                ->from($this->tbl_menu)
                ->queryAll();
        $list['filrer_menu'] = buildHtml::select($results, $menuID, "menu", "", " onchange='this.form.submit();' ");
        
        return $list;
    }
    

    function getListEdit($currentLevel = 1, $parentID = -1)
    {
        $cid = Request::getVar("cid", 0);
        $menuID = Request::getInt('menu', "");
        
        $list = array();
        $items[] = array("value" => "-1", "text"=>"-- Select Menu --");
        $command = Yii::app()->db->createCommand();
        $results = $command->select('id value, title text')
                ->from($this->tbl_menu)
                ->queryAll();
        $items = array_merge($items, $results);
        $list['menuID'] = buildHtml::select($items, $menuID, "menuID");
        
        $items = array();
        $items[] = array("value" => "-1", "text"=>"Top");
        $command = Yii::app()->db->createCommand();
        $results = $command->select('id value, title text')
                ->from($this->table)
                ->queryAll();
        
        $items = array_merge($items, $results);      
        $list['parentID'] = buildHtml::select($items, $parentID, "parentID","","size=10");
        
        return $list;
    }
    
}
