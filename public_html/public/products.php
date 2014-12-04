<?php 

include("../private/layout/header.php");
include("../private/layout/logo-main.php");


$query = 'SELECT * FROM PRODUCT';
include("../private/query_product_list.php");

	$num_rows = mysqli_affected_rows($connection);
	$er = 'No products to display.';

	echo '<div id ="main">';
	echo '<div id="product-list">';

		if($num_rows >= 1){
			foreach($rows as $row) { 
				$id=$row['id'];
				?>				
		<div class ="product">
				<div class= "product-thumb">
					<a href="product-display.php?id=<?php echo $row['id'];?>"><?php echo "<img src='images/thumbs/".$row['imageURL']."' alt='".$row['imageALT']."'/>";?></a>
				</div>
					<h2><?php echo $row['name']; ?></h2>	
					<p>By: <?php echo $row['brand']; ?></br>
					Date Added: <?php echo $row['date']; ?></p>
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