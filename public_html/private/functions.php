<?php
	
	// Checks if an SQL query failed.
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed");			
		}
	}
	
	// Escapes a string so SQL sensitive characters are allowed. STOPS SQL INJECTION
	function mysql_prep($string) {
		global $connection;
	
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	// Redirect function to take the awkward syntax out of editing headers
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}
	
	// Placing any errors into an array and into a <div class="errors"> and then looping through each error and displaying it as an <li>.
	function form_errors($errors = array()) {
	$output = "";  			
		if (!empty($errors)) {
			$output .= "<div class=\"error\">";
			$output .= "Please fix the following errors:";
			$output .= "<ul>";
			foreach ($errors as $key => $error) {
  			$output .= "<li>- ";
  			$output .= htmlentities($error);
  			$output .= "</li>";
			} 
		$output .= "</ul>";
		$output .= "</div>";
		}
	return $output;
	}	
	
