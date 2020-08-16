<?php
include 'templates/db_connect.php';
$res='';
if(isset($_GET['who']))
{
	$whoo=$_GET['who'];
	if($whoo=='hod')
	{
		$sql="SELECT * FROM hod_table";
         $res=mysqli_query($conn,$sql);
	}
	
}
if(isset($_POST['search'])){
	$usr=$_POST['hodid'];
	
	$sql2="SELECT * FROM hod_table WHERE hod_id='".$_POST['hodid']."'";
	$res=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($res)>0)
	$message="** SCROLL DOWN ! HOD FOUND **";
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php include('templates/directorHeader.php');?>
	<!-- Start Banner Area -->
	<section class="banner-area relative">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<!--<div class="about-content col-lg-12">-->
				<div class="banner-content col-lg-8 col-md-12">
					<br><br><br><br><br><br><br><h1 class="text-white">
						Director Page
					</h1>
					<div class="input-wrap">
						<form action="" class="form-box d-flex justify-content-between" method="POST">
							<input type="text" placeholder="ENTER HOD ID" class="form-control" name="hodid">
							<button type="submit" name="search" class="btn search-btn" value="<?php echo $_POST['hodid'];?>">Search</button>
						</form>
					</div>
					<center>
            <div id="response" class="text-white" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="green"><?php if(!empty($message)) { echo $message; } ?></font></div></center>

				
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

	<div class="section-top-border">
				<h3 class="mb-30" id="tablee"><?php echo $_GET['who']."s List";?></h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							
							<div class="country">Name</div>
							
							<div class="visit"> ID</div>
							<div class="visit">Branch</div>
							<div class="visit">E-Mail</div>
							
							
						</div>
						<?php
						while($row=mysqli_fetch_assoc($res))
							{ 
								?>

						<div class="table-row">
							
							<div class="country"><?php echo $row['hod_name'];?></div>
							
							<div class="visit"><?php echo $row['hod_id'];?></div>
							<div class="visit"><?php echo $row['hod_branch'];?></div>
							<div class="visit"><?php echo $row['hod_email'];?></div>
							
							
						</div>
						<?php
					}
					?>
						
				
					</div>
				</div>
			</div>


	<?php include('templates/footer.php');?>

</body>

</html>