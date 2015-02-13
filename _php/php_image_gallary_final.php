<?php
//FirePHP Stuff
// require_once('FirePHPCore/FirePHP.class.php');
// require_once('FirePHPCore/fb.php');
//FIRE PHP Stuff
//===========================================================================================

$folder = $_POST["folder_name"];
echo $folder;


$jsonData = '{';

$dir = $folder . '/';

$dir_handler = opendir($dir);

$i = 0;
// echo 'BULLSHIT';
while ($file = readdir($dir_handler)) {

	if (!is_dir($file) && strpos($file, '.jpg')) {
		$i++;
		$newDir = substr($dir , 3);
		// echo $newDir;
		$src = $newDir.$file;
		// echo $src;
		$jsonData .= '"img'.$i.'":{"id":"'.$i.'","img_url":"'.$src.'","name":"'.$file.'"},';
	}
}
closedir($dir_handler);

$jsonData = chop($jsonData, ',');
$jsonData .= '}';

echo $jsonData;

?> 