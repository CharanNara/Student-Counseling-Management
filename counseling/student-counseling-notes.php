<?php
$ta=$ta2=$ta3=$ta4='';
$mode=$mode2=$mode3=$mode4="readonly";
$m1_date=$m1_date2=$m1_date3=$m1_date4='';
$mname=$mname2=$mname3=$mname4='';
$res1=$res2=$res3=$res4='';
$row1=$row2=$row3=$row4='';
include '../templates/db_connect.php';
session_start();
$msql="SELECT * FROM student_detail WHERE Roll='".$_SESSION['student']."'";
$rmsql=mysqli_query($conn,$msql);
$mrow=mysqli_fetch_assoc($rmsql);
if(!isset($_SESSION['student']))
{
    header("Location: ../student-log.php");
}

if(isset($_POST['save1']))
{
	if(isset($_POST['coun1'])){
		if(isset($_POST['cdate1'])){
			$yr=date('Y',strtotime($_POST['cdate1']));
			if($yr!=1970){
	$ta=$_POST['coun1'];
	
	//echo $ta;

	$m1_date=date('Y-m-d',strtotime($_POST['cdate1']));
	$mname=date('F',strtotime($_POST['cdate1']));
	
	echo $mname;
	echo $m1_date;
	$sql1="SELECT counsel1_notes_date,counsel1_notes,counsel1_month_name,counsel1_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($res1)>0)
{
	$sql="UPDATE counseling_notes SET counsel1_notes='".$ta."',counsel1_month_number='month1',counsel1_month_name='".$mname."',counsel1_notes_date='".$m1_date."' WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row1=mysqli_fetch_assoc($res1);
		echo "Success";
	}
	$mode="readonly";
	echo $yr;
}	
else
{
	$sql="INSERT INTO counseling_notes(counsel_roll,counsel_name,counsel_sem,counsel1_notes,counsel1_notes_date,counsel1_month_number,counsel1_month_name) VALUES('".$mrow['Roll']."','".$mrow['Name']."','".$_GET['numsem']."','".$ta."','".$m1_date."','month1','".$mname."')";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row1=mysqli_fetch_assoc($res1);
		echo "INSERTED";
	}
	$mode="readonly";

}
}
else {
	$errorr="**Please choose the Date**";
}
}

       
}
}
elseif (isset($_POST['edit1'])) {
	# code...
	$mode="";
	
}
if(isset($_POST['save2']))
{
	if(isset($_POST['coun2']))
	{
		if(isset($_POST['cdate2'])){
		$yr2=date('Y',strtotime($_POST['cdate2']));
if($yr2!=1970){
	$ta2=$_POST['coun2'];
	$m1_date2=date('Y-m-d',strtotime($_POST['cdate2']));
	$mname2=date('F',strtotime($_POST['cdate2']));
	
	//echo $ta;

	$sql2="SELECT counsel2_notes_date,counsel2_notes,counsel2_month_name,counsel2_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res2=mysqli_query($conn,$sql2);
if(mysqli_num_rows($res2)>0)
{
	$sql="UPDATE counseling_notes SET counsel2_notes='".$ta2."',counsel2_month_number='month2',counsel2_month_name='".$mname2."',counsel2_notes_date='".$m1_date2."' WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		echo $m1_date2;
		$row2=mysqli_fetch_assoc($res2);
		echo "Success";
	}
	$mode2="readonly";
	echo $yr2;
	echo $m1_date2;
}	
else
{
	$sql="INSERT INTO counseling_notes(counsel_roll,counsel_name,counsel_sem,counsel2_notes,counsel2_notes_date,counsel2_month_number,counsel2_month_name) VALUES('".$mrow['Roll']."','".$mrow['Name']."','".$_GET['numsem']."','".$ta2."','".$m1_date2."','month2','".$mname2."')";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row2=mysqli_fetch_assoc($res2);
		echo "INSERTED";
	}
	$mode2="readonly";

}
}
else{
	$errorr2="** Please choose the Date**";
}
       }
}
}
elseif (isset($_POST['edit2'])) {
	# code...
	$mode2="";
	$selectmode="";
}

if(isset($_POST['save3']))
{
	if(isset($_POST['coun3'])){
		if(isset($_POST['cdate3'])){
			$yr3=date('Y',strtotime($_POST['cdate3']));
			if($yr3!=1970){
	$ta3=$_POST['coun3'];
	
	//echo $ta;

	$m1_date3=date('Y-m-d',strtotime($_POST['cdate3']));
	$mname3=date('F',strtotime($_POST['cdate3']));
	
	$sql3="SELECT counsel3_notes_date,counsel3_notes,counsel3_month_name,counsel3_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($res3)>0)
{
	$sql="UPDATE counseling_notes SET counsel3_notes='".$ta3."',counsel3_month_number='month3',counsel3_month_name='".$mname3."',counsel3_notes_date='".$m1_date3."' WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row3=mysqli_fetch_assoc($res3);
		echo "Success";
	}
	$mode3="readonly";
	echo $yr3;
}	
else
{
	$sql="INSERT INTO counseling_notes(counsel_roll,counsel_name,counsel_sem,counsel3_notes,counsel3_notes_date,counsel3_month_number,counsel3_month_name) VALUES('".$mrow['Roll']."','".$mrow['Name']."','".$_GET['numsem']."','".$ta3."','".$m1_date3."','month3','".$mname3."')";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row3=mysqli_fetch_assoc($res3);
		echo "INSERTED";
	}
	$mode3="readonly";

}
}
else
{
	$errorr3="**Please choose the Date**";
}
}
       }

}
elseif (isset($_POST['edit3'])) {
	# code...
	$mode3="";
	$selectmode="";
}

