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
		
		// Date
		$date = date('Y-m-d H:i:s');
		
		
		
		// *** Query *** 
		//**********************************
		$select = "SELECT count(*) FROM LOGIN ";
		$select .= "WHERE userName='$username' AND password='$password'";
		$query = mysqli_query($connection, $select);
		
		$result = mysqli_fetch_array($query);	
		$rc = $result[0];				
			// if the user is in the database (1 row) then start a session and create user session variable
			if($rc == 1)
			{	
				$_SESSION['message'] = "Welcome you're now logged in";
				redirect_to("admin.php");
			}
			else
			{
				// FAILURE
				$_SESSION["message"] = "Log in attempt failed";					
				redirect_to("index.php");
			}
		
	} else {
		redirect_to("new-blog-post.php");
	}		

	
				
?>

<?php ob_end_flush() ?>