<?php
	include_once 'config.php';
	//include_once 'localconfig.php';
	
	$conn = new mysqli($GLOBALS["server"], 
		$GLOBALS["server_username"], 
		$GLOBALS["password"], 
		$GLOBALS["database"]); // secure connection with server
	
?>