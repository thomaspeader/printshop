<?php ob_start() ?>
<?php
	/* Sessions created by Shane */ require_once("../private/session.php"); 
	include("../private/layout/header.php");
	include("../private/layout/logo-admin.php");
	include("pete_functions.php");
	include("config.php");
	require_once("../private/functions.php");
	require_once("../private/validation_functions.php");

	if(!isset($_POST['submit'])) {

		echo "Unauthorised access";
	}
	else{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$size = $_POST['size'];
		$brand = $_POST['brand'];
		$qtyInStock = $_POST['qtyInStock'];
		$imageALT = $_POST['imageALT'];


//Validations
	$required_fields = array("name", "description", "price", "size", "brand", "qtyInStock");
		validate_presences($required_fields);

	$fields_with_max_lengths = array("name" => 45);
		validate_max_lengths($fields_with_max_lengths);

	if(!empty($errors)) {
		$_SESSION["errors"] = $errors;
		redirect_to('edit-product-form.php?&id=' . $id . ''); 
	}

		$query = "UPDATE PRODUCT SET name = '$name', price = '$price', description = '$description', size = '$size', brand = '$brand', qtyInStock = '$qtyInStock', imageALT = '$imageALT' WHERE id = '$id' ";

		$result = mysqli_query($connection, $query)
			or die (mysqli_error($connection));

		$rc = mysqli_affected_rows($connection);

		if($rc == 1){
			$_SESSION["message"] = $name. " has been updated.";		
			} 
			else {
				$_SESSION["message"] = "Print was not updated.";	
			}
}	
header('Location: edit-product-form.php?&id=' . $id . '');
include("../private/layout/footer.php")	
?>
<?php ob_end_flush() ?>
