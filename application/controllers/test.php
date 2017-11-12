<?php

    function sayEnglish($fName, $content) {  
        echo 'I am ' . $content;  
    }  
      
    function sayChinese($fName, $content, $country) {  
        echo $content . $country;  
        echo "<br>";  
    }  
      
    function say() {  
        $args = func_get_args();  
        call_user_func_array($args[0], $args);  
    }  
      
    say('sayChinese', '我是', '中国人');  
    say('sayEnglish', 'Chinese');  
	