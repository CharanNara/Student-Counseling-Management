<?php
$mode="readonly";
include 'templates/db_connect.php';
session_start();

if(!isset($_SESSION['fuser']))
{
	header("Location: faculty-log.php");
}
$sqll="SELECT * FROM student_detail WHERE Roll='".$_GET['roll']."' and counselor='".$_SESSION['fuser']."'";
$resl=mysqli_query($conn,$sqll);
$rowl=mysqli_fetch_assoc($resl);
if(mysqli_num_rows($resl)<=0)
{
	header("Location: faculty-log.php");
}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Faculty | Student_backlogs</title>

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	
</head>

<body style="background-color: #E0FFFF">

	
	<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<center><a href="index.php"><img src="img/anuraglogo.jfif" alt="" title="" height="60" width="70" /></a></center><h5 class="text-black">Anurag Group of Institutions</h5>
					
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="facultyPage.php"><font color="#191970">Home</font></a></li>
					
						
						<li><a href="logout.php?whom=faculty"><font color="#191970">Logout</font></a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->
<!-- Start top-category-widget Area -->
	<section class="top-category-widget-area pt-90 pb-90  " id="stu">
		<div class="container">
			<br>
			
			
			  <center>
			  	<div class="center"><h3><?php echo $rowl['Name'];?></h3></div><br>
			  	<h4>Backlogs List</h4>
			  	<br>
<table border="2">
	
	<tr>
		<th>Semester</th><th>Subject</th><th>Cleared in Date</th><th>Pick a Date</th><th>Edit/Save</th>
	</tr>
	<tr><td>SEMESTER 1</td><td><input type="text" name="sub11" size="20" placeholder="Subject 1 Name" <?php echo $mode;?>><br><input type="text" name="sub12" size="20" placeholder="Subject 2 Name" <?php echo $mode;?>><br><input type="text" name="sub13" size="20" placeholder="Subject 3 Name" <?php echo $mode;?>><br><input type="text" name="sub14" size="20" placeholder="Subject 4 Name" <?php echo $mode;?>><br><input type="text" name="sub15" size="20" placeholder="Subject 5 Name" <?php echo $mode;?>><br><input type="text" name="sub16" size="20" placeholder="Subject 6 Name" <?php echo $mode;?>></td><td><input type="text" name="d11" readonly="true"><br><input type="text" name="d12" readonly="true"><br><input type="text" name="d13" readonly="true"><br><input type="text" name="d14" readonly="true"><br><input type="text" name="d15" readonly="true"><br><input type="text" name="d16" readonly="true"></td><td><input type="Date" name="cdate11" <?php echo $mode;?>><br><input type="Date" name="cdate12" <?php echo $mode;?>><br><input type="Date" name="cdate13" <?php echo $mode;?>><br><input type="Date" name="cdate14" <?php echo $mode;?>><br><input type="Date" name="cdate15" <?php echo $mode;?>><br><input type="Date" name="cdate16" <?php echo $mode;?>></td><td><input type="submit" name="edit1" value="EDIT">
<input type="submit" name="save1" value="SAVE"></td></tr>


	<tr><td>SEMESTER 2</td><td><input type="text" name="sub21" size="20" placeholder="Subject 1 Name" <?php echo $mode;?>><br><input type="text" name="sub22" size="20" placeholder="Subject 2 Name" <?php echo $mode;?>><br><input type="text" name="sub23" size="20" placeholder="Subject 3 Name" <?php echo $mode;?>><br><input type="text" name="sub24" size="20" placeholder="Subject 4 Name" <?php echo $mode;?>><br><input type="text" name="sub25" size="20" placeholder="Subject 5 Name" <?php echo $mode;?>><br><input type="text" name="sub26" size="20" placeholder="Subject 6 Name" <?php echo $mode;?>></td><td><input type="text" name="d21" readonly="true"><br><input type="text" name="d22" readonly="true"><br><input type="text" name="d23" readonly="true"><br><input type="text" name="d24" readonly="true"><br><input type="text" name="d25" readonly="true"><br><input type="text" name="d26" readonly="true"></td><td><input type="Date" name="cdate21" <?php echo $mode;?>><br><input type="Date" name="cdate22" <?php echo $mode;?>><br><input type="Date" name="cdate23" <?php echo $mode;?>><br><input type="Date" name="cdate24" <?php echo $mode;?>><br><input type="Date" name="cdate25" <?php echo $mode;?>><br><input type="Date" name="cdate26" <?php echo $mode;?>></td><td><input type="submit" name="edit2" value="EDIT">
<input type="submit" name="save2" value="SAVE"></td></tr>


