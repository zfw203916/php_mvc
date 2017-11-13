<?php

function foobar($arg, $arg2) {
    echo __FUNCTION__, "  $arg ==== $arg2\n";
}
class foo {
    function bar($arg, $arg2) {
        echo __METHOD__, "$arg ==== $arg2\n";
    }
}


// Call the foobar() function with 2 arguments
call_user_func_array("foobar", array("one", "two"));
echo "<br/>";
// Call the $foo->bar() method with 2 arguments
$foo = new foo;
call_user_func_array(array($foo, "bar"), array("three", "four"));