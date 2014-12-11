<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Encrypto.IO chat</title>
    <style>
		* { margin: 0; padding: 0; box-sizing: border-box; }
		body { font: 20px "proxima-nova", Helvetica, Arial; }
		form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
		form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
		form button { width: 9%; background: rgb(150, 220, 220); border: none; padding: 10px; }
		
		#messages { list-style-type: none; margin-bottom: 40px; padding: 0; }
		#messages li { padding: 5px 10px; }
		#messages li:nth-child(odd) { background: #eee; }
    </style>
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
						//$("#messages").append("<li>" + $("#m").val() + "</li>");
					});
				}
				return false;
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
		});
	</script>
  </head>
  <body>
	<?php if (login_check($conn)) : ?>
		<div id="messages"></div>
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