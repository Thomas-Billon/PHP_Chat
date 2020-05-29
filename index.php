<?php
@ini_set('display_errors', 'on'); 
	include('../../index_template.php');
?>
		<h1>Testing Area</h1>
		<div id="msg">
		<?php
			include('list_msg.php');
		?>
		</div>
		<form method="POST" action="chat_msg.php" id="chat">
	    	<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" /><br />
	    	<textarea name="message" id="message" placeholder="Message" ></textarea><br />
	    	<button type="submit" name="submit" id="submit">Envoyer</button>
		</form>
	</body>
	<script src="chat_ajax.js" type="text/javascript"></script>
</html>