if(isset($_POST['save4']))
{
	if(isset($_POST['coun4'])){
		if(isset($_POST['cdate4'])){
			$yr4=date('Y',strtotime($_POST['cdate4']));
			if($yr4!=1970)
			{
	$ta4=$_POST['coun4'];
	
	//echo $ta;

	$m1_date4=date('Y-m-d',strtotime($_POST['cdate4']));
	$mname4=date('F',strtotime($_POST['cdate4']));
	echo $mname4;
	echo $m1_date4;
	$sql4="SELECT counsel4_notes_date,counsel4_notes,counsel4_month_name,counsel4_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res4=mysqli_query($conn,$sql4);
if(mysqli_num_rows($res4)>0)
{
	$sql="UPDATE counseling_notes SET counsel4_notes='".$ta4."',counsel4_month_number='month4',counsel4_month_name='".$mname4."',counsel4_notes_date='".$m1_date4."' WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row4=mysqli_fetch_assoc($res4);
		echo "Success";
	}
	$mode4="readonly";
	echo $yr4;
}	
else
{
	$sql="INSERT INTO counseling_notes(counsel_roll,counsel_name,counsel_sem,counsel4_notes,counsel4_notes_date,counsel4_month_number,counsel4_month_name) VALUES('".$mrow['Roll']."','".$mrow['Name']."','".$_GET['numsem']."','".$ta4."','".$m1_date4."','month1','".$mname4."')";
	$res=mysqli_query($conn,$sql);
	if(!empty($res))
	{
		$row4=mysqli_fetch_assoc($res4);
		echo "INSERTED";
	}
	$mode="readonly";

}
}
else {
            $errorr4="**Please choose the Date**";
}
}
       }

}
elseif (isset($_POST['edit4'])) {
	# code...
	$mode4="";
	$selectmode="";
}
//$new_date = date('m/d/Y', strtotime("11/23/2019"));
//echo $new_date;
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
	<title>Student | Counseling notes</title>

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="../css/linearicons.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<link rel="stylesheet" href="../css/nice-select.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/main.css">
	
</head>

<body style="background-color: #E0FFFF">

	
	<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<center><a href="../index.php"><img src="../img/anuraglogo.jfif" alt="" title="" height="60" width="70" /></a></center><h5 class="text-black">Anurag Group of Institutions</h5>
					
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="../index.php"><font color="#191970">Home</font></a></li>
					
						
						<li><a href="../logout.php?whom=student"><font color="#191970">Logout</font></a></li>
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
       <div class="center"><h2>COUNSELING NOTES</h2></div><br>
       <h5>Semester : <?php echo $_GET['numsem'];?></h5>
       <hr>
       <?php
$sql1="SELECT counsel1_notes_date,counsel1_notes,counsel1_month_name,counsel1_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res1=mysqli_query($conn,$sql1);

$row1=mysqli_fetch_assoc($res1);

?>
<table>
	<tr>
		<td><h5>MONTH-1 :<?php echo $row1['counsel1_month_name'];?></h5></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h5>DATE : <?php echo $row1['counsel1_notes_date'];?></h5></td>
	</tr>
</table>
<br>

<form action="" method="POST">
       <table>
       	<tr>
       		<td>Name :</td><td><input type="text" name="stname" value="<?php echo $mrow['Name'];?>" readonly="true"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Date :</td><td><input type="date" name="cdate1" min="2016-01-02" <?php echo $mode;?>><br></td>
       		
       	</tr>


       </table><br>
       <div id="response" class="<?php if(!empty($type1)) { echo $type1 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr)) { echo $errorr; } ?></font></div>
       <br>
              		<textarea rows="6" cols="100" name="coun1" <?php echo $mode;?>>
   <?php echo $row1['counsel1_notes'];?>
    </textarea>
    <br><br>
    <input type="submit" name="edit1" value="EDIT">
    <input type="submit" name="save1" value="SAVE">
   </form>
 
  
   <hr>
   <?php
$sql2="SELECT counsel2_notes_date,counsel2_notes,counsel2_month_name,counsel2_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res2=mysqli_query($conn,$sql2);

$row2=mysqli_fetch_assoc($res2);
?>
   <table>
	<tr>
		<td><h5>MONTH-2 :<?php echo $row2['counsel2_month_name'];?></h5></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h5>DATE : <?php echo $row2['counsel2_notes_date'];?></h5></td>
	</tr>
