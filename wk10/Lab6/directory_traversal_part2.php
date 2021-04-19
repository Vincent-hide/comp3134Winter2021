<?php
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
	$path=isset($_GET['q']) ? $_GET['q'] : '.';
	echo basename($path);
	echo file_exists($path);

	echo "<pre>";
	if(!file_exists(basename($path))){ 
		return; 
	};
	print_r(scandir(basename($path)));
	echo "</pre>";
?>
