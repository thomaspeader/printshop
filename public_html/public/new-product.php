
<?php ob_start() ?>
<?php 
/* Sessions created by */ require_once("../private/session.php"); 
include("../private/layout/header.php");
include("../private/layout/logo-admin.php");
include('pete_functions.php');
?>
<div id ="main">
	<div class="errors">
		<?php echo message(); ?>
		<?php 
		// Checking for errors and displaying them using the form_errors() function.
			$errors = errors();
			echo form_errors($errors); 			 
		?>
	</div>

	<form method="POST" action="create-product.php" enctype="multipart/form-data" name='insert'>
			<div class="details">
				<H1>New Product Form</H1>
				<p>Insert information about your product here.</p>
				<p>All fields are required.</p>
				<p><input type = 'hidden' name ='MAX_FILE_SIZE' value= '200000' /></p>
				<input type="text" name="product_name" placeholder="name" id='product_name'>
				<br/>
				<textarea name="description" cols="50" rows="10" placeholder="Product Description"></textarea>
				<br/>
				<input type="text" name="price" placeholder="Price">
				<br/>
				<label for="size">Size:</label>
					<Select name= 'size' placeholder="Size">
						<option value="A6">A6</option>
						<option value="A5">A5</option>
						<option value="A4">A4</option>
						<option value="A3">A3</option>
						<option value="A2">A2</option>
					</Select>
				<br/>
				<input type="text" name="brand" placeholder="Brand / Artist"><br/>
				<input type="number" name="qtyInStock" placeholder="How many are in Stock"><br/>
				<!-- Got rid of the drop down box to select and image already in the images folder.
				Using a proper image uploader now -->	
				<label for="image">Image:</label>
				<input type="file" name="image" id='image'/>
				<br/>
				<input type="text" name="caption" placeholder="Image Caption">	
				<br/>	
				<input type="submit" value="submit" name="submit" />
		</form>
	</div>
</div>
<?php include("../private/layout/footer.php") ?>
<?php ob_end_flush() ?>

