<?php

session_start();
session_unset(); //Unset all session variables in the browser
session_destroy(); //Destroy any sessions running
header("Location: ../../public/index.php");
exit();