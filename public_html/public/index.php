<?php include("../private/layout/header.php"); ?>
		<?php include("../private/layout/logo-main.php");?>
<div id= 'main'>
	<div id= 'Home'>

		<div id= 'col-1'>
			<div id= 'banner-image'><h1>NEW PRINTS!</h1></div>
				<div class ='page-section'>
				<div class ='column-head'><h1>Fresh Prints!</h1></div>
					<div class ='product-home'>

				<?php 
					$query = "SELECT * FROM PRODUCT ORDER BY id DESC LIMIT 6";
							include("../private/query_product_list.php");
							$num_rows = mysqli_affected_rows($connection);
							$er = 'No images to display.';
								if($num_rows >= 1){
									foreach($rows as $row) { 
									$id=$row['id'];
									?>
										<div class= "product-thumb-home">
											<a href="product-display.php?id=<?php echo $row['id'];?>"><?php echo "<img src='images/thumbs2/".$row['imageURL']."' alt='" .$row['imageALT']."'/></>";?></a>
										</div>						
									<?php }	
								} else {  ?>
									<div class="error"> 
										<?php echo $er; ?>
									</div>
								<?php	
								}   ?>
					</div>
				</div><!-- page-section(new products) -->		
					<div class ='page-section'>
						<div class ='column-head'><h1>About Print-Shop</h1></div>
						<p>Vivamus dapibus lorem sed quam tincidunt facilisis. Nam vitae massa sapien. Maecenas sollicitudin bibendum mauris, sed bibendum magna egestas non. Integer gravida magna sed tortor pharetra, in dapibus magna eleifend. Nulla hendrerit neque massa, eu tempus nulla suscipit id. Nulla in mi non magna maximus aliquam. Nunc auctor augue at lectus pretium gravida. Sed efficitur eleifend quam in rutrum. Nullam non vehicula neque. Suspendisse convallis fringilla sagittis. Vestibulum vel orci ante. Nulla facilisi. In hac habitasse platea dictumst. Praesent auctor id enim id commodo. Pellentesque non ultrices metus, ut condimentum nisl.</p>	
					</div><!-- page-section (about) -->		


					
		</div><!-- col-1 -->

		<div id='col-2'>
			<div class ='column-head'><h1>Latest Blog Posts</h1></div>
			<?php 	$query2 = "SELECT * FROM BLOG ORDER BY id DESC LIMIT 3";
					$result2 = mysqli_query($connection, $query2) 					
							or die (mysqli_error($connection));	
					$count2 = mysqli_num_rows($result2);
					for($i = 0 ; $i < $count2 ; $i++)
					{
						$rows2[$i] = mysqli_fetch_array($result2);  
					}	

					$num_rows2 = mysqli_affected_rows($connection);
					$er = 'No posts to display.';
						if($num_rows2 >= 1){
							foreach($rows2 as $row2) { 
								$id=$row2['id'];
								?>
								<div class= 'blog-side-bar'>
									<h2><?php echo '<a href="big-blog.php?id=' . $row2['id'] .'">' . $row2['title'] . '</a>';?></h2>
									<p class="postDate"><?php echo $row2['datePosted']; ?></p>
									<p><strong>Category: </strong><?php echo $row2['category'];?></p>
								</div>
							<?php }
							} else {  ?>
								<div class="error"> 
									<?php echo $er; ?>
								</div> 
							<?php } ?>
		</div><!-- col-2 -->
	</div><!-- home -->
</div><!-- main -->
<?php include("../private/layout/footer.php") ?>

