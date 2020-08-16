<?php
include 'templates/db_connect.php';
require_once('vendor/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('vendor/spreadsheet-reader-master/SpreadsheetReader.php');


	session_start();
if(!isset($_SESSION['hodEmail']))
{
    header("Location: hod-log.php");
}
$query="SELECT  * FROM hod_table WHERE hod_email='".$_SESSION['hodEmail']."' ";
	$res=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($res);
	if(isset($_GET['dep']))
	{
		if(isset($_GET['yr']))
		{
			if(isset($_GET['sec']))
			{
				$dep=$_GET['dep'];
				$ye=$_GET['yr'];
				$secs=$_GET['sec'];


			}
		}
	}
if (isset($_POST["import1"]))
{
	if(isset($_POST['gMonth']))
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
   

        //$fileNameNew =uniqid('',true).".".$fileActualExt;
                    $fileDestination='uploads/'.$fileName;
                    move_uploaded_file($fileTempName, $fileDestination);
                    print_r($fileDestination);
        $headings=array();
        $subs=array();
        $Reader = new SpreadsheetReader($fileDestination);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
             $j=0;$k=0;
            foreach ($Reader as $Row)
            {
                 $roll = "";
                if(isset($Row[0])) {
                    $roll = mysqli_real_escape_string($conn,$Row[0]);
                }

                
                $name = "";
                if(isset($Row[1])) {
                    $name = mysqli_real_escape_string($conn,$Row[1]);
                }
                for($j=2;isset($Row[$j]);$j++){
                       
                
                //echo $name." ".$roll." ".$dept;
                if($k==0){
                    $headings[$j]=mysqli_real_escape_string($conn,$Row[$j]);
                   // echo 'ooooooo'.$headings[0].'mmmmmmmmmmmmmmm';
                   // SELECT * FROM excell_db where name="name" and fac="II-SEMESTER";
                }
                else
                {
                     $subs[$j]=mysqli_real_escape_string($conn,$Row[$j]);
                }

            }
            $k++;
              //  $sqls="SELECT max(Roll) FROM excell_db";
            //$ress=mysqli_query($conn,$sqls);
            //echo $ress['Roll']; 
                if($name!='Name' && $name!=''){
                if (!empty($name) || !empty($roll)) {
                    
                        for($s=2;isset($headings[$s]);$s++){
                    $query = "insert into month_attendance(stname,Roll,styear,stbranch,section,semester,month_count,month_name,noOfClasses,subject) values('".$name."','".$roll."','".$_GET['yr']."','".$_GET['dep']."','".$_GET['sec']."','".$_GET['sem']."','".$_POST['smonth']."','".$_POST['gMonth']."','".$subs[$s]."','".$headings[$s]."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
                }
            }
            else
            {
            	print_r($headings);
                continue;
            }




             }
        
         }
     }
     else{
         $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
     }
 }
}


	if (isset($_POST["import2"]))
{
	if(isset($_POST['gMonth2'])){
       
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
   

        //$fileNameNew =uniqid('',true).".".$fileActualExt;
                    $fileDestination='uploads/'.$fileName;
                    move_uploaded_file($fileTempName, $fileDestination);
                    print_r($fileDestination);
        $headings=array();
        $subs=array();
        $Reader = new SpreadsheetReader($fileDestination);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
             $j=0;$k=0;
            foreach ($Reader as $Row)
            {
                 $roll = "";
                if(isset($Row[0])) {
                    $roll = mysqli_real_escape_string($conn,$Row[0]);
                }

                
                $name = "";
                if(isset($Row[1])) {
                    $name = mysqli_real_escape_string($conn,$Row[1]);
                }
                for($j=2;isset($Row[$j]);$j++){
                       
                
                //echo $name." ".$roll." ".$dept;
                if($k==0){
                    $headings[$j]=mysqli_real_escape_string($conn,$Row[$j]);
                   // echo 'ooooooo'.$headings[0].'mmmmmmmmmmmmmmm';
                   // SELECT * FROM excell_db where name="name" and fac="II-SEMESTER";
                }
                else
                {
                     $subs[$j]=mysqli_real_escape_string($conn,$Row[$j]);
                }

            }
            $k++;
              //  $sqls="SELECT max(Roll) FROM excell_db";
            //$ress=mysqli_query($conn,$sqls);
            //echo $ress['Roll']; 
                if($name!='Name' && $name!=''){
                if (!empty($name) || !empty($roll)) {
                    
                        for($s=2;$s<5;$s++){
                        $query = "insert into month_attendance(stname,Roll,styear,stbranch,section,semester,month_count,month_name,noOfClasses,subject) values('".$name."','".$roll."','".$_GET['yr']."','".$_GET['dep']."','".$_GET['sec']."','".$_GET['sem']."','".$_POST['smonth2']."','".$_POST['gMonth2']."','".$subs[$s]."','".$headings[$s]."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
                }
            }
            else
            {
            	print_r($headings);
                continue;
            }




             }
        
         }
     }
     else{
         $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
     }
 }
 
}
if(isset($_POST['delet'])){
     $query = "TRUNCATE TABLE excell_db";
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
	<title>HOD | Add Attendance</title>

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
			
			  <center>
			  	<div class="center"><h3><?php echo $ye." ".$dep." ".$secs;?></h3><br>
       <div class="center"><h2>ADD Attendance</h2></div>
       <hr>
	</center>
	<div>

       <nav id="nav-menu-container">

					<ul class="nav-menu">
						<li><a href="hodPage.php"><font color="#191970">HOME</font></a></li>
						
						<li class="menu-has-children menu-active"><a href="#!"><font color="#191970">ADD SEMESTER-WISE</font></a>
							<ul>
								<li><a href="hod_attendance2.php?dep=<?php echo $dep;?>&yr=<?php echo $ye;?>&sec=<?php echo $secs;?>&sem=I-SEMESTER">Semester-I</a></li>
							
								<li><a href="hod_attendance2.php?dep=<?php echo $dep;?>&yr=<?php echo $ye;?>&sec=<?php echo $secs;?>&sem=II-SEMESTER">Semester-II</a></li>
							
								
							</ul>
						</li>
						
					</ul>
					
				</nav><!-- #nav-menu-container -->
       

			</div>
<br>
<hr>
<div id="show">
<?php
	if(isset($_GET['sem'])){
	if($_GET['sem']=='I-SEMESTER')
	{
		?>
		
<label><h4><?php echo $ye." ".$_GET['sem'];?></h4></label>










    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <h5><font color="red">Select Month:</font></h5>
    <select name='gMonth' onchange="show_month()">
    <option selected value='' disabled="true">--Select Month--</option>
    <option value='January'>January</option>
    <option value='Febraury'>Febraury</option>
    <option value='March'>March</option>
    <option value='April'>April</option>
    <option value='May'>May</option>
    <option value='June'>June</option>
    <option value='July'>July</option>
    <option value='August'>August</option>
    <option value='September'>September</option>
    <option value='October'>October</option>
    <option value='November'>November</option>
    <option value='December'>December</option>
    </select> <br>
    <h5>Month Count in this semester ?</h5>
<font color="text-black">
    <input type="radio" name="smonth" value="month_1"/> MONTH-1 &nbsp;&nbsp;
    <input type="radio" name="smonth" value="month_2"/> MONTH-2 &nbsp;&nbsp;
    <input type="radio" name="smonth" value="month_3"/> MONTH-3 &nbsp;&nbsp;
    <input type="radio" name="smonth" value="month_4"/> MONTH-4 &nbsp;&nbsp;
</font><br><br>
    <h3>Import Excel File into MySQL Database </h3><br>
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import1"
                    class="btn-submit">Import</button>
                    <button type="submit" id="submit" name="delet"
                    class="btn-submit">Deletee</button>
        
            </div>

        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="red"><?php if(!empty($message)) { echo $message; } ?></font></div>

		<?php
	}else{
		?>
		
		<label><h4><?php echo $ye." ".$_GET['sem'];?></h4></label>
		
    <br><br>
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
             <h5><font color="red">Select Month:</font></h5>
    <select name='gMonth2' onchange="show_month()">
    <option selected value='' disabled="true">--Select Month--</option>
    <option value='January'>January</option>
    <option value='Febraury'>Febraury</option>
    <option value='March'>March</option>
    <option value='April'>April</option>
    <option value='May'>May</option>
    <option value='June'>June</option>
    <option value='July'>July</option>
    <option value='August'>August</option>
    <option value='September'>September</option>
    <option value='October'>October</option>
    <option value='November'>November</option>
    <option value='December'>December</option>
    </select> <br>
    <h5>Month Count in this semester ?</h5>
<font color="text-black">
    <input type="radio" name="smonth2" value="month_1"/> MONTH-1 &nbsp;&nbsp;
    <input type="radio" name="smonth2" value="month_2"/> MONTH-2 &nbsp;&nbsp;
    <input type="radio" name="smonth2" value="month_3"/> MONTH-3 &nbsp;&nbsp;
    <input type="radio" name="smonth2" value="month_4"/> MONTH-4 &nbsp;&nbsp;
</font><br><br>
<h3>Import Excel File into MySQL Database </h3><br>
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import2"
                    class="btn-submit">Import</button>
                    <button type="submit" id="submit" name="delet"
                    class="btn-submit">Deletee</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="red"><?php if(!empty($message)) { echo $message; } ?></font></div>
		<?php
	}
}
?>
	</div>







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