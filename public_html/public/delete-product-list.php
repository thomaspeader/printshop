<?php 
/* Sessions created by */ require_once("../private/session.php"); 
include("../private/layout/header.php");
include("../private/layout/logo-admin.php");

	$query = 'SELECT * FROM PRODUCT ORDER BY name';
	include("../private/query_product_list.php");

	$num_rows = mysqli_affected_rows($connection);
	$er = 'No products to delete.';
?>
<div id= "main">

	<div id= "edit-product-list">
	<?php 	
	if($num_rows >= 1){
		foreach($rows as $row) { 
			$id=$row['id'];	
	?>
			<div id= "edit-product">
				<?php echo "<img src='images/thumbs2/".$row['imageURL']."' alt='".$row['imageALT']."'/>"; ?>
				</br>
				
				<a href= "delete-product.php?id=<?php echo $row['id'];?>" onclick="confirmation();return false;" value="Delete Product">Delete Product</a>
				
			</div>
	<?php } 
	} else {  ?>
		<div class="error"> 
			<?php echo $er; ?>
		</div>
	<?php	
		}   
	echo '</div>';
echo '</div>';

include("../private/layout/footer.php") 
?>