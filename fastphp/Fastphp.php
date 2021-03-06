<?php
/**
 * fastphp框架核心
 */

 
//没有从index.php走的访问一律提示无权限。
 if(!defined('APP_PATH')){
	 exit("Access Denied!");
 }
 
 
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
		$this->removeMagicQuotes(); // 检测敏感字符并删除
		$this->unregisterGlobals();//移除全局变量的老用法
        $this->setDbConfig();//配置数据库信息
		$this->route();//处理路由
		
	}
	
	
	/**
	 * 路由处理
	 * 执行这里的路由和程序。
	 * 路由方法，作用是：截取URL，并解析出控制器名、方法名和URL参数。
	 * 当浏览器访问上面的URL，route()从全局变量 $_SERVER['REQUEST_URI']中获取到字符串/controllerName/actionName/queryString。
	 * 然后，会将这个字符串分割成三部分：controller、action 和 queryString。
	 **/
	public function route(){
		
		$controllerName = $this->_config['defaultController'];//拿到这个配置的数值
		$actionName = $this->_config['defaultAction'];//拿到这个配置的数值
		//echo  $actionName;die;
		//var_dump($controllerName);die;
		$param = array();
		$url = $_SERVER['REQUEST_URI'];
		
		//var_dump($url);die;
		// 清除?之后的内容
		$position = strpos($url, '?');//查找?第一次出现的位置
		//var_dump($url);die;
		
		//就是截取后面的http://www.163.com/c/a/v 的/c/a/v 并方便它分解出来。		
		$url = $position === false ? $url : substr($url, 0 , $position);
		//var_dump($url);die;
		
		// 删除前后的“/”
		$url = trim($url, '/'); //找到问题，出现在这里。
		//var_dump($url);die;  
		
		if($url){
			
			//echo 2;die;
			// 使用“/”分割字符串，并保存在数组中
			$urlArray = explode('/', $url);
			//var_dump($urlArray);die;
			
			// 删除空的数组元素
			$urlArray = array_filter($urlArray);
			//var_dump($urlArray);die;
			
			// 获取控制器名
			$controllerName = ucfirst($urlArray[0]);
			
			// 获取动作名, 删除第一个数组。
			//也就是剩下第二个和参数了,取第一个也就是方法名了，
			array_shift($urlArray);
			$actionName = $urlArray ? $urlArray[0] : $actionName;
			
			// 获取URL参数
			array_shift($urlArray);
			$param = $urlArray ? $urlArray : array();
			
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
	
	
	 /** 检测自定义全局变量并移除。因为 register_globals 已经弃用，如果
     * 已经弃用的 register_globals 指令被设置为 on，那么局部变量也将
     * 在脚本的全局作用域中可用。 例如， $_POST['foo'] 也将以 $foo 的
     * 形式存在，这样写是不好的实现，会影响代码中的其他变量。 相关信息，
     * 参考: http://php.net/manual/zh/faq.using.php#faq.register-globals
	 **/
	public function unregisterGlobals(){
							
		if(ini_get('register_globals')){
		
			$array = ['_SESSION','_POST','_COOKIE','_REQUEST','_SERVER','_ENV','_ENV','_FILES'];					
			foreach($arrayStr as $value){
				//var_dump($arrayStr);
			}
			
		}
	}
		
	
	/**
	*	配置数据库信息,重新配置定义
	**/
	public function setDbConfig(){
		
		//var_dump($this->_config['db']);die;
		if($this->_config['db']){
			define("DB_HOST", $this->_config['db']['host']);
			define("DB_NAME", $this->_config['db']['dbname']);
			define("DB_USER", $this->_config['db']['username']);
			define("DB_PASS", $this->_config['db']['password']);
			
		}
	}
	
	/*
	public function setDbConfig(){
		if($this->_config['db']{
			Model::$dbconfig = $this->_config['db'];
		}
	}
	*/
	
	/**
	*  自动加载控制器和模型类 
	**/
	public static function loadClass($class){
		
		//var_dump($class);die; //ItemController
		//应该是controller
		
		 $frameworks = __DIR__ . '/' . $class . '.php';
		//var_dump($frameworks);die;
		//var_dump(__DIR__);die;
		
		$controllers = APP_PATH . 'application/controllers/' . $class . '.php';
		//var_dump($controllers);die;
		//$models = APP_PATH . 'application/controllers/' . $class . '.php';
		 $models = APP_PATH . 'application/models/' . $class . '.php';
		//var_dump($models);die;
		
		//也就是下面如果文件都存在的话，是都加载进来的。
		if(file_exists($frameworks)){
			
			// 加载框架核心类
			//string(46) "D:\phpStudy\WWW\php_mvc\fastphp/Controller.php" 加载Controller.php是正确的
			include $frameworks;
			//var_dump($frameworks);die;
			
		}elseif(file_exists($controllers)){
			
			// 加载应用控制器类
			include $controllers;
			//var_dump($controllers);die;
			//string(66) "D:\phpStudy\WWW\php_mvc/application/controllers/ItemController.php" 
			
		}elseif(file_exists($models)){
			echo 1;die;//不包含model文件，问题出在哪里呢
			//加载应用模型类
			include $models;
			//var_dump($models);die;  
		    //string(61) "D:\phpStudy\WWW\php_mvc/application/models/ItemController.php" 是有问题的，
			//应该是 string(56) "D:\phpStudy\WWW\fastphp/application/models/ItemModel.php" 
			
		}else{
			
			echo '错误';
			
		}

		
}
		
	
	
}