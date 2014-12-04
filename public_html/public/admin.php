<?php ob_start() ?>
<?php /* Sessions */ require_once("../private/session.php"); ?>
<?php /* Database connection */ require_once("../private/db_connect.php"); ?>
<?php /* Functions */ require_once("../private/functions.php"); ?>
<?php /* Functions */ require_once("../private/validation_functions.php"); ?>



<?php include("../private/layout/header.php") ?>

<main>

	<?php /* Nav */ include("../private/layout/logo-admin.php") ?>


	<div id="content">
	
		<div class="errors">
			<?php /* Echoing the success or failure message */ echo message(); ?>
			<?php 
				// Checking for errors and displaying them using the form_errors() function.
				$errors = errors();
				echo form_errors($errors); 			 
			 ?>
		</div>
	
		<p>Welcome to the Print Shop Prototype Admin Section!</p>
		<p>Above you can Create, Update and Delete the Blog and Products, if you need to create a New Administrator you can do so <a href="new-user.php">here.</a></p>
		<p>If you'd like to go home to view your work go <a href="index.php">here.</a>
	</div>
	


</main>

<?php ob_end_flush() ?>
