<?php 


/**
* Parsing Domain From URL
* https://stackoverflow.com/questions/276516/parsing-domain-from-a-url
*/
function parse_host($url) { 
	$parseUrl = parse_url(trim($url)); 
	if(isset($parseUrl['host']))
	{
		$host = $parseUrl['host'];
	}
	else
	{
		if (empty($parseUrl['path'])) {
			$host = $url;
		}else{			
			$path = explode('/', $parseUrl['path']);
			$host = $path[0];
		}
	}
	return trim($host); 
} 