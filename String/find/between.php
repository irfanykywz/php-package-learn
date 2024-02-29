<?php 

function find_between($str, $exp1, $exp2)
{
    $a = explode($exp1, $str)[1];
    return explode($exp2, $a)[0];
}

$data = 'aaa<p>assu</p>';

echo find_between($data, '<p>', '</p>');