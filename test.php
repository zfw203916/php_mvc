<?php
$errLvl = error_reporting();
var_dump($errLvl);die;
for ($i = 0; $i < 15;  $i++ ) {
    print FriendlyErrorType($errLvl & pow(2, $i)) . "<br>\\n";
}

function FriendlyErrorType($type)
{
    switch($type)
    {
        case E_ERROR: // 1 //
            return 'E_ERROR';
        case E_WARNING: // 2 //
            return 'E_WARNING';
        case E_PARSE: // 4 //
            return 'E_PARSE';
        case E_NOTICE: // 8 //
            return 'E_NOTICE';
        case E_CORE_ERROR: // 16 //
            return 'E_CORE_ERROR';
        case E_CORE_WARNING: // 32 //
            return 'E_CORE_WARNING';
        case E_COMPILE_ERROR: // 64 //
            return 'E_COMPILE_ERROR';
        case E_COMPILE_WARNING: // 128 //
            return 'E_COMPILE_WARNING';
        case E_USER_ERROR: // 256 //
            return 'E_USER_ERROR';
        case E_USER_WARNING: // 512 //
            return 'E_USER_WARNING';
        case E_USER_NOTICE: // 1024 //
            return 'E_USER_NOTICE';
        case E_STRICT: // 2048 //
            return 'E_STRICT';
        case E_RECOVERABLE_ERROR: // 4096 //
            return 'E_RECOVERABLE_ERROR';
        case E_DEPRECATED: // 8192 //
            return 'E_DEPRECATED';
        case E_USER_DEPRECATED: // 16384 //
            return 'E_USER_DEPRECATED';
    }
    return "";
} 

<<<<<<< HEAD
die;
function foobar($arg, $arg2) {
    echo __FUNCTION__, "\n$arg ==== $arg2\n";
}

class foo {
    function bar($arg, $arg2) {
        echo __METHOD__;
    }
=======
function playVideo($type, $src)
{
    echo 'I will watch '.$src;
}

function playAudio($type, $src, $artist)
{
    echo 'I will listen to '.$artist.'\'s'.$src;
}

function play()
{
    $args = func_get_args();

     call_user_func_array( 'play'.$args[0], $args  );
>>>>>>> 3bde92e2558cb13a9c5010ecd83cba8645b7a237
}

play('Video','11.rmvb');

echo " <br/>";

play('Audio','22.mp3', 'Jay');

<<<<<<< HEAD
// Call the foobar() function with 2 arguments
//call_user_func_array("foobar", array("one", "two"));
//echo "<br/>";die;
// Call the $foo->bar() method with 2 arguments
$foo = new foo;
call_user_func_array(array($foo, "bar"), array("three", "four"));
=======
//https://segmentfault.com/q/1010000000469520
>>>>>>> 3bde92e2558cb13a9c5010ecd83cba8645b7a237
