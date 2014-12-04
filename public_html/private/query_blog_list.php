<?php
$result = mysqli_query($connection, $query2) 					
		or die (mysqli_error($connection));	
$count = mysqli_num_rows($result);
for($i = 0 ; $i < $count ; $i++)
{
	$rows[$i] = mysqli_fetch_array($result);  
}	
?>