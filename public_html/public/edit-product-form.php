<?php ob_start() ?>
<?php 
/* Sessions created by */ require_once("../private/session.php"); 
include("../private/layout/header.php");
include("../private/layout/logo-admin.php");
require_once("../private/functions.php");
require_once("../private/validation_functions.php");

	$id = $_GET['id'];
	$query = "SELECT * FROM PRODUCT WHERE id ='$id'";
	include("../private/query_product_list.php");

	foreach($rows as $row){
		$id = $row['id'];
		$name = $row['name'];
		$description = $row['description'];
		$price = $row['price'];
		$size = $row['size'];
		$brand = $row['brand'];
		$qtyInStock = $row['qtyInStock'];
		$imageURL = $row['imageURL'];
		$imageALT = $row['imageALT'];
?>
	<div id="main">
	<div class="errors">
			<?php echo message(); ?>
			<?php 
			// Checking for errors and displaying them using the form_errors() function.
			$errors = errors();
			echo form_errors($errors); 			 
		?>
		</div>

	 <?php echo "<img src='images/".$row['imageURL']."' />"; ?>
		<div id="edit-product-form">
		<form method="POST" action="edit-product.php" enctype="multipart/form-data" name='update'>
			<div class="details">
				<H1>Update Product Form</H1>
				<p>Update information about your product here</p>
				<p><input type = "hidden" name ='MAX_FILE_SIZE' value= '200000'/></p>
				<p><input type = "hidden" name ="id" value="<?php echo $id;?>"></p>
				<label for="name">Name: </label>
				<input type="text" name="name" id="name" value="<?php echo $name;?>">
				<br/>
				<label for="price">Price: </label>
				<input type="text" name="price" value="<?php echo $price;?>">
				<br/><br/>
				<label for="description">Description: </label>
				<br/>
				<textarea name="description" cols="50" rows="10"><?php echo $description;?></textarea>
				<br/>
				<label for='size'>Size: </label>
					<Select name= 'size' placeholder="Size" value="<?php echo $size;?>">
						<option value="A6">A6</option>
						<option value="A5">A5</option>
						<option value="A4">A4</option>
						<option value="A3">A3</option>
						<option value="A2">A2</option>
					</Select>
				<br/>
				<label for='brand'>Brand:</label>
				<input type="text" name="brand" value="<?php echo $brand;?>"><br/>
				<Label for='qtyInStock'>Quantity in Stock: </Label>
				<input type="number" name="qtyInStock" value="<?php echo $qtyInStock;?>"><br/>
			<!-- Removed the upload file input here as there is no way to use a default value. -->
				<Label for='imageALT'>Image alt text: </Label>
				<input type="text" name="imageALT" value="<?php echo $imageALT;?>">
			</div>			
				<input type="submit" value="update" name="submit" />
				<br/>
		</form>
	</div>
</div>

<?php
}
include("../private/layout/footer.php") 
?>
<?php ob_end_flush() ?>
