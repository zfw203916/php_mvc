<?php

/**
 * 控制器基类(Controller基类)
 */
  if(!defined('APP_PATH')){
	 exit("Access Denied!");
 }
 
include_once("fastphp/View/View.class.php");
class Controller
{
	protected $_controller;
	protected $_action;
	protected $_view;//此时是个对象了。
	protected $_test;
	
	// 构造函数，初始化属性，并实例化对应模型
	public function __construct($controller, $action){
		
		$this->_controller = $controller;
		$this->_action = $action;
		$this->_view = new View($controller, $action);
		
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
		//var_dump($this->_view->assign());
		
		//var_dump($this->_view->render());//父类的render的方法。
		//$this->render();//当前类的render方法.
	}
	
	
	/**
	* 分配变量,
	* 把view对象的assing方法传到了这里了。
	**/ 
	public function assign($name, $value){
		
		//var_dump($name);die;
		$this->_view->assign($name, $value);
		
	}
	

	/**
	 *  渲染视图
	 **/
	public function render(){
		
		//echo 'the same';
		$this->_view->render();
		
	}
	
}