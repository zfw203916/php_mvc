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
		if(!$this->table){
			
			// ��ȡģ��������
			$this->model = get_class($this);
			
			// ɾ���������� Model �ַ�
			$this->model = substr($this->model, 0, -5);
			
			// ���ݿ����������һ��
			 $this->table = strtolower($this->model);
			 
			 
		}
		
		
		
	}
	
}