<?php
	$errors = array();
	
	// Turns the field name in the DB into a more readable format
	function fieldname_as_text($fieldname) {
		$fieldname = str_replace("_", " ", $fieldname);
		$fieldname = ucfirst($fieldname);
		return $fieldname;
	}

	// Checks if the $value is set
	function has_presence($value) {
		return isset($value) && $value !== "";
	}
	
	
	// Uses has_presence() to check against the required fields.
	function validate_presences($required_fields) {
			global $errors;
			foreach ($required_fields as $field) {
				$value = trim($_POST[$field]);
				if (!has_presence($value)) {
					$errors[$field] = fieldname_as_text($field) . " can't be blank";
				}
			}
		}
	
	//Compares the length of a string with a maximum value ($max)
	function has_max_length($value, $max) {
		return strlen($value) <= $max;
	}
	
	
	// Uses has_max_length to check against the specified fields length.
	function validate_max_lengths($fields_with_max_lengths) {
			global $errors;
			// Expects an a.array
			foreach($fields_with_max_lengths as $field => $max) {
				$value = trim($_POST[$field]);
				if (!has_max_length($value, $max)) {
					$errors[$field] = fieldname_as_text($field) . " is to long";
				}
			}
		}

	
?>
