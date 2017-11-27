<?php

/**
 * 视图基类
 */
  if(!defined('APP_PATH')){
	 exit("Access Denied!");
 }
 
 class View 
 {
	 protected $variables = array();
	 protected $_controller;
	 protected $_action;
	 
	 public function __construct($controller, $action){
		$this->_controller = strtolower($controller);
		$this->_action = strtolower($action);
		//var_dump($this->_controller);
	 }
	 
	 /*
	 * 分配变量
	 *
	 **/ 
	 public function assign($name, $value){
		 
		//echo 'this is assgin';
		//var_dump($this->variables);die;
		$this->variables[$name] = $value;
		//var_dump($this->variables[$name],'====',$value);die;
	
		 
	 }
	 
	 /**
	 *  渲染显示
	 **/
	 public function render(){
		 
		  //$keyword = $this->test01($keyword);
		 //echo 'father';
		 
		 extract($this->variables);
		 $defaultHeader = APP_PATH . 'application/views/common/header.php';
		 $defaultFooter = APP_PATH . 'application/views/common/footer.php';
		
		 /*		
		 $controllerHeader = APP_PATH . 'application/views/' . $this->_controller . '/header.php';
		 $connectionFooter = APP_PATH . 'application/views/' . $this->_controller . '/footer.php';
		 $connectionLayout = APP_PATH . 'application/views/' . $this->_controller . '/' . $this->_action . '.php';
		*/
		 $controllerHeader = APP_PATH . 'application/views/common/header.php';
		 $connectionFooter = APP_PATH . 'application/views/common/footer.php';
		 $connectionLayout = APP_PATH . 'application/views/item/' . $this->_action . '.php';
		 //var_dump($connectionLayout);die;
		 
		 //页头文件
		if(file_exists($controllerHeader)){
			include ($controllerHeader);
		}else{
			include($defaultHeader);
		}
		
		//判断视图文件是否存在
		if(file_exists($connectionLayout)){
			include ($connectionLayout);
		}else{
			echo "<h1>无法找到试图文件</h1>";
		}
		
		 // 页脚文件
		 if(file_exists($connectionFooter)){
			 include($connectionFooter);
		 }else{
			 include($defaultFooter);
		 }
		 		 		 
	 }
	 
	 
 }