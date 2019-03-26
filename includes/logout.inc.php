<?php

if (isset($_POST['submit'])) {
	session_start();
	session_unset();//Unset all session variables in the browser
	session_destroy();//Destroy any sessions running
	header("Location: ../index.php");
	exit();
}