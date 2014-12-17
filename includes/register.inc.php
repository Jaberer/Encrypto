<?php
include_once 'db_connect.php';
include_once 'config.php';
//include_once 'localconfig.php';
 
$relay_msg = "";
 
if (isset($_POST['username'], $_POST['p'])) 
{
	//echo "received! <br>" . $_POST['username'] . " <br>" .  $_POST['p'];
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) 
	{
        // The hashed pwd should be 128 characters long
        // If it's not, something really odd has happened
        $relay_msg .= '<p class="error">Invalid password configuration.</p>';
		//echo $password;
		//echo "<br> password not valid";
    }
	else
	{
		//echo "<br> password valid";
	}
 
    // Username validity and password validity have been checked client side
 
	// check existing username
    $prep_stmt = "SELECT username FROM zhong_users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($prep_stmt);
 
    if ($stmt) 
	{
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
		if ($stmt->num_rows == 1) 
		{
				// A user with this username already exists
				$relay_msg .= '<p class="error">A user with this username already exists</p>';
				$stmt->close();
		}
		else
		{
			$relay_msg .= '<p class="error">User Created!</p>';
			$stmt->close();
			//echo "<br> username validated!";
		}
	} 
	else 
	{
			$relay_msg .= '<p class="error">Database error in validating username </p>';
			$stmt->close();
			//echo "<br> username not validated!";
	}
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($relay_msg)) 
	{
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
		/* 
		// unprepared
		$sql = "INSERT INTO users (username, password, salt, date) VALUES ('hardcode', '123', '123', 'now()')";
		if ($conn->query($sql) === TRUE) 
		{
			echo "New record created successfully";
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		*/
		$tmdate = date('Y-m-d H:i:s'); // WORKS
        if ($insert_stmt = $conn->prepare("INSERT INTO zhong_users (username, password, salt, date) VALUES (?, ?, ?, ?)")) 
		{
            $insert_stmt->bind_param('ssss', $username, $password, $random_salt, $tmdate);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) 
			{
                //header('Location: ../error.php?err=Registration failure: INSERT');
				//echo "<br> failed!";
            }
			else
			{
				//echo "<br> success!";
			}
        }
		else 
		{
			//echo "<br> failed!";	
		}
        //header('Location: ./register_success.php');
    }
}

//echo "hello world!";

?>