<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Encrypto.IO chat</title>
	<link rel="stylesheet" href="assets/css/chat.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#input").submit(function(){
				//var toSend = $("#input").value;
				//toSend = $("#input").value.trim(); // get rid of spaces
				//if(toSend) // if it's not empty, send, if not, do nothing
				{
					$.post('process_chat.php', $("#input").serialize(), function(data) {
						//$('#input').value = "";
						//alert(data);
						//$("#messages").append(data);
						//$("#messages").append("<li>" + $("#m").val() + "</li>"); // formatting is hard...
					});
				}
				return false;
				//window.scrollTo(0,document.body.scrollHeight);
				$('#input').value = "";
			});
			
			//$("#messages").animate({ scrollTop: $("#messages")[0].scrollHeight}, 1000);
		});
	</script>
	<script>
		//setInterval(function () {alert("Hello")}, 3000);
		$(document).ready(function(){
			setInterval(function(){
				$("#messages").load('get_chats.php');
				}, 50);
			//$('#scrollbox).scrollTop($('#scrollbox')[0].scrollHeight);
			/*
			var d = $('#scrollbox');
			d.scrollTop(d.prop("scrollHeight"));
			*/
			//window.scrollTo(0,document.body.scrollHeight);
		});
	</script>
  </head>
  <body>
	<?php if (login_check($conn)) : ?>
		<div id="scrollbox">
			<div id="messages"></div>
		</div>
		<form  id="input" maxlength="255" name="message_box">
		  <input id="m" name="text" autocomplete="off" placeholder="get started!"/><button>Send</button>
		</form>
		<script>
			var elem = document.getElementById("m");
			//elem.value ="My default value";
		</script>
		<script src="encrypt.js"></script>
	 <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="login4.php">login</a>.
            </p>
	<?php endif; ?>
  </body>
</html>