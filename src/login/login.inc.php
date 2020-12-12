<?php

include '../globals/dbh.inc.php';//Includes the php file which makes the connection
session_start ();

//Check if user clicked the login button

$uid = mysqli_real_escape_string($conn, $_POST['username']);	
$pwd = mysqli_real_escape_string($conn, $_POST['password']);	

/** Error handlers **/

//Check for the user name/email in the database
$sql = "SELECT * FROM users WHERE user_uid ='$uid' OR user_email ='$uid'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck < 1) {//No results so the user does not exist
	echo "Incorrect";
	exit();	
}
else {
	if ($row = mysqli_fetch_assoc($result)) {//Inserts the data found in $result and puts it into an array
		//Dehashing the password from the database
		$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);//Match up user password with password in the database

		if ($hashedPwdCheck == false) {//Password does not match the one in the database 
			echo "Incorrect";
			exit();	
			
		}elseif ($hashedPwdCheck == true) {//Check if true. Elseif incase the result is anything else, security.
			//Log in the user here
			//SESSION remembers these variables so the user is logged in so long as there is a page open
			$_SESSION['u_id']= $row['user_id'];
			$_SESSION['u_first']= $row['user_first'];
			$_SESSION['u_last']= $row['user_last'];
			$_SESSION['u_email']= $row['user_email'];
			$_SESSION['u_uid']= $row['user_uid'];
			echo "Success";
			exit();	
		}
	}
}
