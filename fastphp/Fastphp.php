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
		//echo $this->_config['defaultAction'];die;
		//var_dump($this->route());die;
		//var_dump(array($this, 'loadClass'));die;
		spl_autoload_register(array($this, 'loadClass'));
		$this->route();
	}
	
	// 路由处理
	public function route(){
		
		$controllerName = $this->_config['defaultController'];
		$actionName = $this->_config['defaultAction'];
		//return $actionName;
		$param = array();
		$url = $_SERVER['REQUEST_URI'];
		
		// 清除?之后的内容
		$position = strpos($url, '?');//查找?第一次出现的位置
		$url = $position === false ? $url : substr($url, 0 , $position);		
		
		// 删除前后的“/”
		$url = trim($url, '/');
		if($url){
			echo 1;
		}
		//echo 2;
		
		// 判断控制器和操作是否存在
		$controller = $controllerName . 'Controller';
		//var_dump($controller);die;
		if(!class_exists($controller)){
			exit($controller . '控制器不存在');
		}
		
		if(!method_exists($controller, $actionName)){
			exit($actionName . '方法不存在');
		}
		
		
	}
	
	
	
	
	public function loadClass(){
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}