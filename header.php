<?php

session_start ();

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

<header>
	
	<nav>
		<div class = "login">
			<?php

			/* Checking for log in errors that have been sent back */
			$error = $_SERVER['QUERY_STRING'];
			$uidErrorMsg  = "";// Error message to be shown in username slot
			$pwdErrorMsg = "";// Error message to be shown in password slot

			if ($error == "login=empty"){// If login is empty

				$uidErrorMsg = "Please enter your username.";
				$pwdErrorMsg = "Please enter your password.";

			}elseif ($error == "login=incorrect"){// If either the username or password is wrong

				$uidErrorMsg = "Please enter the correct username.";
				$pwdErrorMsg = "Please enter the correct password.";

			}else {// Default placeholders as the user has not had a chance to input anything yet

				$uidErrorMsg  = "Username or Email";
				$pwdErrorMsg = "Password";
			}

			if (isset($_SESSION['u_id'])) {//If user has logged in 

				echo '<form action = "includes/logout.inc.php" method ="POST">
						<button type = "submit" name = "submit">Logout</button>
						</form>';
			}else {

				echo '<form action = "includes/login.inc.php" method = "POST">
							<input type="text" name="uid" placeholder="'.$uidErrorMsg.'">
							<input type="password" name="pwd" placeholder="'.$pwdErrorMsg.'">
							<button type="submit" name="submit">Login</button>
						</form>
						<button style = "margin-top: -20px;"><a href="signup.php">Sign up</a></button>';
			}
			
			?>
		</div>
	</nav>
</header>

<section class = "main-container">
	<div class="main-wrapper">