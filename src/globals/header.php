<?php

session_start ();
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../assets/CSS/<?php echo $importFile ?>.css">
<script src="../node_modules\jquery\dist\jquery.min.js"></script>
<script src="../assets\JS\<?php echo $importFile ?>.js"></script>
</head>
<body>

	<div class = "nav-bar">
		<?php

			/* Checking for log in errors that have been sent back */
			$error = $_SERVER['QUERY_STRING'];
			$uidErrorMsg  = "";// Error message to be shown in username slot
			$pwdErrorMsg = "";// Error message to be shown in password slot

			if (isset($_SESSION['u_id'])) {//If user has logged in 
				echo '<div class="nav-bar-btn">
						<form action = "src/login/logout.inc.php" method = "POST">
							<button class= "submit-btn" type = "submit" name = "submit">Logout</button>
						</form>
					</div>';
			}else {
				echo '<div class="nav-bar-btn">
							<button class= "submit-btn loginPopup">Login</button>
							<button class= "submit-btn signupPopup">Sign up</button>
						</div>';
			}
		
		?>
	</div>

	<div class="wrapper">