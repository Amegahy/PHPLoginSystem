<?php

include '../globals/dbh.inc.php'; // Includes the php file which makes the connection
session_start ();

$fName = mysqli_real_escape_string($conn, $_POST['firstName']);	
$lName = mysqli_real_escape_string($conn, $_POST['lastName']);	
$email = mysqli_real_escape_string($conn, $_POST['email']);		
$uid = mysqli_real_escape_string($conn, $_POST['username']);	
$pwd = mysqli_real_escape_string($conn, $_POST['password']);	

$sql = "SELECT * FROM users WHERE user_uid='$uid'"; // Check if the user name has already been taken
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) { // A user already has that username
	echo "Incorrect";
	exit();
}
else {
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //Hash password
	$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$fName', '$lName','$email', '$uid', '$hashedPwd');"; //Insert the user into the database
	mysqli_query($conn, $sql);

	// Reset the SESSION values since the user has created an account 
	$_SESSION['first']= "";
	$_SESSION['last']= "";
	$_SESSION['email']= "";
	$_SESSION['uid']= "";
	$_SESSION['pwd']= "";
	echo "Success";
	exit();	
}

