<?php
$mode="readonly";
$s11=$s12=$s13=$s14=$s15=$s16='';
$d1=$d2=$d3=$d4=$d5=$d6='';
include 'templates/db_connect.php';
session_start();

if(!isset($_SESSION['fuser']))
{
	header("Location: faculty-log.php");
}
if(!isset($_GET['stuname']))
{
	header("Location: facultyPage.php");
}
$sql2="SELECT * FROM student_detail WHERE Name='".$_GET['stuname']."'";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($res2);

if(isset($_GET['indsem']))
	{
		if(isset($_POST['save']))
{
        $s11=$_POST['sub11'];
        $s12=$_POST['sub12'];
        $s13=$_POST['sub13'];
        $s14=$_POST['sub14'];
        $s15=$_POST['sub15'];
        $s16=$_POST['sub16'];
        $d1=$_POST['d11'];
        $d2=$_POST['d12'];
        $d3=$_POST['d13'];
        $d4=$_POST['d14'];
        $d5=$_POST['d15'];
        $d6=$_POST['d16'];
       // echo $d1;
$sql1="SELECT * FROM backlogs WHERE student_name='".$_GET['stuname']."' and semester='".$_GET['indsem']."'";
$res1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($res1)>0)
{
	$sql="UPDATE backlogs SET subject_name='".$s11."', subject2='".$s12."',subject3='".$s13."',subject4='".$s14."',subject5='".$s15."',subject6='".$s16."',clear_date='".$d1."',date2='".$d2."',date3='".$d3."',date4='".$d4."',date5='".$d5."',date6='".$d6."' WHERE Roll='".$row2['Roll']."' and semester='".$_GET['indsem']."'";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row1=mysqli_fetch_assoc($res1);
		//echo "Success";
	}
	
	$mode="readonly";
	
}	
else
{
	$sql="INSERT INTO backlogs(student_name,Roll,semester,subject_name,clear_date,subject2,date2,subject3,date3,subject4,date4,subject5,date5,subject6,date6) VALUES('".$_GET['stuname']."','".$_GET['stroll']."','".$_GET['indsem']."','".$s11."','".$d1."','".$s12."','".$d2."','".$s13."','".$d3."','".$s14."','".$d4."','".$s15."','".$d5."','".$s16."','".$d6."')";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row1=mysqli_fetch_assoc($res1);
		echo "INSERTED";
	}
	$mode="readonly";

}


}
if(isset($_POST['edit']))
{
	$mode="";
}
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
			  	<div class="center"><h3><?php echo $_GET['stuname'];?></h3></div>
			  	<h3><?php echo $_GET['sem'];?></h3><br>
			  	<h4>Backlogs List</h4>
			  	<?php $sq="SELECT * FROM backlogs WHERE student_name='".$_GET['stuname']."' and semester='".$_GET['indsem']."'";
$rs=mysqli_query($conn,$sq);
$res=mysqli_fetch_assoc($rs);
			  	?>
			  	<br>
			  	<form action="" method="POST">
<table border="2">
	
	<tr>
		<th>Semester</th><th>Subject</th><th>Cleared in Date</th>	</tr>
	<tr><td><?php echo $_GET['indsem'];?></td><td><input type="text" name="sub11" size="20" value="<?php echo $res['subject_name'];?>" placeholder="Subject 1 Name" <?php echo $mode;?>><br><input type="text" name="sub12" value="<?php echo $res['subject2'];?>"  size="20" placeholder="Subject 2 Name" <?php echo $mode;?>><br><input type="text" name="sub13" value="<?php echo $res['subject3'];?>"  size="20" placeholder="Subject 3 Name" <?php echo $mode;?>><br><input type="text" name="sub14" value="<?php echo $res['subject4'];?>"  size="20" placeholder="Subject 4 Name" <?php echo $mode;?>><br><input type="text" name="sub15" value="<?php echo $res['subject5'];?>"  size="20" placeholder="Subject 5 Name" <?php echo $mode;?>><br><input type="text" name="sub16" value="<?php echo $res['subject6'];?>"  size="20" placeholder="Subject 6 Name" <?php echo $mode;?>></td><td><input type="text" name="d11" size="20" value="<?php echo $res['clear_date'];?>" placeholder="Subject 1 cleared in Date" <?php echo $mode;?>><br><input type="text" name="d12" size="20" value="<?php echo $res['date2'];?>" placeholder="Subject 2 cleared in Date" <?php echo $mode;?>><br><input type="text" name="d13" size="20" value="<?php echo $res['date3'];?>" placeholder="Subject 3 cleared in Date" <?php echo $mode;?>><br><input type="text" name="d14" size="20" value="<?php echo $res['date4'];?>" placeholder="Subject 4 cleared in Date" <?php echo $mode;?>><br><input type="text" name="d15" size="20" value="<?php echo $res['date5'];?>" placeholder="Subject 5 cleared in Date" <?php echo $mode;?>><br><input type="text" name="d16" size="20" value="<?php echo $res['date6'];?>" placeholder="Subject 6 cleared in Date" <?php echo $mode;?>><br></tr>


	
</table>
<br>
<input type="submit" name="edit" value="EDIT">
<input type="submit" name="save" value="SAVE">
</form>
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