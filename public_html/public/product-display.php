<?php ob_start() ?>
<?php 
/* Sessions created by */ require_once("../private/session.php"); 
include("../private/layout/header.php");
include("../private/layout/logo-main.php");

	$id = $_GET['id'];
	
	$query = "SELECT * FROM PRODUCT where id = '$id'";
	include("../private/query_product_list.php");

	foreach($rows as $row) { 
		$id=$row['id'];	
?>
		<div id="main">	
			<div id="product-display">

				<div id="product-image">
					<?php echo "<img src='images/".$row['imageURL']."' alt='". $row['imageALT']."'/>";?>
				</div>	
					<div id="product-text">
						<div class="errors">
							<?php /* Echoing any success or failure messages via $_SESSION */ echo message(); ?>
						</div>	
						<?php
							echo '<h1>' . $row['name']. '</h1>';
							echo '<h3>By: '. $row['brand'].'</h3>';	
							echo '<p>' . $row['description'].'</p>';
							echo '<h3>$'	. $row['price'].'</h3>';
							echo '<h3>Size: '.$row['size'].'</h3>';
							echo '<p>There are '.$row['qtyInStock'].' items in stock!</p>';
							echo '<h5>Date added: ' . $row['date'].'</h5>';
							echo '<a href="addtocart.php?action=add&id=' . $row['id'] . '">ADD TO CART</a>';
						?>	
					</div>		
			</div>
		</div>
		
<?php
}



?>
<?php ob_end_flush() ?>
