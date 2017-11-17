<?php

/**
 * 控制器基类(Controller基类)
 */
include_once("fastphp/View/View.class.php");
class Controller
{
	protected $_controller;
	protected $_action;
	protected $_view;
	protected $_test;
	
	// 构造函数，初始化属性，并实例化对应模型
	public function __construct($controller, $action){
		
		
		$this->_controller = $controller;
		$this->_action = $action;
		$this->_view = new View();
		
		/**
		*测试的类。也测试如何加载进来的类。
		*没必要这样加载include_once("fastphp/View/View.class.php");
		**/	
		$this->_test = new Test($action);
		
		/*
		$this->_controller = 'a';
		$this->_action = 'b';
		$this->_view = 'c';
		*/
		
	}
	


	





	
}