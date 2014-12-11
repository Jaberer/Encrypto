<?php

//string htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )

	$server_user = "root";
	$password = "";
	$database = "fall14sensei";
	$server = "127.0.0.1";
	
	$conn = new mysqli($server, $server_user, $password, $database); // secure connection with server
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		echo "<p> Connection successful </p>";
	}

	
?>