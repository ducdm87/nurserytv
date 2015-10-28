<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class WelcomeController extends Controller{
    
    
    
    function init() {
        parent::init();
    }
    
    public function actionDisplay() {
        $this->render('default', array("items" => '$items', "lists"=>'$lists'));
    }
    
}