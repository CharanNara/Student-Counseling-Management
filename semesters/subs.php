<?php
$dep="";
$sem="";
$message='';
$subyr=$sub_semester="";
if(isset($_GET['sub_br']))
{
	$sub_br=$_GET['sub_br'];

}
if(isset($_GET['sem'])){
  $sem=$_GET['sem'];
  
}
if(isset($_GET['subyr']))
{
  $subyr=$_GET['subyr'];
}
if(isset($_GET['sub_semester']))
{
  $sub_semester=$_GET['sub_semester'];
}
include '../templates/db_connect.php';
require_once('../vendor/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('../vendor/spreadsheet-reader-master/SpreadsheetReader.php');
//require_once('vendor/spreadsheet-reader-master/SpreadsheetReader_XLSX.php');
//require_once dirname(__FILE__).'Includes/Classes/PHPExcel/IOFactory.php';
session_start();
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
                    $fileDestination='../uploads/'.$fileName;
                    move_uploaded_file($fileTempName, $fileDestination);
                    //print_r($fileDestination);
        
        $Reader = new SpreadsheetReader($fileDestination);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $subj = "";
                if(isset($Row[0])) {
                  if(isset($Row[1]))
                    $subj = mysqli_real_escape_string($conn,$Row[0]);
                }
               
               
               
               
                if (!empty($subj) && $subj!='Subject' ) {
            $sqll = "INSERT INTO subjects_table(subject_name,sub_branch,sub_sem,subject_year,subject_semester) VALUES('".$subj."','".$sub_br."','".$sem."','".$subyr."','".$sub_semester."')";
                    

                    $ress = mysqli_query($conn, $sqll);
               // $row2=mysqli_fetch_assoc($ress);
               //echo $row['subject_name'];
                    if (!empty($ress)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";

                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
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
	
	$subs_br=$sub_br;
  $subs_sem=$sem;
     $query = "DELETE FROM subjects_table WHERE sub_branch='".$subs_br."' and sub_sem='".$sem."' ";
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
  <title>HOD PAGE</title>

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
          
            
            <li><a href="../logout.php"><font color="#191970">Logout</font></a></li>
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
       <div class="center"><h2>SUBJECTS</h2></div>
       <div class="center"><h2><?php echo $sem;?></h2></div>
       <hr>
  </center>

<h3>SUBJECT DETAILS </h3>
    <br>
    <h5>For any changes Press DELETE, UPDATE the Excel sheet and import it here..To avoid duplicate records</h5>
    
    <br>

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
            <hr>
        
        </form>
        <font color="red"><p><?php echo $message;?></p></font>
    </div>
  </div>
</section>
  









  <!-- ####################### Start Scroll to Top Area ####################### -->
    <div id="back-top ">
      <a title="Go to Top " href="# "></a>
    </div>
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