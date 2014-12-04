<?php ob_start() ?>
<?php
/* Sessions created by Shane */ require_once("../private/session.php"); 
include("../private/layout/header.php");
include("../private/layout/logo-main.php");

 if (isset($_GET['action'])) {
		$id = intval($_GET['id']);
		$action = $_GET['action'];
		if (isset($_SESSION['cart'][$id])) {

		switch ($action) {

			case "empty":
				unset($_SESSION['cart']);
				header('Location:cart.php');
				
	        break;
			case "change":
			if ($_POST['qty']) {
	            $_SESSION['cart'][$id]['quantity'] = $_POST['qty'];
				}
				header('Location:cart.php');
	        break;
			case "remove":
				unset($_SESSION['cart'][$id]);
				header('Location:cart.php');
			break;
			case "add":
		
				if (isset($_SESSION['cart'][$id])){
				$_SESSION['cart'][$id]['quantity']++;
				} 
				//
			break;
		}	
	}			
}	

// add new product to array

if (isset($_GET['action']) && $_GET['action'] =="add") {
	$id = intval($_GET['id']);

	
	if (!isset($_SESSION['cart'][$id])){
		$query="SELECT * FROM PRODUCT WHERE id = {$id}";

		$result = mysqli_query($connection, $query);
		$num_results = mysqli_num_rows($result);

		echo $num_results;
		

		if($num_results == 0)
			{
			// Message displays on the indiviudal product page if unsuccessful
			$_SESSION["message"] = $name. " is invalid.";
			}
			else {
			$row=mysqli_fetch_array($result);
		
			$_SESSION['cart'][$row['id']] = array("imageURL" =>$row['imageURL'], "name" => $row['name'], "price" => $row['price'], "quantity" => 1, "id" =>$row['id'] );
			// Message displays on the indiviudal product page if successful
			$_SESSION["message"] = $row['name']. " has been added to your cart.";
			header('Location: product-display.php?&id=' . $id . '');
		} 
	}
}

//
include("../private/layout/footer.php");
?>
<?php ob_end_flush() ?>