</table>
   <br>
   <form action="" method="POST">
       <table>
       	<tr>
       		<td>Name :</td><td><input type="text" name="stname" value="<?php echo $mrow['Name'];?>" readonly="true"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Date :</td><td><input type="date" name="cdate2" min="2016-01-02" <?php echo $mode2;?>><br></td>
       		
       	</tr>

       </table><br>
        <div id="response" class="<?php if(!empty($type2)) { echo $type2 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr2)) { echo $errorr2; } ?></font></div><br>
              		<textarea rows="6" cols="100" name="coun2" <?php echo $mode2;?>>
     <?php echo $row2['counsel2_notes'];?>
    </textarea>
    <!--&#9679 &#13;=>NEWLINE
    &#9679 
    &#9679 
    &#9679  BULLET POINTSSS
    &#9679--> 
    <br><br>
    <input type="submit" name="edit2" value="EDIT">
    <input type="submit" name="save2" value="SAVE">
   </form>
   <hr>
   <?php
$sql3="SELECT counsel3_notes_date,counsel3_notes,counsel3_month_name,counsel3_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res3=mysqli_query($conn,$sql3);

$row3=mysqli_fetch_assoc($res3);
?>
 <table>
	<tr>
		<td><h5>MONTH-3 :<?php echo $row3['counsel3_month_name'];?></h5></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h5>DATE : <?php echo $row3['counsel3_notes_date'];?></h5></td>
	</tr>
</table>
 <br>
   <form action="" method="POST">
       <table>
       	<tr>
       		<td>Name :</td><td><input type="text" name="stname" value="<?php echo $mrow['Name'];?>" readonly="true"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Date :</td><td><input type="date" name="cdate3" min="2016-01-02" <?php echo $mode3;?>><br></td>
       		
       	</tr>

       </table><br>
 <div id="response" class="<?php if(!empty($type3)) { echo $type3 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr3)) { echo $errorr3; } ?></font></div>
       <br>
             		<textarea rows="6" cols="100" name="coun3" <?php echo $mode3;?>>
    <?php echo $row3['counsel3_notes'];?>
    </textarea>
    <br><br>
    <input type="submit" name="edit3" value="EDIT">
    <input type="submit" name="save3" value="SAVE">
   </form>
   <hr>
   <?php
$sql4="SELECT counsel4_notes_date,counsel4_notes,counsel4_month_name,counsel4_month_number FROM counseling_notes WHERE counsel_name='".$mrow['Name']."' and counsel_sem='".$_GET['numsem']."'";
$res4=mysqli_query($conn,$sql4);

$row4=mysqli_fetch_assoc($res4);
?>
   <table>
	<tr>
		<td><h5>MONTH-4 :<?php echo $row4['counsel4_month_name'];?></h5></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h5>DATE : <?php echo $row4['counsel4_notes_date'];?></h5></td>
	</tr>
</table>
<br>
   <form action="" method="POST">
       <table>
       	<tr>
       		<td>Name :</td><td><input type="text" name="stname" value="<?php echo $mrow['Name'];?>" readonly="true"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Date :</td><td><input type="date" name="cdate4" min="2016-01-02" <?php echo $mode4;?>><br></td>
       		
       	</tr>

       </table><br>
 <div id="response" class="<?php if(!empty($type4)) { echo $type4 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr4)) { echo $errorr4; } ?></font></div>
       <br>
      
       		<textarea rows="6" cols="100" name="coun4" <?php echo $mode4;?>>
    <?php echo $row4['counsel4_notes'];?>
    </textarea>
    <br><br>
    <input type="submit" name="edit4" value="EDIT">
    <input type="submit" name="save4" value="SAVE">
   </form>
	</center>
	</div>
</section>
	<!-- ####################### Start Scroll to Top Area ####################### -->
		<div id="back-top ">
			<a title="Go to Top " href="# "></a>
		</div>
		<!-- ####################### End Scroll to Top Area ####################### -->
	
		<script src="../js/vendor/jquery-2.2.4.min.js "></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q "
		 crossorigin="anonymous "></script>
		<script src="../js/vendor/bootstrap.min.js "></script>
		<script type="text/javascript " src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA "></script>
		<script src="../js/easing.min.js "></script>
		<script src="../js/hoverIntent.js "></script>
		<script src="../js/superfish.min.js "></script>
		<script src="../js/jquery.ajaxchimp.min.js "></script>
		<script src="../js/jquery.magnific-popup.min.js "></script>
		<script src="../js/owl.carousel.min.js "></script>
		<script src="../js/owl-carousel-thumb.min.js "></script>
		<script src="../js/jquery.sticky.js "></script>
		<script src="../js/jquery.nice-select.min.js "></script>
		<script src="../js/parallax.min.js "></script>
		<script src="../js/waypoints.min.js "></script>
		<script src="../js/wow.min.js "></script>
		<script src="../js/jquery.counterup.min.js "></script>
		<script src="../js/mail-script.js "></script>
		<script src="../js/main.js "></script>
</body>
</html>