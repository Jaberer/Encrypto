<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // from functions - secures PHP session
 
if (isset($_POST['username'], $_POST['p'])) 
{
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($username, $password, $conn)) 
	{
        // Login success 
        //header('Location: ../protected_page.php'); // login
		if(login_check($conn)) // works
		{
			//echo "<p> Login Check Successful</p>";
			header('Location: ../chat.php');
		}
		//header('Location: ../protected_page_example.php');
    } 
	else 
	{
        // Login failed 
        echo "<p>Failed Login</p>";
		//header('Location: ../index.php?error=1'); 
    }
} 
else 
{
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
?>