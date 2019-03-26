<?php
include_once 'header.php';

$error = $_SERVER['QUERY_STRING'];//Check for any errors sent back 
$errorMsg = "";//Message to show the user an error

/* Variables for storing the values of the fields */
$first = "";
$last = "";
$email = "";
$uid = "";
$pwd = "";

if (strlen($error) > 0){//If there is an error that has been sent back 

	/* Checking which error has been sent back */
	if ($error == "signup=empty"){

		$errorMsg = "*Please fill in all available fields below";
	}elseif ($error == "signup=invalid"){

		$errorMsg = "*Your name should only contain letters";
	}elseif ($error == "signup=email") {
		
		$errorMsg = "*Invalid email address";
	}elseif ($error == "signup=usertaken") {
		
		$errorMsg = "*This username has already been taken, please chose another";
	}

	/* Assign the field values as those which were sent over in the previous submit attempt */
	$first = $_SESSION['first'];
	$last = $_SESSION['last'];
	$email = $_SESSION['email'];
	$uid = $_SESSION['uid'];
	$pwd = $_SESSION['pwd'];

}

?>

<div class="signup-form">
	<h1>Please fill in the fields below</h1>
	<?php echo '<h2>'.$errorMsg.'</h2>'?>
	<br>
	<form action = "includes/signup.inc.php" method = "POST">
		<input type="text" name="first" placeholder="First name" value = "<?php echo $first?>">
		<input type="text" name="last" placeholder="Last name" value = "<?php echo $last?>">
		<input type="text" name="email" placeholder="Email" value = "<?php echo $email?>">
		<input type="text" name="uid" placeholder="Username" value = "<?php echo $uid?>">
		<input type="password" name="pwd" placeholder="Password" value = "<?php echo $pwd?>">
		<button type = "submit" name = "submit">Sign up</button>
	</form>
</div>

<?php
include_once 'footer.php';
?>