<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';

	sec_session_start();

	$sql="SELECT * FROM `zhong_webchat` WHERE 1";
	$result = mysqli_query($conn, $sql);
		
	//echo "<br> get_chats success";
	//$id = 0;
	while($row = mysqli_fetch_array($result)) 
	{
		//echo "<li>" . $row['author'] . " " . $row['text'] . " " . $row['ts'] . "</li>";
		$ts_timestamp = strtotime($row['ts']); 
		$time = date('H:i:s', $ts_timestamp);
		//$id = $id++;
		echo "<li>" . $row['author'] . ": " . $row['text'] . " " . $time . "</li>"; // update chats
	}

	mysqli_close($conn);
?>