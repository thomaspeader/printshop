<?php 

require_once("../private/db_connect.php");

$query = 'SELECT * FROM LOGIN';
$result = mysqli_query($connection, $query);
$rc = mysqli_num_rows($result);

for($i=0; $i < $rc; $i++) {
	$rows[$i] = mysqli_fetch_array($result);
}

?>

<?php include("../private/header.php"); ?>

<div id="container">
	<div id="blog">
		<?php foreach($rows as $row) { ?>
			<ul class="product<?php echo $row['id']; ?>">
				<li>
					<h1><?php echo $row['userName']; ?></h1>
					<p><?php echo $row['password']; ?></p>				
					<p><?php if ($row['isAdmin'] == 1) {
						echo "Is Admin";
					} else {
						echo "Is Not Admin";
					} ?></p>					
				</li>
			</ul>
		<?php
		}
		?>
	</div>

</div>

<?php include("../private/footer.php"); ?>

