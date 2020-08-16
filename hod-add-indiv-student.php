<?php
session_start();
if(!isset($_SESSION['hodEmail']))
{
	header("Location: hod-log.php");
}
include 'templates/db_connect.php';
$roll=$name=$branch=$coun=$sec='';
if(isset($_POST['add']))
{
	$roll=$_POST['roll'];
	$name=$_POST['name'];
	$sec=$_POST['sec'];
	$coun=$_POST['coun'];

	
	$sql="INSERT INTO student_detail(Roll,Name,department,styear,section,counselor) VALUES('".$roll."','".$name."','".$_GET['br']."','".$_GET['yr']."','".$sec."','".$coun."')";

     $result = mysqli_query($conn, $sql);
                
                    if (!empty($result)) {
                        $type = "success";
                        $message = "STUDENT ADDED";
                    } else {
                        $type = "error";
                        $message = "PROBLEM IN ADDING STUDENT";
                    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOD- ADD Faculty</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--=====================================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main2.css">
<!--===============================================================================================-->
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
<body>
	<header id="header">
	<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<center><a href="index.html"><img src="img/anuraglogo.jfif" alt="" title="" height="60" width="70" /></a></center><h5>Anurag Group of Institutions</h5>
					</div>
					
					
					<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="hodPage.php"><font color="black">HomePage</font></a></li>
						
						
						<li><a href="logout.php?whom=hod"><font color="black">LogOut</font></a></li>
						
						
					</ul>
				</nav><!-- #nav-menu-container -->
					
					
					
					</div>
					</div>
	</header>
	
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form action="" class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-33">
						ADD STUDENT
					</span>
					<p>OF</p>
					<p>BRANCH: <?php echo $_GET['br'];?><br>YEAR: <?php echo $_GET['yr'];?></p>
					<div class="wrap-input100 rs1 validate-input" data-validate="Roll is required">
						<input class="input100" type="text" name="roll" placeholder="Roll No." value="<?php echo $roll;?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 rs1 validate-input" data-validate="Name is required">
						<input class="input100" type="text" name="stname" placeholder="Student Name" value="<?php echo $name;?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 rs1 validate-input" data-validate="Section is required">
						<input class="input100" type="text" name="sec" placeholder="A/B/C/D" value="<?php echo $sec;?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                   <div class="wrap-input100 rs1 validate-input" data-validate="Counselor is required">
						<input class="input100" type="text" name="coun" placeholder="Name of the Counselor" value="<?php echo $coun;?>">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					

					
					 <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="red"><?php if(!empty($message)) { echo $message; } ?></font></div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" name="add" class="login100-form-btn"
							value="ADD"/>
						
					</div>
					

					

					<!--<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="#" class="txt2 hov1">
							Sign up
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main2.js"></script>
	
	
	
	
	
	
	
	
	
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/easing.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/owl-carousel-thumb.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/main.js"></script>
	
	

</body>
</html>