<?php ob_start() ?>
<?php /* Sessions */ require_once("../private/session.php"); ?>
<?php /* Database connection */ require_once("../private/db_connect.php"); ?>
<?php /* Functions */ require_once("../private/functions.php"); ?>
<?php /* Validation Functions */ require_once("../private/validation_functions.php"); ?>

<?php

		
		// *** Data ***
		//********************************
		
		// ID
		$id = $_GET['id'];
		
		// *** Query *** 
		//**********************************
		
		$query = "DELETE from BLOG where id = '$id';";
		$result = mysqli_query($connection, $query);
		
		// Redirecting based on query results. 
		if ($result && mysqli_affected_rows($connection) >= 0) {
			//SUCCESS
			$_SESSION["message"] = "Blog deleted";					
			redirect_to("delete-blog-list.php");
		} else {
			// FAILURE
			$_SESSION["message"] = "Blog not deleted";					
			redirect_to("admin.php");		
		}
		
	
				
?>

<?php ob_end_flush() ?>