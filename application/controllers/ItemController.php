<?php

/**
*因为不在同一个文件夹，所以我先引入然后再继承。如果
*Controller是在fastphp目录下，直接可以extends了。
*而不需要再引入。
*
**/
//include_once("fastphp/Controller.php");

/**
也可以这么写，但写入父类更好
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
		//echo 'ItemController 的 index方法';
	}

}
*/

class ItemController extends Controller
{

	// 首页方法，测试框架自定义DB查询
	public function index(){
		
		//echo new ItemModel();die;
		//echo 'ItemController 的 index方法';		
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
			
			// 查询所有内容，并按倒序排列输出
            // where()方法可不传入参数，或者省略
			//$items = (new ItemModel())->where()->order->(['ide DESC'])->fetchAll();
			//$items = (new ItemModel)->where()->order(['id DESC'])->fetchAll();
			
		}
		$this->assign('title','全部条目' );
		$this->assign('keyword', $keyword);
		//$this->assign("items", $items);		
		$this->render();
		
	}
	
	
	
	
	
	

}