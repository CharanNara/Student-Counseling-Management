<?php
session_start();
if(!isset($_SESSION['dirEmail']))
{
    header("Location: Director-log.php");
}
include 'templates/db_connect.php';
$res='';
if(isset($_GET['yr']))
{
	if(isset($_GET['dep'])){
	$year=$_GET['yr'];
	$branch=$_GET['dep'];
	
	
		$sql="SELECT * FROM student_detail order by Roll where styear='".$year."' and department='".$branch."' ";
         $studentres=mysqli_query($conn,$sql);
         
         

	
	}
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
				        <?php echo $year." ".$_GET['dep'];?>
					</h1>
					<br>
				
					<h4 class="text-white">Add Attendace for</h4>

					<div class="courses pt-20">
						
					             
						<?php
if($_GET['dep']=='EEE' || $_GET['dep']=='CE' || $_GET['dep']=='IT'){
						?>
						<a href="director_attendance3.php?who=Staff" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $_GET['dep']." A ";?></a>
						<a href="director_attendance3.php?who=Staff" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $_GET['dep']." B";?></a>


						<?php
}
else{
						?>
                       
						<a href="director_attendance3.php?dep=<?php echo $_GET['dep'];?>&yr=<?php echo $year;?>&sec=A" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $_GET['dep']." A ";?></a>
						<a href="director_attendance3.php?dep=<?php echo $_GET['dep'];?>&yr=<?php echo $year;?>&sec=B" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $_GET['dep']." B";?></a>
						<a href="director_attendance3.php?dep=<?php echo $_GET['dep'];?>&yr=<?php echo $year;?>&sec=C" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $_GET['dep']." C";?></a>
						<a href="director_attendance3.php?dep=<?php echo $_GET['dep'];?>&yr=<?php echo $year;?>&sec=D" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $_GET['dep']." D";?></a>
						<?php
                            }
						?>
						
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