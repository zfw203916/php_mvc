<?php

class Person
{
	var $name;
	var $age;
	
	function __construct($name, $age){
		$this->name = $name;
		$this->age = $age;
	}
	public function say(){
		
		echo "my name:" . $this->name . "<br/>";
		echo "my age:" . $this->age;
		
	}
	
}

$p1 = new Person("frank", 28);
$p1->say();