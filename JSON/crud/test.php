<?php defined('BASEPATH') OR exit('no direct script access allowed');

$postdata = $_POST;

$filename = 'storage/validate/jsonxpath.txt';

if ($postdata['action'] == 'save') 
{

	$buildnewjson = array();

	/* check if file exist */
	if (file_exists($filename)) 
	{
		$readjson = json_decode(file_get_contents($filename),true);
		if (is_array($readjson)) 
		{
			/* build new json if data exist > rewrite */
			foreach ($readjson as $data) {

				if ($data['name'] == $postdata['namejson']) {
					$buildnewjson[] = [
					'name' => $postdata['namejson'],
					'jsonxpath' => $postdata['datasavejson']
					];
				}else {
					$buildnewjson[] = [
					'name' => $data['name'],
					'jsonxpath' => $data['jsonxpath']
					];
				}

				$all_json_name[] = $data['name'];

			}

			// New data
			if (!in_array($postdata['namejson'], $all_json_name)) {
				$buildnewjson[] = [
				'name' => $postdata['namejson'],
				'jsonxpath' => $postdata['datasavejson']
				];
			}
		}
	}

	if (file_put_contents($filename, json_encode($buildnewjson,JSON_PRETTY_PRINT))) echo "success_save";

}elseif ($postdata['action'] == 'load') 
{

	$readjsonxpath = json_decode(file_get_contents($filename),TRUE);

	foreach ($readjsonxpath as $data) 
	{
		if ($data['name'] == $postdata['dataloadjson']) 
		{
			echo $data['jsonxpath'];
			break;
		}
	}

}elseif ($postdata['action'] == 'delete') 
{

	$readjsonxpath = json_decode(file_get_contents($filename),TRUE);

	$datajson = array();
	foreach ($readjsonxpath as $data) 
	{
		if ($data['name'] != $postdata['dataloadjson']) 
		{
			$datajson[] = $data;
		}
	}

	if (file_put_contents($filename, json_encode($datajson,JSON_PRETTY_PRINT))) echo "success_delete";
}