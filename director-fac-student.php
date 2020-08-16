<?php
session_start();
if(!isset($_SESSION['dirEmail']))
{
    header("Location: Director-log.php");
}
include 'templates/db_connect.php';
echo $_GET['facname']." ".$_GET['facdept'];

if("month_1">"month_2")
{
	//echo "sorry";
}
else if("month_1"<"month_2")
{
	//echo "done";
}
if("I-SEMESTER"<"II SEMESTER")
{
	//echo " SUPPEERRRRR";
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
	<title>Director | Faculty | Students</title>

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">












			<!--============================================= -->
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
						<li><a href="DirectorPage.php"><font color="#191970">Home</font></a></li>
					
						
						<li><a href="logout.php?whom=director"><font color="#191970">Logout</font></a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->



	
	<!-- Start top-category-widget Area -->
	<section class="top-category-widget-area pt-90 pb-90 " id="stu">
		<div class="container">
			<br>
			  <center>
      


<!--
<div class="col-lg-6 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form class="search-form" action="#">
								<input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
-->
<h4>Students under <?php echo $_GET['facname'];?></h4>
<h5>Branch : <?php echo $_GET['facdept'];?></h5>

<br>
    

    <?php
    $sqlSelect = "SELECT * FROM student_detail WHERE counselor='".$_GET['facname']."'";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Roll</th>
                <th>Department</th>
                <th>section</th>
                <th>Year</th>
              
                <th>Recent Attendance</th>
                <th>&nbsp;CGPA&nbsp;</th>
                <th>Parent Contact No</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
    	
?>                  
        <tbody>
        	<?php

            $curr=date("Y")-$row['yearOfJoin'];
        //echo $curr;
        if(date("m")>6)
        	$curr++;
        //echo $curr;
        if($curr==1)
        	$yr='IYear';
        elseif ($curr==2) {
        	$yr='IIYear';
        }
        elseif($curr==3)
        	$yr='IIIYear';
        elseif($curr==4)
        	$yr='IVYear';

        $sql="UPDATE student_details SET styear='".$yr."' WHERE Roll='".$row['Roll']."' ";
        $upr=mysqli_query($conn,$sql);
          
              ?>
          
        <tr>
            <td><a href="director-view-student.php?stuRoll=<?php echo $row['Roll'];?> & stuName=<?php echo $row['Name'];?>"><?php  echo $row['Name']; ?></a></td>
            <td><?php  echo $row['Roll']; ?></td>
            <td><?php  echo $row['department']; ?></td>
            <td><?php  echo $row['section']; ?></td>
            <td><?php  echo $row['styear']; ?></td>
            
            <td>
            	<?php 
                     $sql22="SELECT * FROM month_attendance where month_count IN(SELECT MAX(month_count) FROM month_attendance WHERE Semester IN (SELECT MAX(Semester) FROM month_attendance WHERE styear IN (SELECT MAX(styear) FROM month_attendance))) and Roll='".$row['Roll']."' and subject='Percentage'";
                     $res22=mysqli_query($conn,$sql22);
                     
                     if($row22=mysqli_fetch_array($res22))
                     {
            	?>

                       <?php echo $row22['noOfClasses']." %";?>
                       <?php
}
                       ?>
            </td>
            <td>
            	<?php
                        $sql23="SELECT * FROM externals WHERE semester IN (SELECT MAX(semester) FROM externals WHERE styear IN (SELECT MAX(styear) FROM externals)) and sturoll='".$row['Roll']."' and subject='CGPA'";
                        $res23=mysqli_query($conn,$sql23);
                        if($row23=mysqli_fetch_array($res23))
                     {
            	?>

                       <?php 
                       echo $row23['grade']." ";
                       
}
                       ?>
            </td>
            <td><?php echo $row['contact'];?></td>
        </tr>
        <?php
    
          
          ?>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>

	
		</div>

</center>
	</section>
	<!-- End top-category-widget Area -->
	<?php include('templates/footer.php');?>
	</body>
	
	</html>
