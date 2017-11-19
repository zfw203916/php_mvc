<?php 

 if(!defined('APP_PATH')){
	 exit("Access Denied!");
 }
 
class Test
{
	protected $_controller;
	protected $_action;
	 
	 public function __construct($action){
		 $this->_controller = 'test';
		 $this->_action = $action;
	 }
	
	public function index($str){
		echo  $str;
		return $str;
	}
}