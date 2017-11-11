<?php

function __autoload($classname){
	$filename = "./".$classname . '.php';
	if(is_file($filename)){
		//require_once($file);
		include_once($filename);
	}
}

$obj = new myClass();
