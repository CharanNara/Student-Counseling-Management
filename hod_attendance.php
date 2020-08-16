<?php
session_start();
if(!isset($_SESSION['hodEmail']))
{
    header("Location: hod-log.php");
}
include 'templates/db_connect.php';
$hodquery="SELECT * FROM hod_table WHERE hod_name='Vishnu Murthy' ";
$hodres=mysqli_query($conn,$hodquery);
$row2=mysqli_fetch_assoc($hodres);
$res='';
if(isset($_GET['yr']))
{
	if(isset($_GET['br'])){
	$year=$_GET['yr'];
	$branch=$_GET['br'];
	
	
		$sql="SELECT * FROM student_detail order by Roll where styear='".$year."' and department='".$branch."' ";
         $studentres=mysqli_query($conn,$sql);
         
         

	
	}
}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php include('templates/hodHeader.php');?>
	<!-- Start Banner Area -->
	<section class="banner-area relative">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<!--<div class="about-content col-lg-12">-->
				<div class="banner-content col-lg-8 col-md-12">
					<br><br><br><br><br><br><h1 class="text-white">
				        <?php echo $year." ".$row['hod_branch'];?>
					</h1>
					<br>
				
					<h4 class="text-white">Add Attendace for</h4>

					<div class="courses pt-20">
						
					             
						<?php
if($row['hod_branch']=='EEE' || $row['hod_branch']=='CE'){
						?>
						<a href="hod_attendance2.php?dep=<?php echo $row['hod_branch'];?>&yr=<?php echo $year;?>&sec=A" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $row['hod_branch']." A ";?></a>
						<a href="hod_attendance2.php?dep=<?php echo $row['hod_branch'];?>&yr=<?php echo $year;?>&sec=A" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $row['hod_branch']." B";?></a>


						<?php
}
else{
						?>
                       
						<a href="hod_attendance2.php?dep=<?php echo $row['hod_branch'];?>&yr=<?php echo $year;?>&sec=A" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $row['hod_branch']." A ";?></a>
						<a href="hod_attendance2.php?dep=<?php echo $row['hod_branch'];?>&yr=<?php echo $year;?>&sec=B" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $row['hod_branch']." B";?></a>
						<a href="hod_attendance2.php?dep=<?php echo $row['hod_branch'];?>&yr=<?php echo $year;?>&sec=C" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $row['hod_branch']." C";?></a>
						<a href="hod_attendance2.php?dep=<?php echo $row['hod_branch'];?>&yr=<?php echo $year;?>&sec=D" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?php echo $row['hod_branch']." D";?></a>
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