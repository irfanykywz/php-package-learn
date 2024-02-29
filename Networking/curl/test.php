<?php 


function request($url, $data = null, $headers = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if($data):
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    endif;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if($headers):
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_HEADER, 1);
    endif;

    curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
    return curl_exec($ch);
}