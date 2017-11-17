<?php
/**
 * fastphp框架核心
 */
class Fastphp
{
	protected $_config = [];
	
	//构造函数
	public function __construct($config){
		
		$this->_config = $config;
		//var_dump($this);
		//var_dump($this->_config);
	}
	
	
	/**
	* run()方法则调用用类自身方法，
	* 完成：自动加载类文件、监测开发环境、过滤敏感字符、移除全局变量的老用法、和处理路由。
	* 运行程序,运行执行注册类。
	**/
	public function run(){
		//echo $this->_config['defaultAction'];die;
		//var_dump($this->route());die;
		//var_dump(array($this, 'loadClass'));die;
		//var_dump (spl_autoload_register(array($this, 'loadClass')));die;
		//spl_autoload_register("Fastphp::loadClass");
		spl_autoload_register(array($this, 'loadClass'));//自动加载类文件
		$this->setReporting();//检测开发环境
		//@$this->stripSlashesDeep();//删除敏感字符
		$this->route();//处理路由
	}
	
	
	/**
	 * 路由处理
	 * 执行这里的路由和程序。
	 **/
	public function route(){
		
		$controllerName = $this->_config['defaultController'];//拿到这个配置的数值
		$actionName = $this->_config['defaultAction'];//拿到这个配置的数值
		//echo  $actionName;die;
		
		$param = array();
		$url = $_SERVER['REQUEST_URI'];
		
		
		// 清除?之后的内容
		$position = strpos($url, '?');//查找?第一次出现的位置
		$url = $position === false ? $url : substr($url, 0 , $position);		
		//var_dump($url);die;
			
		// 删除前后的“/”
		$url = trim($url, '/');
		if($url){
			echo 2;
		}
		//echo 2;die;
			
		// 判断控制器和操作是否存在
		$controller = $controllerName . 'Controller';
		//var_dump($controller);die;		
		
		if(!class_exists($controller)){
			exit($controller . '控制器不存在');
		}
				
		//index的方法一定要存在，这个是判断ItemController中index()的方法的。
		if(!method_exists($controller, $actionName)){
			exit($actionName . '方法不存在');
		}		
		
		/**
		* 如果控制器和操作名存在，则实例化控制器，因为控制器对象里面
        * 还会用到控制器名和操作名，所以实例化的时候把他们俩的名称也
        * 传进去。结合Controller基类一起看
		*
		* 这个是传入ItemController的实例化，但由于这个是继承Controller，所以
		* 看Controller构造函数即可。
		*/
		$dispatch = new $controller($controller, $actionName);
		//$dispatch = new $controller();
		//var_dump($dispatch);die;
				
		/**
		* $dispatch保存控制器实例化后的对象，我们就可以调用它的方法，
        * 也可以像方法中传入参数，以下等同于：$dispatch->$actionName($param)
		**/
		call_user_func_array(array($dispatch, $actionName), $param);	
		
	}
	
	
	 /**
     *检测开发环境
	 **/
	 public function setReporting(){
		 if(APP_DEBUG === true){
			error_reporting(E_ALL);
			ini_set('display_errors', 'On');
		 }else{
			 error_reporting(E_ALL);
			 ini_set('display_errors', 'Off');
			 ini_set('log_errors', 'On');
		 }
	 }
	
	/**
     *删除敏感字符
	 **/
	public function stripSlashesDeep($value){
		
		$value = is_array($value) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripslashes($value);
		return $value;
	}
	
	/**
	*检测敏感字符并删除
	**/
	public function removeMagicQuotes(){
		if(get_magic_quotes_gpc()){
			
		}
	}
	
	
	
	
	/**
	*  自动加载控制器和模型类 
	**/
	public static function loadClass($class){
		
		//var_dump($class);die;
		$frameworks = __DIR__ . '/' . $class . '.class.php';
		//var_dump($class, '----',$frameworks);die;
		
		$controllers = APP_PATH . 'application/controllers/' . $class . '.class.php';
		//var_dump($controller);die;
		
		$models = APP_PATH . 'application/models/' . $class . '.class.php';
		
		if(file_exists($frameworks)){
			
			// 加载框架核心类
			include $frameworks;
			
		}elseif(file_exists($controllers)){
			
			// 加载应用控制器类
			include $controllers;
			
		}elseif(file_exists($models)){
			
			 //加载应用模型类
			include $models;
			
		}else{
			
			echo '错误';
			
		}


		
}
	
	
	
	
	
}