<?php
if(isset($_GET['yr']))
{
	$year=$_GET['yr'];
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php include('templates/DirectorHeader.php');?>
	<!-- Start Banner Area -->
	<section class="banner-area relative">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<!--<div class="about-content col-lg-12">-->
				<div class="banner-content col-lg-8 col-md-12">
					<br><br><br><br><br><br><h1 class="text-white">
				        Add Student					</h1>
					<br>
				
					<h4 class="text-white">Choose Student Branch</h4>

					<div class="courses pt-20">
						
						<a href="director-add-student2.php?br=CSE&yr=<?php echo $year;?>" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">CSE</a>
						<a href="director-add-student2.php?br=IT&yr=<?php echo $year;?>" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">IT</a>
						<a href="director-add-student2.php?br=ME&yr=<?php echo $year;?>" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">ME</a>
						<a href="director-add-student2.php?br=ECE&yr=<?php echo $year;?>" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">ECE</a>
						<a href="director-add-student2.php?br=EEE&yr=<?php echo $year;?>" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">EEE</a>
						<a href="director-add-student2.php?br=CE&yr=<?php echo $year;?>" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">CE</a>
						
					</div>
					<p></p>
					<!--<div class="link-nav">
						<span class="box">
							<a href="index.html">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="elements.html">Director Page</a>
						</span>
					</div>-->
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="img/rocket.png" alt="">
		</div>
	</section>
	<!-- End Banner Area -->
	<hr>

				<br>

				<hr>
	

	<?php include('templates/footer.php');?>

</body>

</html>