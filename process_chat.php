<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start(); // from functions - secures PHP session
 
if (isset($_POST['text'])) 
{
    $text = $_POST['text'];
	$author = $_SESSION['username'];
	$ts = date("Y-m-d H:i:s");
	
	$ts_timestamp = strtotime($ts); 
	$time = date('H:i:s', $ts_timestamp);
	$message = $author . ": " . $text . " " . $time;
		
    if ($insert_stmt = $conn->prepare("INSERT INTO zhong_webchat (author, text, ts) VALUES (?, ?, ?)")) 
	{
		$insert_stmt->bind_param('sss', $author, $text, $ts);
		// Execute the prepared query.
		if (! $insert_stmt->execute()) 
		{
			//header('Location: ../error.php?err=Registration failure: INSERT');
			//echo "<br> execute failed!";
		}
		else
		{
			//echo "<br> success!";
			//echo "<li>" . $message . "</li>";		
		}
	}
	else 
	{
		//echo "<br> prepare failed!";	
	}
} 
else 
{
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
?>