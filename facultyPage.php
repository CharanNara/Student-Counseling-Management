<?php
$dep="";

if(isset($_GET['dep']))
{
	$dep=$_GET['dep'];
}
include 'templates/db_connect.php';
require_once('vendor/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('vendor/spreadsheet-reader-master/SpreadsheetReader.php');
//require_once('vendor/spreadsheet-reader-master/SpreadsheetReader_XLSX.php');
//require_once dirname(__FILE__).'Includes/Classes/PHPExcel/IOFactory.php';
session_start();
if(!isset($_SESSION['fuser']))
{
	header("Location: faculty-log.php");
}
$sqll="SELECT * FROM faculty_table WHERE fac_name='".$_SESSION['fuser']."'";
$resl=mysqli_query($conn,$sqll);
$rowl=mysqli_fetch_assoc($resl);
if (isset($_POST["import"]))
{
       
 // $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  

        $file=$_FILES['file'];
  $fileName= $_FILES['file']['name'];
 $fileTempName= $_FILES['file']['tmp_name'];
 $fileError=$_FILES['file']['error'];
 $fileType=$_FILES['file']['type'];
 $fileSize=$_FILES['file']['size'];
 $fileExt=explode('.', $fileName);
        $fileActualExt=strtolower(end($fileExt));
  
 $allowed= array('xls','xlsx');  

if(in_array($fileActualExt,$allowed)){
   

      //  $fileNameNew =uniqid('',true).".".$fileActualExt;
                    $fileDestination='uploads/'.$fileName;
                    move_uploaded_file($fileTempName, $fileDestination);
                    print_r($fileDestination);
        
        $Reader = new SpreadsheetReader($fileDestination);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $roll = "";
                if(isset($Row[1])) {
                    $roll = mysqli_real_escape_string($conn,$Row[1]);
                }
                $dept = "";
                if(isset($Row[2])) {
                    $dept = mysqli_real_escape_string($conn,$Row[2]);
                }
                $section = "";
                if(isset($Row[3])) {
                    $section = mysqli_real_escape_string($conn,$Row[3]);
                }
                $year = "";
                if(isset($Row[4])) {
                    $year = mysqli_real_escape_string($conn,$Row[4]);
                    if($year=='IYear')
                    {
                    	if(date("m")>6)
                    	$yroj=date("Y");
                    else
                    	$yroj=date("Y")-1;
                    }
                    elseif($year=='IIYear')
                    {
                    	if(date("m")>6)
                    	$yroj=date("Y")-1;
                    else
                    	$yroj=date("Y")-2;
                    }
                    if($year=='IIIYear')
                    {   
                    	if(date("m")>6)
                    	$yroj=date("Y")-2;
                    else
                    	$yroj=date("Y")-3;
                    }
                    if($year=='IYear')
                    {
                    	if(date("m")>6)
                    	$yroj=date("Y")-3;
                        else
                            $yroj=date("Y")-4;
                    }
                    
                   
                }
                 $counselor = "";
                if(isset($Row[5])) {
                    $counselor = mysqli_real_escape_string($conn,$Row[5]);
                

                }
               
                if($year==$dep and $counselor==$_SESSION['fuser'])
                   {
               
                if (!empty($name) || !empty($roll) || !empty($dept)|| !empty($section) || !empty($year) || !empty($counselor)) {
                    $query = "insert into student_detail(Name,Roll,department,section,styear,counselor,yearOfJoin) values('".$name."','".$roll."','".$dept."','".$section."','".$year."','".$counselor."','".$yroj."') ";
                    $result = mysqli_query($conn, $query);
                
                    if (!empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
            }
             }
        
         }
     }else{
     	  $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
     }
}
 

if(isset($_POST['delet'])){
	
	$fac2=$_SESSION['fuser'];
     $query = "DELETE FROM student_detail WHERE styear='".$dep."' and counselor='".$fac2."' ";
                    $result = mysqli_query($conn, $query);
                    echo 'success';
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
	<title>FacultyPage</title>

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

<body>

	
	<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<center><a href="index.php"><img src="img/anuraglogo.jfif" alt="" title="" height="60" width="70" /></a></center><h5 class="text-white">Anurag Group of Institutions</h5>
					
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="facultyPage.php">Home</a></li>
						
						<li class="menu-has-children"><a href="">Add</a>
							<ul>
								<li><a href="fac-add-student.php?br=<?php echo $rowl['fac_branch'];?>">Student</a></li>
							</ul>
						</li>
						
						<li><a href="logout.php?whom=faculty">Logout</a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->



	<!-- Start Banner Area -->
	<section class="banner-area relative">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						FACULTY PAGE
					</h1>
					<h3><?php  echo $_SESSION['fuser']; ?></h3>
					<p></p>
					<div class="link-nav">
						<span class="box">
							<a href="#">View</a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="#stu">Students</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="img/rocket.png" alt="">
		</div>
	</section>
	<!-- End Banner Area -->

	<!--DOWN SECTION!-->
  

	<!--END  DOWN SECTION!-->

	<!-- Start top-category-widget Area -->
	<section class="top-category-widget-area pt-90 pb-90 " id="stu">
		<div class="container">
			<br>
			  <center>
       <div class="center"><h2>VIEW SECTION</h2></div>
	</center>
	<hr>
			<div>


       	<nav id="nav-menu-container">

					<ul class="nav-menu">
						<li class="menu-active"><a href="facultyPage.php"><font color="#191970">HOME</font></a></li>
						
						<li class="menu-has-children menu-active"><a href="#!"><font color="#191970">STUDENT</font></a>
							<ul>
								<li><a href="facultyPage.php?IYear">I YEAR</a></li>
							
								<li><a href="facultyPage.php?dep=IIYear">II YEAR</a></li>
							
								<li><a href="facultyPage.php?dep=IIIYear">III YEAR</a></li>

								<li><a href="facultyPage.php?dep=IVYear">IV YEAR</a></li>
							</ul>
						</li>
						<li class="menu-has-children menu-active"><a href="#!"><font color="#191970">ADD</font></a>
                            <ul>
								<li><a href="fac-add-student.php?br=<?php echo $rowl['fac_branch'];?>">Student</a></li>
                                <?php
                                if(isset($_GET['dep']))
                                {
?>
                                <li><a href="fac-add-attendance.php?br=<?php echo $rowl['fac_branch'];?>&yr=<?php echo $_GET['dep'];?>">Attendance</a></li>
                                    <li><a href="fac-add-performance.php?br=<?php echo $rowl['fac_branch'];?>&yr=<?php echo $GET['dep'];?>">Academic Performance</a></li>
                                    <?php 
                                }
                                ?>
                          </ul>
							</li>
						
					</ul>
					
				</nav><!-- #nav-menu-container -->

			</div>
<br><hr><br>
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
<!--<h3>Import Excel File into MySQL Database </h3>
    <br><br>
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
                    <button type="submit" id="submit" name="delet"
                    class="btn-submit">Deletee</button>
        
            </div>
        
        </form>
        
    </div><br>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="red"><?php if(!empty($message)) { echo $message; } ?></font></div>-->

    <?php
    $sqlSelect = "SELECT * FROM student_detail";
    $result = mysqli_query($conn, $sqlSelect);
    

if (mysqli_num_rows($result) > 0 )
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
                <th> Counselor</th>
                <th>Recent Attendance</th>
                <th>CGPA</th>
                <th>Parent Mobile No.</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
    	
?>                  
        <tbody>
        	<?php

            if($row["counselor"]==$_SESSION['fuser'])
            {
            $curr=date("Y")-$row['yearOfJoin'];
       // echo $curr;
        if(date("m")>6)
        	$curr++;
       // echo $curr;
        if($curr==1)
        	$yr='IYear';
        elseif ($curr==2) {
        	$yr='IIYear';
        }
        elseif($curr==3)
        	$yr='IIIYear';
        elseif($curr==4)
        	$yr='IVYear';

        $sql="UPDATE student_detail SET styear='".$yr."' WHERE Roll='".$row['Roll']."' ";
        $upr=mysqli_query($conn,$sql);
          if($row['styear']==$dep){
              ?>
          
        <tr>
            <td><a href="st_details.php?stuRoll=<?php echo $row['Roll'];?> & stuName=<?php echo $row['Name'];?>"><?php  echo $row['Name']; ?></a></td>
            <td><?php  echo $row['Roll']; ?></td>
            <td><?php  echo $row['department']; ?></td>
            <td><?php  echo $row['section']; ?></td>
            <td><?php  echo $row['styear']; ?></td>
            <td><?php  echo $row['counselor']; ?></td>
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
    }
          }

          ?>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
if($dep=='')
{
    ?>
    <br><h5><font color="red">PLEASE SELECT THE STUDENT YEAR ABOVE</font></h3>
    <?php
}
          
?>

	
		</div>


	</section>
	<!-- End top-category-widget Area -->

	<!-- Start post-content Area -->
	<!--<section class="post-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
							<ul class="tags">
								<li><a href="#">Food,</a></li>
								<li><a href="#">Technology,</a></li>
								<li><a href="#">Politics,</a></li>
								<li><a href="#">Lifestyle</a></li>
							</ul>
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 ">
							<div class="feature-img">
								<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
							</div>
							<a class="posts-title" href="blog-single.html"><h3>Astronomy Binoculars A Great Alternative</h3></a>
							<p class="excert">
								MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
								on boot camp when you can get the MCSE study materials yourself at a fraction.
							</p>
							<a href="blog-single.html" class="primary-btn">View More</a>
						</div>
					</div>
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
							<ul class="tags">
								<li><a href="#">Food,</a></li>
								<li><a href="#">Technology,</a></li>
								<li><a href="#">Politics,</a></li>
								<li><a href="#">Lifestyle</a></li>
							</ul>
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 ">
							<div class="feature-img">
								<img class="img-fluid" src="img/blog/feature-img2.jpg" alt="">
							</div>
							<a class="posts-title" href="blog-single.html"><h3>The Basics Of Buying A Telescope</h3></a>
							<p class="excert">
								MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
								on boot camp when you can get the MCSE study materials yourself at a fraction.
							</p>
							<a href="blog-single.html" class="primary-btn">View More</a>
						</div>
					</div>
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
							<ul class="tags">
								<li><a href="#">Food,</a></li>
								<li><a href="#">Technology,</a></li>
								<li><a href="#">Politics,</a></li>
								<li><a href="#">Lifestyle</a></li>
							</ul>
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<div class="feature-img">
								<img class="img-fluid" src="img/blog/feature-img3.jpg" alt="">
							</div>
							<a class="posts-title" href="blog-single.html"><h3>The Glossary Of Telescopes</h3></a>
							<p class="excert">
								MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
								on boot camp when you can get the MCSE study materials yourself at a fraction.
							</p>
							<a href="blog-single.html" class="primary-btn">View More</a>
						</div>
					</div>
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
							<ul class="tags">
								<li><a href="#">Food,</a></li>
								<li><a href="#">Technology,</a></li>
								<li><a href="#">Politics,</a></li>
								<li><a href="#">Lifestyle</a></li>
							</ul>
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<div class="feature-img">
								<img class="img-fluid" src="img/blog/feature-img4.jpg" alt="">
							</div>
							<a class="posts-title" href="blog-single.html"><h3>The Night Sky</h3></a>
							<p class="excert">
								MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
								on boot camp when you can get the MCSE study materials yourself at a fraction.
							</p>
							<a href="blog-single.html" class="primary-btn">View More</a>
						</div>
					</div>
					<div class="single-post row">
						<div class="col-lg-3 col-md-3 meta-details">
							<ul class="tags">
								<li><a href="#">Food,</a></li>
								<li><a href="#">Technology,</a></li>
								<li><a href="#">Politics,</a></li>
								<li><a href="#">Lifestyle</a></li>
							</ul>
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<div class="feature-img">
								<img class="img-fluid" src="img/blog/feature-img5.jpg" alt="">
							</div>
							<a class="posts-title" href="blog-single.html"><h3>Telescopes 101</h3></a>
							<p class="excert">
								MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
								on boot camp when you can get the MCSE study materials yourself at a fraction.
							</p>
							<a href="blog-single.html" class="primary-btn">View More</a>
						</div>
					</div>
					<nav class="blog-pagination justify-content-center d-flex">
						<ul class="pagination">
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Previous">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-left"></span>
									</span>
								</a>
							</li>
							<li class="page-item"><a href="#" class="page-link">01</a></li>
							<li class="page-item active"><a href="#" class="page-link">02</a></li>
							<li class="page-item"><a href="#" class="page-link">03</a></li>
							<li class="page-item"><a href="#" class="page-link">04</a></li>
							<li class="page-item"><a href="#" class="page-link">09</a></li>
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Next">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-right"></span>
									</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form class="search-form" action="#">
								<input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="single-sidebar-widget user-info-widget">
							<img src="img/blog/user-info.png" alt="">
							<a href="#"><h4>Charlie Barber</h4></a>
							<p>
								Senior blog writer
							</p>
							<ul class="social-links">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
							<p>
								Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot
								camp when you can get. Boot camps have itssuppor ters andits detractors.
							</p>
						</div>
						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Popular Posts</h4>
							<div class="popular-post-list">
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>Space The Final Frontier</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp2.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>The Amazing Hubble</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp3.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>Astronomy Or Astrology</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp4.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html"><h6>Asteroids telescope</h6></a>
										<p>02 Hours ago</p>
									</div>
								</div>
							</div>
						</div>
						<div class="single-sidebar-widget ads-widget">
							<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
						</div>
						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title">Post Catgories</h4>
							<ul class="cat-list">
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Technology</p>
										<p>37</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Lifestyle</p>
										<p>24</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Fashion</p>
										<p>59</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Art</p>
										<p>29</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Food</p>
										<p>15</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Architecture</p>
										<p>09</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Adventure</p>
										<p>44</p>
									</a>
								</li>
							</ul>
						</div>
						<div class="single-sidebar-widget newsletter-widget">
							<h4 class="newsletter-title">Newsletter</h4>
							<p>
								Here, I focus on a range of items and features that we use in life without giving them a second thought.
							</p>
							<div class="form-group d-flex flex-row">
								<div class="col-autos">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
										</div>
										<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
										 onblur="this.placeholder = 'Enter email'">
									</div>
								</div>
								<a href="#" class="bbtns">Subcribe</a>
							</div>
							<p class="text-bottom">
								You can unsubscribe at any time
							</p>
						</div>
						<div class="single-sidebar-widget tag-cloud-widget">
							<h4 class="tagcloud-title">Tag Clouds</h4>
							<ul>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Architecture</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Art</a></li>
								<li><a href="#">Adventure</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Adventure</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End post-content Area -->
<?php include('templates/footer.php');?>
	</body>
	
	</html>