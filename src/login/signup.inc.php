<?php

include '../globals/dbh.inc.php';// Includes the php file which makes the connection
session_start ();

$fName = mysqli_real_escape_string($conn, $_POST['firstName']);	
$lName = mysqli_real_escape_string($conn, $_POST['lastName']);	
$email = mysqli_real_escape_string($conn, $_POST['email']);		
$uid = mysqli_real_escape_string($conn, $_POST['username']);	
$pwd = mysqli_real_escape_string($conn, $_POST['password']);	

// Check if the user name has already been taken
$sql = "SELECT * FROM users WHERE user_uid='$uid'";
$result = mysqli_query($conn, $sql);// sql query for the user name
$resultCheck = mysqli_num_rows($result);// returns a row if query is true

// A user already has that username
if ($resultCheck > 0) {
	echo "Incorrect";
	exit();
}
else {
	//Hash password
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	//Insert the user into the database
	$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$fName', '$lName','$email', '$uid', '$hashedPwd');";
	mysqli_query($conn, $sql);
	header("Location: ../../public/index.php");

	/* Reset the SESSION values since the user has created an account */
	$_SESSION['first']= "";
	$_SESSION['last']= "";
	$_SESSION['email']= "";
	$_SESSION['uid']= "";
	$_SESSION['pwd']= "";
	echo "Success";
	exit();	
}

