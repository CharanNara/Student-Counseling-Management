<?php
include 'templates/db_connect.php';
require_once('vendor/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('vendor/spreadsheet-reader-master/SpreadsheetReader.php');
//require_once('vendor/spreadsheet-reader-master/SpreadsheetReader_XLSX.php');
//require_once dirname(__FILE__).'Includes/Classes/PHPExcel/IOFactory.php';
session_start();
if(!isset($_SESSION['hodEmail']))
{
	header("Location: hod-log.php");
}
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
               
                if($year==$_GET['yr'])
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
	<title>HOD</title>

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
       <div class="center"><h2>ADD STUDENTS</h2></div>
       <br>
       <div class="center"><h2><?php echo $_GET['yr']." ".$_GET['br'];?></h2></div>
       <hr>
	</center>
	<div>


       <h4>ADD STUDENTS THROUGH EXCEL SHEET</h4>
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
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="red"><?php if(!empty($message)) { echo $message; } ?></font></div>

			</div><br>
			<h5>OR</h5><br>
			<div>
				<h4><a href="hod-add-indiv-student.php?yr=<?php echo $_GET['yr'];?>&br=<?php echo $_GET['br'];?>">ADD INDIVIDUAL STUDENT</a></h4>
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