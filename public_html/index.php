<?php ob_start() ?>
<?php /* Sessions */ require_once("private/session.php"); ?>
<?php /* Database connection */ require_once("private/db_connect.php"); ?>
<?php /* Functions */ require_once("private/functions.php"); ?>
<?php /* Functions */ require_once("private/validation_functions.php"); ?>



<?php include("private/layout/header.php") ?>

<main>

	<?php /* Nav */ include("private/layout/logo-main.php") ?>


	<div id="content">
	
		<p>Welcome to the Print Shop Prototype</p>
		
	</div>
	
	<?php /* Footer */ include("private/footer.php") ?>

</main>

<?php ob_end_flush() ?>
