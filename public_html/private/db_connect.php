<?php

	// DATABASE CONNECTION
	
	define("DB_SERVER", "mysql3.000webhost.com");
	define("DB_USER", "a9998518_prtshop");
	define("DB_PASS", "phpsite94");
	define("DB_NAME", "a9998518_prtshop");
	
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	if (mysqli_connect_errno()) {
			die ("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ") "
			);
	}

?>
