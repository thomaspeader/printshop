<?php
	include("../private/layout/header.php");
	include("../private/layout/nav.php");

		$id = $_GET['id'];
		
		$query = "DELETE from PRODUCT where id = '$id';";
		
		$name = $_GET['name'];
		
		$result = mysqli_query($connection, $query) 					
			or die (mysqli_error($connection));	
		
		$rc = mysqli_affected_rows($connection);
		
		if($rc == 1)
		{
			//$_SESSION["message"] = $name. " has been deleted.";	
		}
		else
		{
			//$_SESSION["message"] = $name. " has not been deleted.";	
		}

header('Location: delete-product-list.php');
include("../private/layout/footer.php");
?>

