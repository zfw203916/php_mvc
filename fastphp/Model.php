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
	// ��ȡ���ݿ����
	public function __construct(){
		
	    // ��ȡ���ݿ����
		$this->model = get_class($this);
		
		echo get_class($this);
		
		
	}
	
}