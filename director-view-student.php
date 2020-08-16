<?php
$curr='';
include 'templates/db_connect.php';
$mode="readonly";
$selectmode="disabled";
$filedes='';
session_start();
if(!isset($_SESSION['dirEmail']))
{
    header("Location: Director-log.php");
}
if(isset($_GET['stuRoll'] ))
{
	if(isset($_GET['stuName'])){


	  $studentName=$_GET['stuName'];
      $rno=$_GET['stuRoll'];
	if (isset($_POST['save'])) {

         $num=strval($_POST['studentcont']);
	 	
/*SNo
Roll
Name
category
img_dir
father_name
focc
mother_name
mocc
yearOfJoin
contact
email
address
languages
bloodgrp
hobbies
interests
ten_yearOfPass
ten_school
ten_percent
twelve_yearOfPass
twelve_school
twelve_percent
counseling_notes
notes_date*/
if(isset($_POST['yoj'])){
	$yroj=$_POST['yoj'];
	$curr=date("Y")-$yroj;
        echo $curr;
        if(date("m")>6)
        	$curr++;
        echo $curr;
        if($curr==1)
        	$yr='IYear';
        elseif ($curr==2) {
        	$yr='IIYear';
        }
        elseif($curr==3)
        	$yr='IIIYear';
        elseif($curr==4)
        	$yr='IVYear';
			$sql="UPDATE student_detail SET Name='".$_POST['name']."',category='".$_POST['cat']."',StudentContact='".$_POST['studentcont']."',father_name='".$_POST['fname']."',focc='".$_POST['focc']."',mother_name='".$_POST['mname']."',mocc='".$_POST['mocc']."',contact='".$_POST['cont']."',email='".$_POST['email']."',address='".$_POST['add']."',languages='".$_POST['langs']."',bloodgrp='".$_POST['bloodgrp']."',hobbies='".$_POST['hobb']."',interests='".$_POST['interests']."',ten_yearOfPass='".$_POST['10pass']."',ten_school='".$_POST['10schl']."',ten_percent='".$_POST['10grade']."',twelve_yearOfPass='".$_POST['12pass']."',twelve_school='".$_POST['12schl']."',twelve_percent='".$_POST['12grade']."',eamcet='".$_POST['eamcet']."',aieee='".$_POST['aieee']."',yearOfJoin='".$yroj."',styear='".$yr."' WHERE Roll='".$_GET['stuRoll']."' ";

$finalresult=mysqli_query($conn,$sql);
if (! empty($finalresult)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        echo $_POST['focc'].$_POST['name'];
                        $message = "Problem in Importing Excel Data";
                    }
		# code...
		
	$mode="readonly";
	$selectmode="disabled";
}
	}
	elseif (isset($_POST['edit'])) {
		# code...
		
	$mode="";
	$selectmode="";
	}

	

	if (isset($_POST["image"]))
{
       
 $file=$_FILES['file'];
  $fileName= $_FILES['file']['name'];
 $fileTempName= $_FILES['file']['tmp_name'];
 $fileError=$_FILES['file']['error'];
 $fileType=$_FILES['file']['type'];
 $fileSize=$_FILES['file']['size'];
 $fileExt=explode('.', $fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed= array('jpg','jpeg','png');
        if(in_array($fileActualExt, $allowed))
        {
        	if($fileError===0){
        		if($fileSize<10000000){
        			
        			$fileDestination='uploads/'.$fileName;
        			move_uploaded_file($fileTempName, $fileDestination);
        			print_r($fileDestination);
        			$filedes=$fileDestination;
        			$sql2="UPDATE student_detail SET img_dir='".$fileDestination."' WHERE Roll='".$_GET['stuRoll']."' ";
        			$imgres=mysqli_query($conn,$sql2);
        			//header("Location : st_details.php");

        		}
        		else{
        			echo "Your file is too big";
        		}
        	} 
        	else{
        		echo "There was an error uploading file";
        	}
        }
        else{
        	echo "You cannot upload files of this type";
        }
       
 
}


if(isset($_POST['del'])){
	$fileDestination="";
     
                    echo 'success';
}
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
	<title>Director | STUDENT</title>

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
						<li><a href="DirectorPage.php"><font color="#191970">Home</font></a></li>
					
						
						<li><a href="logout.php?whom=director"><font color="#191970">Logout</font></a></li>
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
       <div class="center"><h2>VIEW SECTION</h2></div>
       <hr>
	</center>
	<div>


       	<nav id="nav-menu-container">

					<ul class="nav-menu">
						<li><a href="DirectorPage.php"><font color="#191970">HOME</font></a></li>
						
						<li class="menu-has-children menu-active"><a href="#!"><font color="#191970">SEMESTER</font></a>
							<ul>
								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=I-BTech I-SEMESTER&sems=I-SEMESTER&indsem=I-SEMESTER& yrs=I Year">Semester-I</a></li>
							
								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=I-BTech II-SEMESTER&sems=II-SEMESTER&indsem=II-SEMESTER& yrs=I Year">Semester-II</a></li>
							
								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=II-BTech I-SEMESTER&sems=I-SEMESTER&indsem=III-SEMESTER& yrs=II Year">Semester-III</a></li>

								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=II-BTech II-SEMESTER&sems=II-SEMESTER&indsem=IV-SEMESTER& yrs=II Year">Semester-IV</a></li>
								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=III-BTech I-SEMESTER&sems=I-SEMESTER&indsem=V-SEMESTER& yrs=III Year">Semester-V</a></li>
								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=III-BTech II-SEMESTER&sems=II-SEMESTER&indsem=VI-SEMESTER& yrs=III Year">Semester-VI</a></li>
								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=IV-BTech I-SEMESTER&sems=I-SEMESTER&indsem=VII-SEMESTER& yrs=IV Year">Semester-VII</a></li>
								<li><a href="director-academic-attendance.php?roll=<?php echo $_GET['stuRoll'];?>&stuname=<?php echo $studentName  ?> & sem=IV-BTech II-SEMESTER&sems=II-SEMESTER&indsem=II-SEMESTER& yrs=IV Year">Semester-VIII</a></li>
							</ul>
						</li>
						
					</ul>
					
				</nav><!-- #nav-menu-container -->

			</div>

<br>
<hr>
<?php 

$sql3="SELECT * FROM student_detail WHERE Roll='".$rno."'";
         $res3=mysqli_query($conn,$sql3);
         $row=mysqli_fetch_assoc($res3);
?>
<center><h5>ADD IMAGE</h5></center>
    <br><br>
    <div class="outer-container">
        <form action="" method="post"
            name="imageImport" id="imageImport" enctype="multipart/form-data">
            <div>
               <center> <label>Choose Image
                    File</label> <input type="file" name="file"
                    id="file">
                <button type="submit" id="submit" name="image"
                    class="btn-submit">Import</button>
                    <button type="submit" id="submit" name="del"
                    class="btn-submit">Deletee</button></center>
                    <div><center><img src="<?php echo $row['img_dir'];?> " alt="NOIMG" height="130" width="100"></center></div>
                    <hr>
        
            </div>
        </form>
        <form action="" method="POST">
            <div class="text-right">
            <input type="submit" name="edit" value="EDIT">
            <input type="submit" name="save" value="SAVE">
        </div>

            <div>
			<h4>Student's Details: </h4>
			<table>
			<tr><td>Name : </td><td><input type="text" name="name" value="<?php echo $row['Name'];?>" <?php echo $mode;?>></td></tr>
			<tr><td>Roll No. : </td><td><input type="text" name="roll" value="<?php echo $_GET['stuRoll'];?>" <?php echo $mode;?>></td></tr>
			<tr><td>Student Mobile No. : </td><td><input type="text" name="studentcont" value="<?php echo $row['StudentContact'];?>" <?php echo $mode;?>></td></tr>
			<tr><td>Category : </td><td>
                 <input type="text" name="cat"  placeholder="Convener(OC/BC/SC..etc) or Management quota" <?php echo $mode;?> value="<?php echo trim($row['category']);?>" size="40">
				</td></tr>
			<tr><td>Year Of Joining AGI : </td><td>
            <label><b><font color="black"><?php echo $row['yearOfJoin'];?></font></b></label>
			</td></tr>
		</table>
			<h4>Parent's Details: </h4><br>
	<table border="2">
		<tr><td>Father's Name :</td><td><input type="text" name="fname" value="<?php echo $row['father_name'];?>" <?php echo $mode;?>></td> </tr>
			<td>Occupation :</td><td><input type="text" name="focc" value="<?php echo $row['focc'];?>" <?php echo $mode;?>></td></tr>
			<tr><td>Mother's Name :</td><td><input type="text" name="mname" value="<?php echo $row['mother_name'];?>" <?php echo $mode;?>></td> </tr>
			<td>Occupation :</td><td><input type="text" name="mocc" value="<?php echo $row['mocc'];?>" <?php echo $mode;?>></td></tr>
			<tr><td>Parent Contact No :</td><td><input type="text" name="cont" value="<?php echo $row['contact'];?>" <?php echo $mode;?>></td> </tr>
			<td>E-mail id :</td><td><input type="text" name="email" value="<?php echo $row['email'];?>" <?php echo $mode;?>></td></tr>
			<tr><td>Address :</td><td><textarea rows="6" cols="30"  name="add" <?php echo $mode;?>><?php echo trim($row['address']);?></textarea></td></tr>

	</table>
<br><br>
	<table border="2">
		<tr><td>Languages Known :</td><td><input type="text" name="langs" value="<?php echo $row['languages'];?>" <?php echo $mode;?>> </td></tr>
			<tr><td>Blood Group :</td><td> <input type="text" name="bloodgrp" value="<?php echo $row['bloodgrp'];?>" <?php echo $mode;?>></td></tr>
			<tr><td>Hobbies :</td><td> <input type="text" name="hobb" value="<?php echo $row['hobbies'];?>" <?php echo $mode;?>></td></tr>
			
			<tr><td>Special Interests :</td><td><input type="text" name="interests" value="<?php echo $row['interests'];?>" <?php echo $mode;?>></td></tr>

	</table>
	<br><br>
	<h4>Past Academic performance: </h4><br>
	<table border="2">
		<tr><td>S.No.</td><td>Class</td><td>Year of Pass</td><td>School/College</td><td>% of marks/Grade</td></tr>
		<tr><td>1</td><td>10th STD/ equivalent</td><td><input type="text" name="10pass" value="<?php echo $row['ten_yearOfPass'];?>" <?php echo $mode;?>></td><td><input type="text" name="10schl" size="35" value="<?php echo $row['ten_school'];?>" <?php echo $mode;?>></td><td><input type="text" name="10grade" value="<?php echo $row['ten_percent'];?>" <?php echo $mode;?>></td></tr>
		<tr><td>2</td><td>12th STD/ equivalent</td><td><input type="text" name="12pass" value="<?php echo $row['twelve_yearOfPass'];?>" <?php echo $mode;?>></td><td><input type="text" size="35" name="12schl" value="<?php echo $row['twelve_school'];?>" <?php echo $mode;?>></td><td><input type="text" name="12grade" value="<?php echo $row['twelve_percent'];?>" <?php echo $mode;?>></td></tr>
	</table>
<br><br>
<h4>List of Academic Achievements(EAMCET/ AIEEE Rank etc) : </h4><br>
<table border="2">
	<tr><td>1. </td><td>
<input type="text" name="eamcet"  <?php echo $mode;?> value="<?php echo trim($row['eamcet']);?>" size="100" placeholder="Eamcet">
		</td></tr>
	<tr><td>2. </td><td>
<input type="text" name="aieee"  <?php echo $mode;?> value="<?php echo trim($row['aieee']);?>" size="100" placeholder="AIEEE">
		</td></tr>

</table>
	
			</div>
			<hr>
			<!--
<h2>COUNSELING NOTES</h2>
<table border="2">
	<tr><td>Date</td><td>Remarks</td></tr>
	<tr><td><textarea rows="5" cols="10" name="notesDate" <?php //echo $mode;?>></textarea></td><td><textarea rows="5" cols="50" name="notesArea"<?php //echo $mode;?>></textarea></td></tr>
	<tr><td><textarea rows="5" cols="10" name="notesDate" <?php //echo $mode;?>></textarea></td><td><textarea rows="5" cols="50" name="notesArea"<?php //echo $mode;?>></textarea></td></tr>
	<tr><td><textarea rows="5" cols="10" name="notesDate" <?php //echo $mode;?>></textarea></td><td><textarea rows="5" cols="50" name="notesArea"<?php //echo $mode;?>></textarea></td></tr>
	<tr><td><textarea rows="5" cols="10" name="notesDate" <?php //echo $mode;?>></textarea></td><td><textarea rows="5" cols="50" name="notesArea"<?php //echo $mode;?>></textarea></td></tr>
	

</table>-->
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>



</div>

</section>	


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