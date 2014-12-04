<?php ob_start() ?>
<?php /* Sessions */ require_once("../private/session.php"); ?>
<?php /* Database connection */ require_once("../private/db_connect.php"); ?>
<?php /* Functions */ require_once("../private/functions.php"); ?>
<?php /* Functions */ require_once("../private/validation_functions.php"); ?>


<?php 

$query = "SELECT * FROM BLOG "; 
$query .= "ORDER BY id DESC";		// Displays blog in reverse order.
$result = mysqli_query($connection, $query);
$rc = mysqli_num_rows($result);

for($i=0; $i < $rc; $i++) {
	$rows[$i] = mysqli_fetch_array($result);
}

?>

<?php include("../private/layout/header.php") ?>

<main>
		
	<?php include("../private/layout/logo-main.php") ?>

	
	<div id="content">
	
		<div class="errors">
		
			<?php 
				// Checking if errors have come in via $_SESSION
				$errors = errors();
				echo form_errors($errors); 			 
			 ?>
			<?php /* Echoing any success or failure messages via $_SESSION */ echo message(); ?>
			
		</div>	
	
		<div id="blog">
			<?php foreach($rows as $row) { ?>
				<ul class="post<?php echo $row['id']; ?>">
					<li>
						<h2><?php echo '<a href="big-blog.php?id=' . $row['id'] .'">' . $row['title'] . '</a>';?></h2>
						<p class="postDate"><?php echo $row['datePosted']; ?></p>				
						<p><?php echo $row['post']; ?></p>
						<p><strong>Category: </strong><?php echo $row['category']; ?></p>
					</li>
				</ul>
			<?php
			}
			?>
		</div>
		
	</div>
	
	<?php include("../private/layout/footer.php") ?>

	
</main>

<?php ob_end_flush() ?>

