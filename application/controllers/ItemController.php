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
		$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
		if($keyword){
			//var_dump($this);die;
			//var_dump(self::$pdo);die;
			//$sql = sprintf("select * from `%s` %s", $this->table, $this->filter);
			//$sql = sprintf("select * from item");
			/*
			$sth = Db::pdo()->prepare("select * from item");
			$sth = $this->formatParam($sth, $this->param);
			$sth->execute();	
			*/			
			//$items = (new ItemModel())->search($keyword);
			//var_dump(new ItemModel());die;
			  			
		}else{
			
			// ��ѯ�������ݣ����������������
            // where()�����ɲ��������������ʡ��
			//$items = (new ItemModel())->where()->order->(['ide DESC'])->fetchAll();
			//$items = (new ItemModel)->where()->order(['id DESC'])->fetchAll();
			
		}
		$this->assign('title','ȫ����Ŀ' );
		$this->assign('keyword', $keyword);
		//$this->assign("items", $items);		
		$this->render();
		
	}
	
	
	
	
	
	

}