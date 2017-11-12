<?php 

class Test
{
	protected $_controller;
	protected $_action;
	 
	 public function __construct($action){
		 $this->_controller = 'test';
		 $this->_action = $action;
	 }
	
}