<?php

$m1=$m2=$m3=$m4='';
$pe='';
include '../templates/db_connect.php';
require_once('../vendor/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('../vendor/spreadsheet-reader-master/SpreadsheetReader.php');
//require_once('vendor/spreadsheet-reader-master/SpreadsheetReader_XLSX.php');
//require_once dirname(__FILE__).'Includes/Classes/PHPExcel/IOFactory.php';
$value='';
session_start();
if(!isset($_SESSION['hodEmail']))
{
    header("Location: ../hod-log.php");
}
if(isset($_POST['rd'])){

    $pe=$_POST['rd'];
}


if(isset($_GET['stuname']))
{
	
	if(isset($_GET['sem']))
	{
		$title=$_GET['sem'];

     
}
}
$main_sql="SELECT * FROM student_detail WHERE Name='".$_GET['stuname']."'";
$main_res=mysqli_query($conn,$main_sql);
$main_row=mysqli_fetch_array($main_res);
$main_subsql="SELECT * FROM subjects_table where sub_sem='".$title."' and sub_branch='".$main_row['department']."'";
$res_subsql=mysqli_query($conn,$main_subsql);

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
	<title>HOD | Academic Performance</title>

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
						<li><a href="../hodPage.php"><font color="#191970">Home</font></a></li>
					
						
						<li><a href="../logout.php?whom=faculty"><font color="#191970">Logout</font></a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->

<!-- Start top-category-widget Area -->
	<section class="top-category-widget-area pt-90 pb-90  " id="stu">
   <br><br>
    
      
		<div class="container">
			<br>
			  <center>
                <h3><?php echo $_GET['stuname'];?></h3><br>
       <div class="center"><h2><?php echo $title;?></h2></div><br>
       <h5 id="attendance"><strong>SUBJECTS : </strong></h5><h6><?php $i=1;
        while($row_subsql=mysqli_fetch_array($res_subsql))
{
    echo $i.')'.$row_subsql['subject_name']."";
    ?>
    &nbsp;&nbsp;&nbsp;
    <?php

    $i++;
}
       ?></h6>
       <br><br>
       <h3><font color="blue">ACADEMIC PERFORMANCE</font></h3>
       <hr>

	</center>
</div>
<center>
	<h5>MID EXAMINATIONS</h5><br>
<table border="1" cellpadding="">
	<tr><th><center>MID I (25)</center></th>
		
        <th><center>MID II (25)</center></th>
        
        <th><center>MID III (25)</center></th>
    
         
 	</tr>
 	
 	<tr>

 		<td>
 			<table border="2" cellpadding="5">
 				<tr><th>SUBJECT</th><th>MARKS</th></tr>
 				<?php
             $acsql="SELECT * FROM academic_performance WHERE sturoll='".$main_row['Roll']."' and examtype='mid1' and semester='".$_GET['sems']."' and styear='".$_GET['yrs']."' and stbranch='".$main_row['department']."' and section='".$main_row['section']."' ";
$acres=mysqli_query($conn,$acsql);
while($acrow=mysqli_fetch_array($acres))
{
	if($acrow['subject']!='')
	{
 	?>              
 				<tr><td><?php echo $acrow['subject'];?></td><td><?php echo $acrow['marks'];?></td></tr>
 				<?php
 			}
}

 				?>
 			</table>
<?php
if(mysqli_num_rows($acres)<=0)
{
	?>
<font color="red"><p>DID NOT ADDED <br>THE MID 1 MARKS.</p></font>
	<?php
}

?>

 		</td>
 		
 		<td>
<table border="2" cellpadding="5">
	<tr><th>SUBJECT</th><th>MARKS</th></tr>
	<?php
             $acsql1="SELECT * FROM academic_performance WHERE sturoll='".$main_row['Roll']."' and examtype='mid2' and semester='".$_GET['sems']."' and styear='".$_GET['yrs']."' and stbranch='".$main_row['department']."' and section='".$main_row['section']."' ";
$acres1=mysqli_query($conn,$acsql1);
while($acrow1=mysqli_fetch_array($acres1))
{
	if($acrow1['subject']!='')
	{
 	?>
	<tr><td><?php echo $acrow1['subject'];?></td><td><?php echo $acrow1['marks'];?></td></tr>
	<?php

}
}
?>
</table>
<?php
if(mysqli_num_rows($acres1)<=0)
{
	?>
<font color="red"><p>DID NOT ADDED <br>THE MID 2 MARKS.</p></font>
	<?php
}

?>
 		</td>
 		
 		<td>
 			
 			<table border="2" cellpadding="5">
	<tr><th>SUBJECT</th><th>MARKS</th></tr>
<?php
             $acsql2="SELECT * FROM academic_performance WHERE sturoll='".$main_row['Roll']."' and examtype='mid3' and semester='".$_GET['sems']."' and styear='".$_GET['yrs']."' and stbranch='".$main_row['department']."' and section='".$main_row['section']."' ";
$acres2=mysqli_query($conn,$acsql2);

while($acrow2=mysqli_fetch_array($acres2))
{
	if($acrow2['subject']!='')
	{
 	?>
	<tr><td><?php echo $acrow2['subject'];?></td><td><?php echo $acrow2['marks'];?></td></tr>
	<?php

}
}

?>
</table>
<?php
if(mysqli_num_rows($acres2)<=0)
{
	?>
<font color="red"><p>DID NOT ADDED <br>THE MID 3 MARKS.</p></font>
	<?php
}

?>
 		</td>

 	</tr>
</table>
<hr>
<h5>EXTERNAL EXAMINATION</h5><br>
<table border="2" cellpadding="5">
	<tr><th>SUBJECT</th><th>GRADE</th></tr>
<?php
             $acsql="SELECT * FROM externals WHERE sturoll='".$main_row['Roll']."' and semester='".$_GET['sems']."' and styear='".$_GET['yrs']."' and stbranch='".$main_row['department']."' and section='".$main_row['section']."' ";
$acres=mysqli_query($conn,$acsql);
while($acrow=mysqli_fetch_array($acres))
{
	if($acrow['subject']!='')
	{
 	?>
	<tr><td><?php echo $acrow['subject'];?></td><td><?php echo $acrow['grade'];?></td></tr>
	<?php

}
}
?>
</table>
<?php
if(mysqli_num_rows($acres)<=0)
{
	?>
<font color="red"><p>DID NOT ADDED THE EXTERNAL MARKS.</p></font>
	<?php
}

?>
</center>
</section>
</body>
</html>