<?php

include("../private/layout/header.php");
include("../private/layout/logo-main.php");

$er = 'Cart is empty.';

if (isset($_SESSION['cart'])){

	$total = 0;
	
	echo "<div id ='main'>";
		echo "<div id='cart'>";
			foreach($_SESSION['cart'] as $row) {
				echo "<div class= 'cart-item'>";
					echo "<img src='images/thumbs2/" . $row['imageURL']. "'/>";
					echo "<table><thead><tr><th>Print</th><th>Unit Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr></thead>";
						echo "<tbody>";
							echo "<tr>";	
							echo "<td>" . ($row['name']) . "</td>";
							echo "<td>$" . ($row['price']) . "</td>";
							//create form field for quantity to enable update
							echo "<td>";
								echo "<form name='qty' method='post' action='addtocart.php?action=change&id={$row['id']}''>";
								echo "<input type='text' name='qty' size='3' value='".$row['quantity']."'/>";
								echo "<input type='submit' value='update'/></a></form>";
							echo "</td>";
							//calculate row total
							echo "<td>$".($row['price'] * $row['quantity'])."</td>";
					
							$total += ($row['price'] * $row['quantity']);

							echo "<td><a href='addtocart.php?action=remove&id={$row['id']}'> Remove item</a></td></tr>";
						echo "</tbody>";
					echo '</table>';
						// Display remove option only if there is more than one item in cart .. otherwise can use empty cart	
				echo '</div>';
			}
		echo "</div>";

		if(count($_SESSION['cart']) > 1 ){	
			echo "<div id= 'cart-total'>";
				//display total cost of all items
				echo "<p><strong>Grand total: </strong>\$$total</p>";	
				//empty cart link
				echo "<p><a href='addtocart.php?action=empty&id={$row['id']}'> Empty Cart</a></p>";
			echo "</div>";
		
	} } else { 
		echo "<div class='error'>"; 
				echo $er;
		echo "</div>";	
	}		
echo '</div>';
include("../private/layout/footer.php");
?>