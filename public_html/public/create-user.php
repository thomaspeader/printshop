<?php ob_start() ?>
<?php /* Sessions */ require_once("../private/session.php"); ?>
<?php /* Database connection */ require_once("../private/db_connect.php"); ?>
<?php /* Functions */ require_once("../private/functions.php"); ?>
<?php /* Validation Functions */ require_once("../private/validation_functions.php"); ?>

<?php


	if (isset($_POST["submit"])) {		// If the submit button was not pressed redirects back to the new-blog-post page. (line 65)
	
		// *** Data ***
		//********************************
		
		// Title
		$username = mysql_prep($_POST["username"]);
		
		// Post
		$password = mysql_prep($_POST["password"]);
		
		
		// *** Query *** 
		//**********************************
		
		$query = "INSERT INTO LOGIN (";
		$query .= "userName, password";
		$query .= ") VALUES (";
		$query .= "'{$username}', '{$password}')";
		$result = mysqli_query($connection, $query);
		
		// Redirecting based on query results. 
		if ($result && mysqli_affected_rows($connection) >= 0) {
			//SUCCESS
			$_SESSION["message"] = "User Created";					
			redirect_to("admin.php");
		} else {
			// FAILURE
			$_SESSION["message"] = "User creation failed";					
			redirect_to("admin.php");		
		}
		
	} else {
		redirect_to("new-user.php");
	}		

	
				
?>

<?php ob_end_flush() ?>