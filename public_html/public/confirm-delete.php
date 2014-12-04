<?php
	include("../private/header.php");
	include("../private/nav.php");

		$id = $_GET['id'];

		$query = "SELECT * from PRODUCT where id = '$id';";
		include("../private/query_product_list.php");

	echo '<table>';
	echo '<tr>';
	echo '<th>Name</th><th>Price</th><th>Size</th><th>Brand</th><th>QtyInStock</th><th>Date Added</th><th>Description</th>';
	echo '</th>';


		foreach($rows as $row) { 
			$id=$row['id'];

			
			echo '<p>Are you sure you want to delete' . $row['name'] . '?</p>';
			echo '<div id="edit_product_list">';
			echo '<tr>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $row['price'] . '</td>';
				echo '<td>' . $row['size'] . '</td>';
				echo '<td>' . $row['brand'] . '</td>';
				echo '<td>' . $row['qtyInStock'] . '</td>';
				echo '<td>' . $row['date'] . '</td>';
				echo '<td>' . $row['description'] . '</td>';
				echo '</tr>';
				echo '</table>';	
			echo '</div>';
			}
	
			
			echo '<td> <a href="delete-product.php?id=' . $row['id'] . '">Delete</a> </td>';
			echo '<td> <a href="edit-product-list.php?id=' . $row['id'] . '">Cancel</a> </td>';

include("../private/footer.php") 
?>
