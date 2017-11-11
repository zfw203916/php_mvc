<?php
class registerClass{
	
	public static function register($classname){
		$filename = "./".$classname . '.php';
		//var_dump($filename);die;
		if(is_file($filename)){
			//require_once($file);
			include_once($filename);
		}
		
	}
	
}
spl_autoload_register("registerClass::register");
$obj = new myClass();
$newObj = new newClass();
