<?php

/**
*��Ϊ����ͬһ���ļ��У�������������Ȼ���ټ̳С����
*Controller����fastphpĿ¼�£�ֱ�ӿ���extends�ˡ�
*������Ҫ�����롣
*
**/
//include_once("fastphp/Controller.php");

/**
Ҳ������ôд����д�븸�����
class ItemController 
{
	protected $_controller;
	protected $_action;
	protected $_view;
	
	public function  __construct($controller, $action){
		$this->_controller = $controller;
		$this->_action = $action;
	}
	
	public function index(){
		//echo 'ItemController �� index����';
	}

}
*/

class ItemController extends Controller
{
	
	public function index(){
		//echo 'ItemController �� index����';
	}

}