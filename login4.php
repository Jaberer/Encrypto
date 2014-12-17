<?php
include_once 'includes/process_login.php';
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
//sec_session_start();
 
if (login_check($conn) == true) 
{
    $logged = 'in';
} 
else 
{
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login // Encrypto! </title>
		<link rel="stylesheet" href="assets/css/style.css" />
		<script type="text/javascript" src="assets/js/rainbow-background.js" data-cfasync="false"></script>
		<script type="text/JavaScript" src="assets/js/sha512_2.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
	</head>
    
    <body>
        <?php // prints error message from register.inc.php
			if (!empty($relay_msg)) 
			{
				echo $relay_msg;
			}
        ?>
		<section class="content">
			<h1>Encrypto Login!</h1>
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
				method="post" 
				name="login_form">                      
				<input type="text" 
					name="username" 
					placeholder="Username"/>
				<input type="password" 
								 name="password" 
								 id="password"
								 placeholder="Password"/>
				<input type="submit" 
					   value="Login" 
					   onclick="formhash(this.form, this.form.username, this.form.password);" /> 
			</form>
			<p>If you don't have a login, please <a href="register.php">register</a></p>
			<p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
			<p>You are currently logged <?php echo $logged ?>.</p>
		</section>        
    </body>
</html>