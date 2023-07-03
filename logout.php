<?php
	session_start();
	session_destroy();
	//redirect to the login page
	header('Location: login_user.php');

?>