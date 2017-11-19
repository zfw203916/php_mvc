<?php
/*
 if(!defined('APP_PATH')){
	 exit("Access Denied!");
 }
 */
/**
* 数据库基类
*
*	Sql.php 是框架的核心部分。为什么？
	因为通过它，我们创建了一个 SQL 抽象层，可以大大减少了数据库的编程工作。
	虽然 PDO 接口本来已经很简洁，但是抽象之后框架的可灵活性更高。
	这里的数据库句柄$this->_dbHandle还能用单例模式返回，让数据读写更高效，这部分可自行实现。
	在sql.class.php里为什么要用 return $this,主要是为了链式操作。
**/
class Sql
{
	// 数据库表名
	protected $table;
	
	// 数据库主键
	protected $primary = 'id';
	
	// WHERE和ORDER拼装后的条件
	private $filter = '';
	
	// Pdo bindParam()绑定的参数集合
	private $param = array();
	
	
	/**
     * 查询条件拼接，使用方式：
     *
     * $this->where(['id = 1','and title="Web"', ...])->fetch();
     * 为防止注入，建议通过$param方式传入参数：
     * $this->where(['id = :id'], [':id' => $id])->fetch();
     *
     * @param array $where 条件
     * @return $this 当前对象
     */
	public function where($where = array(), $param = array()){
		if($where){
			$this->filter .= ' WHERE';
			$this->filter .= implode(' ', $where);
			
			$this->param = $param;
		}
		
		return $this;
	}
	
	
	 /**
     * 拼装排序条件，使用方式：
     *
     * $this->order(['id DESC', 'title ASC', ...])->fetch();
     *
     * @param array $order 排序条件
     * @return $this
     */
	 public function order($order = array()){
		 
		 if($order){
			 $this->filter .= ' ORDER BY ';
			 $this->filter .= implode(',', $order);
		 }
		 
		 return $this;
		 
		 
	 }
	
	
	public function fetchAll(){
		
		
	}
	
	
	
	
	
	

}