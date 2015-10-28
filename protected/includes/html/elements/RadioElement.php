<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RadioElement
{
    private $node = "";
    private $value = null;
    
    /*
     * $node: node of xml
     */
    function __construct($node, $value = null) {
        $this->node = $node;
        $this->value = $value;
        if($this->value == null)
            $this->value = $this->node['default'];
    }
    function build($prefix_name = "params")
    {
        
        $name = $prefix_name."[".$this->node['name']."]";
        $id = $prefix_name."-".$this->node['name']."-";

        return '<div class="row form-group"> <div class="col-md-3" title="'.$this->node['description'].'">'.$this->node['label'].'</div> '
                . '<div class="col-md-9"><div class="radio"><label> <input type="radio"  name="'.$name.'" id="'.$id.'" '.$this->node['attr'].' />'.$this->value.'</label></div> </div> '
                ." </div>";
    }
}