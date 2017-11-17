<?php

/**
* 数据库基类
*
*	Sql.php 是框架的核心部分。为什么？
	因为通过它，我们创建了一个 SQL 抽象层，可以大大减少了数据库的编程工作。
	虽然 PDO 接口本来已经很简洁，但是抽象之后框架的可灵活性更高。
	这里的数据库句柄$this->_dbHandle还能用单例模式返回，让数据读写更高效，这部分可自行实现。
**/
class Sql
{
	

}