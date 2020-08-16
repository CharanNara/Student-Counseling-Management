<?php
$subject="FLAT :Formal Languages and Automata Theory";
list($substrng,$remaining)=explode(":", $subject);
echo trim($substrng);
include 'templates/db_connect.php';
session_start();
if(!isset($_SESSION['hodEmail']))
{
    header("Location: hod-log.php");
}
$query="SELECT  * FROM hod_table WHERE hod_email='".$_SESSION['hodEmail']."' ";
	$res=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($res);
	
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
	<title>HOD Page</title>

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
					<center><a href="index.html"><img src="img/anuraglogo.jfif" alt="" title="" height="60" width="70" /></a></center><h5 class="text-black">Anurag Group of Institutions</h5>
					
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="hodPage.php"><font color="#191970">Home</font></a></li>
					
						
						<li><a href="logout.php?whom=hod"><font color="#191970">Logout</font></a></li>
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
       <div class="center"><h2>ADD SUBJECTS</h2></div>
       <br>
       <div class="center"><h2><?php echo $row['hod_branch'];?></h2></div>
       <hr>
	</center>
	<div>


       	<nav id="nav-menu-container">

					<ul class="nav-menu">
						<li><a href="facultyPage.php"><font color="#191970">HOME</font></a></li>
						
						<li class="menu-has-children menu-active"><a href="#!"><font color="#191970">ADD SEMESTER-WISE</font></a>
							<ul>
								<li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch'];  ?> & sem=I-BTech I-SEMESTER&subyr=I Year&sub_semester=I-SEMESTER">Semester-I</a></li>
							
								<li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch'];  ?> & sem=I-BTech II-SEMESTER&subyr=I Year&sub_semester=II-SEMESTER">Semester-II</a></li>
							
								<li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch'];  ?> & sem=II-BTech I-SEMESTER&subyr=II Year&sub_semester=I-SEMESTER">Semester-III</a></li>

								<li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch'];  ?> & sem=II-BTech II-SEMESTER&subyr=II Year&sub_semester=II-SEMESTER">Semester-IV</a></li>
						     <li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch']; ?> & sem=III-BTech I-SEMESTER&subyr=III Year&sub_semester=I-SEMESTER">Semester-V</a></li>
								<li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch'];  ?> & sem=III-BTech II-SEMESTER&subyr=III Year&sub_semester=II-SEMESTER">Semester-VI</a></li>
								<li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch'];  ?> & sem=IV-BTech I-SEMESTER&subyr=IV Year&sub_semester=I-SEMESTER">Semester-VII</a></li>
								<li><a href="semesters/subs.php?sub_br=<?php echo $row['hod_branch'];  ?> & sem=IV-BTech II-SEMESTER&subyr=IV Year&sub_semester=II-SEMESTER">Semester-VIII</a></li>
							</ul>
						</li>
						
					</ul>
					
				</nav><!-- #nav-menu-container -->

			</div>
<br>
<hr>







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