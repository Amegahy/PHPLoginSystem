<?php
$cssFile = "index.css";
include_once 'includes/globals/header.php';
?>

<h3>
	<?php
		if (isset($_SESSION['u_id'])) {//Show content only if logged in 
			echo "<p>Logged in as ". $_SESSION['u_uid']. "</p>";
		}else {
			echo "<p>Please use the spaces above to log into your account, or click the 'Sign up' button to register if you do not already have one.</p>"; 
		}
	?>
</h3>

<?php
include_once 'includes/globals/footer.php';
?>