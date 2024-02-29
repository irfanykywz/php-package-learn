<?php 


function url_to_name($url) {
	$result = parse_url($url);
	$result_arr = explode('.', $result['host']);
	if ($result_arr[0] == "www") {
		$return = $result_arr[1];
	}else {
		$return = $result_arr[0];
	}
	return $return;
}	

echo url_to_name('https://google.com');