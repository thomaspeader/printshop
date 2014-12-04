<?php ob_start() ?>
<?php /* Sessions */ require_once("../private/session.php"); ?>
<?php /* Database connection */ require_once("../private/db_connect.php"); ?>
<?php /* Functions */ require_once("../private/functions.php"); ?>
<?php /* Validation Functions */ require_once("../private/validation_functions.php"); ?>

<?php

	
	if (isset($_POST["submit"])) {		// If the submit button was not pressed redirects back to the new-blog-post page. (line 65)
	
		// *** Data ***
		//********************************
		
		// ID
		
		$id = $_GET["id"];
		
		// Title
		$title = mysql_prep($_POST["title"]);
		
		// Post
		$post = mysql_prep($_POST["post"]);
		
		// Category
		$category = mysql_prep($_POST["category"]);
		
		
			
		// *** Validations ***
		//********************************
		
		$required_fields = array("title", "post", "category");
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("title" => 45);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)) {
			$_SESSION["errors"] = $errors;
			redirect_to("edit-blog-list.php"); 
		}
		
		
		
		// *** Query *** 
		//**********************************
		
		$query = "UPDATE BLOG SET title = '$title', post = '$post', category = '$category' WHERE id = '$id' ";
		$result = mysqli_query($connection, $query);
		
		// Redirecting based on query results. 
		if ($result && mysqli_affected_rows($connection) >= 0) {
			//SUCCESS
			$_SESSION["message"] = "Blog edited";					
			redirect_to("edit-blog-list.php");
		} else {
			// FAILURE
			$_SESSION["message"] = "Blog not edited";					
			redirect_to("edit-blog-list.php");		
		}
		
	} else {
		redirect_to("edit-blog-list.php");
	}		
	
				
?>

<?php ob_end_flush() ?>