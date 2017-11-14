<?php

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
}

play('Video','11.rmvb');

echo " <br/>";

play('Audio','22.mp3', 'Jay');

//https://segmentfault.com/q/1010000000469520