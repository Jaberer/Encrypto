<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="assets/js/sha512_2.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
		<script type="text/JavaScript" src="assets/js/rainbow-background.js"></script>
        <!--<link rel="stylesheet" href="assets/css/bootstrap.css" />-->
		<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
		<link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <?php // prints error message from register.inc.php
			if (!empty($relay_msg)) 
			{
				echo $relay_msg;
			}
        ?>
        <section class="content">
		<h1>Register with us</h1>
		<ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"  
					method="post" 
					name="registration_form">
				<input type='text' 
					name='username' 
					id='username' 
					placeholder='Username' />
				<input type="password"
								 name="password" 
								 id="password" 
								 placeholder='Password'/>
				<input type="password" 
										 name="confirmpwd" 
										 id="confirmpwd" 
										 placeholder='Confirm Password'/>
				<input type="submit" 
					   value="Register" 
					   onclick="return regformhash(this.form,
									   this.form.username,
									   this.form.password,
									   this.form.confirmpwd);" /> 
			</form>
			<p>Return to the <a href="login4.php">login page</a>.</p>
		</section>
    </body>
</html>