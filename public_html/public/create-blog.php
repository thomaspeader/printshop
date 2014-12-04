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
		$title = mysql_prep($_POST["title"]);
		
		// Post
		$post = mysql_prep($_POST["post"]);
		
		// Category
		$category = mysql_prep($_POST["category"]);
		
		// Date
		$date = date('Y-m-d H:i:s');
		
		
			
		// *** Validations ***
		//********************************
		
		$required_fields = array("title", "post", "category");
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("title" => 45);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)) {
			$_SESSION["errors"] = $errors;
			redirect_to("new-blog-post.php"); 
		}
		
		
		
		// *** Query *** 
		//**********************************
		
		$query = "INSERT INTO BLOG (";
		$query .= "title, post, datePosted, category";
		$query .= ") VALUES (";
		$query .= "'{$title}', '{$post}', '{$date}', '{$category}')";
		$result = mysqli_query($connection, $query);
		
		// Redirecting based on query results. 
		if ($result && mysqli_affected_rows($connection) >= 0) {
			//SUCCESS
			$_SESSION["message"] = "Post created";					
			redirect_to("blog.php");
		} else {
			// FAILURE
			$_SESSION["message"] = "Post creation failed";					
			redirect_to("blog.php");		
		}
		
	} else {
		redirect_to("new-blog-post.php");
	}		
	
				
?>

<?php ob_end_flush() ?>