<?php
/**
 * fastphp框架核心
 */
class Fastphp
{
	protected $_config = [];
	
	public function __construct($config){
		
		$this->_config = $config;
		//var_dump($this);
		//var_dump($this->_config);
	}
	
	// 运行程序,运行执行注册类。
	public function run(){
		spl_autoload_register(array($this, 'loadClass'));
		$this->route();
	}
	
	// 路由处理
	public function route(){
		$controllerName = $this->_config['defaultController'];
		$actionName = $this->_config['defaultAction'];
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}