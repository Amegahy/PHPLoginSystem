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
			if (isset($_SESSION['u_id'])) { //If user has logged in 
				echo '<div class="nav-bar-btn">
						<button class= "submit-btn signout">Sign out</button>
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