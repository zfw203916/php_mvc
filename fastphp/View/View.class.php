<?php

/**
 * 视图基类
 */
 
 class View 
 {
	 protected $vaiables = [];
	 protected $_controller;
	 protected $_action;
	 
	 public function __construct($controller, $action){
		$this->_controller = strtolower($controller);
		$this->_action = strtolower($action);
	 }
	 
	 /*
	 * 分配变量
	 *
	 **/ 
	 public function assign($name, $value){
		 
		//echo 'this is assgin';
		//var_dump($this->vaiables);
		//$this->vaiables[$name] = $value;//
	
		 
	 }
	 
	 /**
	 *  渲染显示
	 **/
	 public function render(){
		 
		 //echo 'father';
		 		 		 
	 }
	 
	 
 }