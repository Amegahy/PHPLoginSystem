<?php

session_start();

if (isset($_POST['submit'])) {/* Checks if the user actually clicked the submit button */
	
	include_once 'dbh.inc.php';/* Database connection */

	$first = mysqli_real_escape_string ($conn, $_POST['first']);/* First name variable in sign up page. mysqli method converts the variable into text in case the user writes code */
	$last = mysqli_real_escape_string ($conn, $_POST['last']);
	$email = mysqli_real_escape_string ($conn, $_POST['email']);
	$uid = mysqli_real_escape_string ($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string ($conn, $_POST['pwd']);

	//Assign the values to re-insert into the form so the user does not have to re-type the info
	$_SESSION['first']= $first;
	$_SESSION['last']= $last;
	$_SESSION['email']= $email;
	$_SESSION['uid']= $uid;
	$_SESSION['pwd']= $pwd;


	/** Error handlers **/ 
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		header("Location: ../signup.php?signup=empty");/* Takes user back with an error message*/
		exit();

	}else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first)  || !preg_match("/^[a-zA-Z]*$/", $last)) {//Checking if variables includes/ does not include this pattern 
			header("Location: ../signup.php?signup=invalid");/* Takes user back */
			exit();

		}else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();			
			}else {
				//Check if the user name has already been taken
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);//sql query for the user name
				$resultCheck = mysqli_num_rows($result);//returns a row if query is true

				if ($resultCheck > 0) {//A user already has that username
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}else {
					//Hash password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last','$email', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../index.php");

					/* Reset the SESSION values since the user has created an account */
					$_SESSION['first']= "";
					$_SESSION['last']= "";
					$_SESSION['email']= "";
					$_SESSION['uid']= "";
					$_SESSION['pwd']= "";
					exit();	
				}
			}
		}
	}

}else {
	header("Location: ../signup.php");/* Takes user back */
	exit();
}