<tr><td>SEMESTER 3</td><td><input type="text" name="sub31" size="20" placeholder="Subject 1 Name" <?php echo $mode;?>><br><input type="text" name="sub32" size="20" placeholder="Subject 2 Name" <?php echo $mode;?>><br><input type="text" name="sub33" size="20" placeholder="Subject 3 Name" <?php echo $mode;?>><br><input type="text" name="sub34" size="20" placeholder="Subject 4 Name" <?php echo $mode;?>><br><input type="text" name="sub35" size="20" placeholder="Subject 5 Name" <?php echo $mode;?>><br><input type="text" name="sub36" size="20" placeholder="Subject 6 Name" <?php echo $mode;?>></td><td><input type="text" name="d31" readonly="true"><br><input type="text" name="d32" readonly="true"><br><input type="text" name="d33" readonly="true"><br><input type="text" name="d34" readonly="true"><br><input type="text" name="d35" readonly="true"><br><input type="text" name="d36" readonly="true"></td><td><input type="Date" name="cdate31" <?php echo $mode;?>><br><input type="Date" name="cdate32" <?php echo $mode;?>><br><input type="Date" name="cdate33" <?php echo $mode;?>><br><input type="Date" name="cdate34" <?php echo $mode;?>><br><input type="Date" name="cdate35" <?php echo $mode;?>><br><input type="Date" name="cdate36" <?php echo $mode;?>></td><td><input type="submit" name="edit3" value="EDIT">
<input type="submit" name="save3" value="SAVE"></td></tr>
	


	<tr><td>SEMESTER 4</td><td><input type="text" name="sub41" size="20" placeholder="Subject 1 Name" <?php echo $mode;?>><br><input type="text" name="sub42" size="20" placeholder="Subject 2 Name" <?php echo $mode;?>><br><input type="text" name="sub43" size="20" placeholder="Subject 3 Name" <?php echo $mode;?>><br><input type="text" name="sub44" size="20" placeholder="Subject 4 Name" <?php echo $mode;?>><br><input type="text" name="sub45" size="20" placeholder="Subject 5 Name" <?php echo $mode;?>><br><input type="text" name="sub46" size="20" placeholder="Subject 6 Name" <?php echo $mode;?>></td><td><input type="text" name="d41" readonly="true"><br><input type="text" name="d42" readonly="true"><br><input type="text" name="d43" readonly="true"><br><input type="text" name="d44" readonly="true"><br><input type="text" name="d45" readonly="true"><br><input type="text" name="d46" readonly="true"></td><td><input type="Date" name="cdate41" <?php echo $mode;?>><br><input type="Date" name="cdate42" <?php echo $mode;?>><br><input type="Date" name="cdate43" <?php echo $mode;?>><br><input type="Date" name="cdate44" <?php echo $mode;?>><br><input type="Date" name="cdate45" <?php echo $mode;?>><br><input type="Date" name="cdate46" <?php echo $mode;?>></td><td><input type="submit" name="edit4" value="EDIT">
<input type="submit" name="save4" value="SAVE"></td></tr>

<tr><td>SEMESTER 5</td><td><input type="text" name="sub51" size="20" placeholder="Subject 1 Name" <?php echo $mode;?>><br><input type="text" name="sub52" size="20" placeholder="Subject 2 Name" <?php echo $mode;?>><br><input type="text" name="sub53" size="20" placeholder="Subject 3 Name" <?php echo $mode;?>><br><input type="text" name="sub54" size="20" placeholder="Subject 4 Name" <?php echo $mode;?>><br><input type="text" name="sub55" size="20" placeholder="Subject 5 Name" <?php echo $mode;?>><br><input type="text" name="sub56" size="20" placeholder="Subject 6 Name" <?php echo $mode;?>></td><td><input type="text" name="d51" readonly="true"><br><input type="text" name="d52" readonly="true"><br><input type="text" name="d53" readonly="true"><br><input type="text" name="d54" readonly="true"><br><input type="text" name="d55" readonly="true"><br><input type="text" name="d56" readonly="true"></td><td><input type="Date" name="cdate51" <?php echo $mode;?>><br><input type="Date" name="cdate52" <?php echo $mode;?>><br><input type="Date" name="cdate53" <?php echo $mode;?>><br><input type="Date" name="cdate54" <?php echo $mode;?>><br><input type="Date" name="cdate55" <?php echo $mode;?>><br><input type="Date" name="cdate56" <?php echo $mode;?>></td><td><input type="submit" name="edit5" value="EDIT">
<input type="submit" name="save5" value="SAVE"></td></tr>
</table>
<br>
<input type="submit" name="edit" value="EDIT">
<input type="submit" name="save" value="SAVE">
</center>
</div></section>


		<!-- ####################### Start Scroll to Top Area ####################### -->
		<div id="back-top ">
			<a title="Go to Top " href="# "></a>
		</div>
		<!-- ####################### End Scroll to Top Area ####################### -->
	
		<script src="js/vendor/jquery-2.2.4.min.js "></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q "
		 crossorigin="anonymous "></script>
		<script src="js/vendor/bootstrap.min.js "></script>
		<script type="text/javascript " src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA "></script>
		<script src="js/easing.min.js "></script>
		<script src="js/hoverIntent.js "></script>
		<script src="js/superfish.min.js "></script>
		<script src="js/jquery.ajaxchimp.min.js "></script>
		<script src="js/jquery.magnific-popup.min.js "></script>
		<script src="js/owl.carousel.min.js "></script>
		<script src="js/owl-carousel-thumb.min.js "></script>
		<script src="js/jquery.sticky.js "></script>
		<script src="js/jquery.nice-select.min.js "></script>
		<script src="js/parallax.min.js "></script>
		<script src="js/waypoints.min.js "></script>
		<script src="js/wow.min.js "></script>
		<script src="js/jquery.counterup.min.js "></script>
		<script src="js/mail-script.js "></script>
		<script src="js/main.js "></script>
</body>
</html>