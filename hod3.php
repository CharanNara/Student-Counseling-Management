<?php
session_start();
if(!isset($_SESSION['hodEmail']))
{
    header("Location: hod-log.php");
}
include 'templates/db_connect.php';
$hodquery="SELECT * FROM hod_table WHERE hod_name='Vishnu Murthy' and hod_branch='".$_SESSION['hbranch']."' ";
$hodres=mysqli_query($conn,$hodquery);
$row2=mysqli_fetch_assoc($hodres);
$res='';

$hodbranch=$_SESSION['hbranch'];
if(isset($_GET['who']))
{
	$whoo=$_GET['who'];
	if($whoo=='Staff')
	{
		$sql="SELECT * FROM faculty_table order by fac_id";
         $result=mysqli_query($conn,$sql);
         
         

	}
	
}
if(isset($_POST['search'])){
	$usr=$_POST['username'];
	if(!empty($_POST['username']))
	{
	$sql2="SELECT * FROM faculty_table WHERE fac_id='$usr' ";
	$result=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result)>0)
		$message="Faculty Found ! Scroll down to View.";
	else
		$err="*** Faculty not found ***";
}
else
{
	$sql2="SELECT * FROM faculty_table order by fac_id";
	$result=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result)>0)
		$err="Enter The Faculty ID of The staff";
	

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
					<br><br><br><br><br><br><br><h1 class="text-white">
						HOD Page
					</h1>
					<div class="input-wrap">
						<form action="" class="form-box d-flex justify-content-between" method="POST">
							<input type="text" placeholder="ENTER FACULTY ID" class="form-control" name="username">
							<button type="submit" name="search" class="btn search-btn" onClick="document.getElementById('tablee').scrollIntoView();" value="<?php echo $_POST['username'];?>">Search</button>
						</form>
					</div>
					<center>
						<div id="response" class="text-white" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="red"><?php if(!empty($err)) { echo $err; } ?></font></div>
            <div id="response" class="text-white" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="yellow"><?php if(!empty($message)) { echo $message; } ?></font></div></center>

				
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
<nav id="nav-menu-container">

					<ul class="nav-menu">
						<li><a href="hodPage.php"><font color="#191970">HOME</font></a></li>
						<li><a href="hod-add-staff.php"><font color="#191970">ADD FACULTY</font></a></li>
						
							
						</li>
						
					</ul>
					
				</nav><!-- #nav-menu-container -->
				<br>

				<hr>
	<div class="section-top-border">
				<h3 class="mb-30" id="tablee"><?php echo $_GET['who']."s List";?></h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							
							<div class="country">Name</div>
							
							<div class="visit">ID</div>
							<div class="visit">Branch</div>
							<div class="visit">E-MAIL</div>
							
							
						</div>
						<?php
						
						if(mysqli_num_rows($result)==0 || !$result)
						{
						?>
						<p><font color="red">No FACULTY IN THE DATABASE</font></p>
						<?php
						}else{


						while($row = mysqli_fetch_assoc($result)){
							?>
						

						<div class="table-row">
							<?php
        	
            if($row["fac_branch"]==$row2["hod_branch"])
            {
            	

              ?>
							<div class="country"><a href="hod-fac-student.php?facname=<?php echo $row['fac_name'];?>&facdept=<?php echo $row['fac_branch'];?>"><?php echo $row['fac_name'];?></a></div>
							
							<div class="visit"><?php echo $row['fac_id'];?></div>
							<div class="visit"><?php echo $row['fac_branch'];?></div>
							<div class="visit"><?php echo $row['fac_email'];?></div>
							
							
						</div>
						<?php
          }
          ?>
						<?php
					}
					}
					?>
						
				
					</div>
				</div>
			</div>


	<?php include('templates/footer.php');?>

</body>

</html>