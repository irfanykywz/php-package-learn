<?php 

function generateRandomString() {
    $bytes = random_bytes(16);
    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));
    return $uuid;
}

echo generateRandomString();