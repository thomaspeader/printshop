<?php

	session_start();	
	
		// Taking the $_SESSION data with the message and validating it and putting it in a class="message".
		function message() {		
			if (isset($_SESSION["message"])) {
			$output = "<div class=\"message\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			

			//$_SESSION["message"] = null;
			//Tried this on the error and it seemed to work better.
			//Change back if there are problems
			unset($_SESSION["message"]);
			
			return $output;
			}
		}
		
		// This function is checking to see if errors have come in via $_SESSION and then clearing them.
		function errors() {
			if (isset($_SESSION["errors"])) {
				$errors = $_SESSION["errors"];
			
			//$_SESSION["errors"] = null;

			//Trying this because my errors persist on returning to the page	
			unset($_SESSION["errors"]);

			return $errors;
			}
		}
?>