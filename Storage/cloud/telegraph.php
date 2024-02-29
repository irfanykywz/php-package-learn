<?php 

// URL to which files to be uploaded.
// https://kb.detlus.com/articles/php/upload-files-using-curl/
$url = "https://telegra.ph/upload";

// Puts files to be uploaded in this array
$files = array(
  realpath('test.jpg')
);

$postfields = array();

foreach ($files as $index => $file) {
    if (function_exists('curl_file_create')) {
        $file = curl_file_create($file);
    } else {
        $file = '@' . realpath($file);
    }
    $postfields["files[$index]"] = $file;
}


// Add other post data as well.
$postfields['HTTP_AUTHORIZATION'] = 'Basic';
// Need to set this head for uploading file.
$headers = array();
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Content-Type: multipart/form-data'; 

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$response = curl_exec($ch);

var_dump($response);
// string(45) "[{"src":"\/file\/c4d27e803aaa0ff5c525f.jpg"}]"
// https://telegra.ph/file/c4d27e803aaa0ff5c525f.jpg

if(!curl_errno($ch))
{
    $info = curl_getinfo($ch);
    if ($info['http_code'] == 200) {
      // Files uploaded successfully.
    }
}
else
{
  // Error happened
  $error_message = curl_error($ch);
}
curl_close($ch);