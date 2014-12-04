<?php ob_start() ?>
<?php
/* Sessions created by Shane */ require_once("../private/session.php"); 	
include("../private/layout/header.php");
include("../private/layout/logo-admin.php");
require_once("../private/functions.php"); 
require_once("../private/validation_functions.php");
include("pete_functions.php");
include("config.php");

if(!isset($_POST["submit"])){	
echo 'unauthorised access';	
}
else{

	//Product name			
	$name = $_POST['product_name'];

	//Description
	$description = $_POST['description'];

	//Price
	$price = $_POST['price'];

	//Product Size
	$size = $_POST['size'];

	//Brand
	$brand = $_POST['brand'];

	//Quantity in stock
	$qtyInStock = $_POST['qtyInStock'];

	//Today's Date		
	$date = date('Y-m-d H:i:s');

	//Image file and file name
	$image = $_FILES["image"]["name"];

	//Image caption
	$caption = $_POST['caption'];


	//Validations
	$required_fields = array("product_name", "description", "price", "size", "brand", "qtyInStock");
		validate_presences($required_fields);

	$fields_with_max_lengths = array("product_name" => 45);
		validate_max_lengths($fields_with_max_lengths);

	if(!empty($errors)) {
		$_SESSION["errors"] = $errors;
		redirect_to("new-product.php"); 
	}

//Run Query.
$query = "INSERT INTO PRODUCT (";
$query .= "name, description, price, size, brand, qtyInStock, date, imageURL, imageALT";
$query .= ") VALUES (";
$query .= "'{$name}', '{$description}', '{$price}', '{$size}', '{$brand}', '{$qtyInStock}', '{$date}', '{$image}', '{$caption}')";
$result = mysqli_query($connection, $query);	

// If query is successful and the database shows that at least 1 row has been affected 
// this table is displayed.
$rc = mysqli_affected_rows($connection);
	if ($rc==1) {
		$_SESSION["message"] = $name. " has been added to the site.";		
	} 
	else {
		$_SESSION["message"] = "Print not added.";	
	}
	if (file_exists("images/" . $_FILES["image"]["name"]))
		{
		$_SESSION["message"] .$_FILES["image"]["name"] . "image has aready been uploaded. ";
		}
		else{
		
  
    if(preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['image']['name'])) {
         
        $filename = $_FILES['image']['name'];
        $source = $_FILES['image']['tmp_name'];  
        $target = $path_to_image_directory . $filename;
         
        move_uploaded_file($source, $target);
         
        createThumbnail($filename);
    }
    createThumbnail2($filename);
 
}
}
   header('Location: new-product.php');
include("../private/layout/footer.php")		
?>
<?php ob_end_flush() ?>