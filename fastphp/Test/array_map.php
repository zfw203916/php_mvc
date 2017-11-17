<?php 

function myfunction($v, $f)
{
	if($v === $f){
		return "same";
	}
	return "different";
}

$a = array("Horse", "Dog", "Cat");
$a2 = array("Cow", "Dog", "Rat");
var_dump(array_map('myfunction', $a , $a2));