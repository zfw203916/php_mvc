<?php
/*
 if(!defined('APP_PATH')){
	 exit("Access Denied!");
 }
 */
 
 //include("../sql.php");
class Model extends Sql
{
	
	protected $model;
	// 获取数据库表名
	public function __construct(){
		
	    // 获取数据库表名
		$this->model = get_class($this);
		
		echo get_class($this);
		
		
	}
	
}