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

	// ��ҳ���������Կ���Զ���DB��ѯ
	public function index(){
		//echo new ItemModel();die;
		//echo 'ItemController �� index����';
		/*
		$keyword = isset($_GET['keyword'] ? $_GET['keyword'] : '');
		if($keyword){
			$items = (new ItemModel())->search($keyword);
		}else{
			
		}
		*/
		
	}

}