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
  header("Location: hod-log.php");
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
	<title>HOD-Monthly Attendance</title>

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
					
						
						<li><a href="../logout.php?whom=hod"><font color="#191970">Logout</font></a></li>
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
       <h3><font color="blue">MONTHLY ATTENDANCE </font></h3>
       <hr>

	</center>

<h5>1st MONTH ATTENDANCE</h5><br>
    <div id="response" class="<?php if(!empty($type1)) { echo $type1 . " display-block"; } ?>"><font color="green"><?php if(!empty($message1)) { echo $message1; } ?></font></div>
     <div id="response" class="<?php if(!empty($type1)) { echo $type1 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr)) { echo $errorr; } ?></font></div>

<div style="text-align: center;"><h3><?php echo $m1;?></h3></div>
    <?php
   // $sqlSelect = "SELECT * FROM monthly_attendance";
    //$result = mysqli_query($conn, $sqlSelect);
    $sqlex="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_1' ";
    $sqlex2="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_1' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $reslex=mysqli_query($conn,$sqlex);
    $reslex2=mysqli_query($conn,$sqlex2);
    $rowlex=mysqli_fetch_array($reslex2);
     if(empty($rowlex))
        {?>

       <h3><font color="red">Did not Added the attendance of Month- 1  Yet !</font></h3>
        <?php
    }
$sqlsub2="SELECT * FROM subjects_table WHERE subject_year='".$rowlex['styear']."' AND sub_branch='".$rowlex['stbranch']."' AND subject_semester='".$rowlex['Semester']."'";
$ressub3=mysqli_query($conn,$sqlsub2);
    $ressub2=mysqli_query($conn,$sqlsub2);

    $ropsql="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_1' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $resrop=mysqli_query($conn,$ropsql);
    $rop=mysqli_fetch_array($resrop);
    $sqlsub="SELECT * FROM subjects_table WHERE subject_year='".$rop['styear']."' AND sub_branch='".$rop['stbranch']."' AND subject_semester='".$rop['Semester']."' ";
    $ressub=mysqli_query($conn,$sqlsub);
//$row = mysqli_fetch_array($result);

$pro="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_1' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."' ";
$prores=mysqli_query($conn,$pro);
$prow=mysqli_fetch_array($prores);
//print_r($prow['subject']);
?>
<center><h4 style="float: right;right: 0px"><?php echo "Month :".$prow['month_name']."   ";?></h4></center>
<?php
if (mysqli_num_rows($ressub) > 0)
{
    
    

?>
        
    <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                <th>Subject</th>
                <th>Classes Attended</th>
                

            </tr>
        </thead>
<?php
$j=1;

    while ($rowex=mysqli_fetch_array($reslex)) {
    	
       $row2=mysqli_fetch_array($ressub);
       if($row2['sub_sem']==$title){
        	 
        	

?>                  
        <tbody>
            <?php

            
            
            if($rowex['Semester']==$row2['subject_semester'] && $rowex['stbranch']==trim($row2['sub_branch']) && $rowex['styear']==$row2['subject_year'])
            {
                
                 if((strcasecmp($rowex['subject'],"percentage")!=0) && (strcasecmp($rowex['subject'], "total")!=0)){
                
              ?>
        
        <tr>
            
            <td>
                 
                <?php
                             /*$subsql="SELECT * FROM subjects_table WHERE subject_name LIKE '%".$rowex['subject']."%'";
                             $subres=mysqli_query($conn,$subsql);
                             $subrow=mysqli_fetch_array($subres);
                             if(strpos($rowex['subject'],"/"))
                             {
                                list($substrng3,$remaining3)=explode("/", $rowex['subject']);
                                if()
                            
                             }
                            print_r($subrow['subject_name']);
                             //list($substrng,$remaining)=explode(' ', $subrow['subject_name']);
                           // $str=$subrow['subject_name'];
                            
                            list($func, $field) = array_pad(explode(':', $subrow['subject_name'], 2), 2, null);
               //  echo trim($substrng);
                // if (strpos($substrng, $rowex['subject']) !== false)*/
                                echo $rowex['subject'];


                 
            
             
          
                ?>
                    
                </td>
               
            <td>
                
           <?php
           echo $rowex['noOfClasses'];
           ?>
            </td>
           

            
            
        </tr>
          <?php
      }
      }
          
          ?>
      
        
<?php
}
    }
?>
        </tbody>
    </table>
<?php 
} 
?>


<br>
<?php
if(mysqli_num_rows($prores)>0)
{
    ?>
     <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                
<th>Total/percent</th>
<th>for Attended Classes</th>
                
               

            </tr>
        </thead>
        <?php
             while ($prorow=mysqli_fetch_assoc($prores)) {
           //  print_r($prorow['subject']);
            $roww=mysqli_fetch_array($ressub3);


if(strcasecmp($prorow['subject'],"total")==0)
              {
               // print_r($roww);
      //  echo $roww['sub_sem'];
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
<?php
}
}
?>
<?php 
if(strcasecmp($prorow['subject'],"percentage")==0)
              {
      //  echo $roww['sub_sem'];
              //  print_r($roww);
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
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
?>
<hr>



<h5>2nd MONTH ATTENDANCE</h5><br>

    <div id="response" class="<?php if(!empty($type2)) { echo $type1 . " display-block"; } ?>"><font color="green"><?php if(!empty($message2)) { echo $message2; } ?></font></div>
     <div id="response" class="<?php if(!empty($type2)) { echo $type1 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr)) { echo $errorr; } ?></font></div>

<div style="text-align: center;"><h3><?php echo $m2;?></h3></div>
    <?php
   // $sqlSelect = "SELECT * FROM monthly_attendance";
    //$result = mysqli_query($conn, $sqlSelect);
   $sqlex="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_2' ";
    $sqlex2="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_2' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $reslex=mysqli_query($conn,$sqlex);
    $reslex2=mysqli_query($conn,$sqlex2);
    $rowlex=mysqli_fetch_array($reslex2);
     if(empty($rowlex))
        {?>

       <h3><font color="red">Did not Added the attendance of Month- 2  Yet !</font></h3>
        <?php
    }
$sqlsub2="SELECT * FROM subjects_table WHERE subject_year='".$rowlex['styear']."' AND sub_branch='".$rowlex['stbranch']."' AND subject_semester='".$rowlex['Semester']."'";
$ressub3=mysqli_query($conn,$sqlsub2);
    $ressub2=mysqli_query($conn,$sqlsub2);

    $ropsql="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_2' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $resrop=mysqli_query($conn,$ropsql);
    $rop=mysqli_fetch_array($resrop);
    $sqlsub="SELECT * FROM subjects_table WHERE subject_year='".$rop['styear']."' AND sub_branch='".$rop['stbranch']."' AND subject_semester='".$rop['Semester']."' ";
    $ressub=mysqli_query($conn,$sqlsub);
//$row = mysqli_fetch_array($result);

$pro="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_2' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."' ";
$prores=mysqli_query($conn,$pro);
$prow=mysqli_fetch_array($prores);
?>
<center><h4 style="float: right;right: 0px"><?php echo "Month :".$prow['month_name']."   ";?></h4></center>
<?php
//print_r($prow['subject']);
if (mysqli_num_rows($ressub) > 0)
{
    
    

?>
        
    <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                <th>Subject</th>
                <th>Classes Attended</th>
                

            </tr>
        </thead>
<?php
$j=1;

    while ($rowex=mysqli_fetch_array($reslex)) {
        
       $row2=mysqli_fetch_array($ressub);
       if($row2['sub_sem']==$title){
             
            

?>                  
        <tbody>
            <?php

            
            
            if($rowex['Semester']==$row2['subject_semester'] && $rowex['stbranch']==trim($row2['sub_branch']) && $rowex['styear']==$row2['subject_year'])
            {
                
                 if((strcasecmp($rowex['subject'],"percentage")!=0) && (strcasecmp($rowex['subject'], "total")!=0)){
                
              ?>
        
        <tr>
            
            <td>
                 
                <?php
                             /*$subsql="SELECT * FROM subjects_table WHERE subject_name LIKE '%".$rowex['subject']."%'";
                             $subres=mysqli_query($conn,$subsql);
                             $subrow=mysqli_fetch_array($subres);
                             if(strpos($rowex['subject'],"/"))
                             {
                                list($substrng3,$remaining3)=explode("/", $rowex['subject']);
                                if()
                            
                             }
                            print_r($subrow['subject_name']);
                             //list($substrng,$remaining)=explode(' ', $subrow['subject_name']);
                           // $str=$subrow['subject_name'];
                            
                            list($func, $field) = array_pad(explode(':', $subrow['subject_name'], 2), 2, null);
               //  echo trim($substrng);
                // if (strpos($substrng, $rowex['subject']) !== false)*/
                                echo $rowex['subject'];


                 
            
             
          
                ?>
                    
                </td>
               
            <td>
                
           <?php
           echo $rowex['noOfClasses'];
           ?>
            </td>
           

            
            
        </tr>
          <?php
      }
      }
          
          ?>
      
        
<?php
}
    }
?>
        </tbody>
    </table>
<?php 
} 
?>


<br>
<?php
if(mysqli_num_rows($prores)>0)
{
    ?>
     <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                
<th>Total/percent</th>
<th>for Attended Classes</th>
                
               

            </tr>
        </thead>
        <?php
             while ($prorow=mysqli_fetch_assoc($prores)) {
           //  print_r($prorow['subject']);
            $roww=mysqli_fetch_array($ressub3);


if(strcasecmp($prorow['subject'],"total")==0)
              {
               // print_r($roww);
      //  echo $roww['sub_sem'];
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
<?php
}
}
?>
<?php 
if(strcasecmp($prorow['subject'],"percentage")==0)
              {
      //  echo $roww['sub_sem'];
              //  print_r($roww);
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
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
?>

<hr>



<h5>3rd MONTH ATTENDANCE</h5><br>

    <div id="response" class="<?php if(!empty($type3)) { echo $type1 . " display-block"; } ?>"><font color="green"><?php if(!empty($message3)) { echo $message1; } ?></font></div>
     <div id="response" class="<?php if(!empty($type3)) { echo $type1 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr)) { echo $errorr; } ?></font></div>

<div style="text-align: center;"><h3><?php echo $m3;?></h3></div>
    <?php
   // $sqlSelect = "SELECT * FROM monthly_attendance";
    //$result = mysqli_query($conn, $sqlSelect);
    $sqlex="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_3' ";
    $sqlex2="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_3' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $reslex=mysqli_query($conn,$sqlex);
    $reslex2=mysqli_query($conn,$sqlex2);
    $rowlex=mysqli_fetch_array($reslex2);
     if(empty($rowlex))
        {?>

       <h3><font color="red">Did not Added the attendance of Month- 3  Yet !</font></h3>
        <?php
    }
$sqlsub2="SELECT * FROM subjects_table WHERE subject_year='".$rowlex['styear']."' AND sub_branch='".$rowlex['stbranch']."' AND subject_semester='".$rowlex['Semester']."'";
$ressub3=mysqli_query($conn,$sqlsub2);
    $ressub2=mysqli_query($conn,$sqlsub2);

    $ropsql="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_3' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $resrop=mysqli_query($conn,$ropsql);
    $rop=mysqli_fetch_array($resrop);
    $sqlsub="SELECT * FROM subjects_table WHERE subject_year='".$rop['styear']."' AND sub_branch='".$rop['stbranch']."' AND subject_semester='".$rop['Semester']."' ";
    $ressub=mysqli_query($conn,$sqlsub);
//$row = mysqli_fetch_array($result);

$pro="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_3' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."' ";
$prores=mysqli_query($conn,$pro);
$prow=mysqli_fetch_array($prores);
?>
<center><h4 style="float: right;right: 0px"><?php echo "Month :".$prow['month_name']."   ";?></h4></center>
<?php
//print_r($prow['subject']);
if (mysqli_num_rows($ressub) > 0)
{
    
    

?>
        
    <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                <th>Subject</th>
                <th>Classes Attended</th>
                

            </tr>
        </thead>
<?php
$j=1;

    while ($rowex=mysqli_fetch_array($reslex)) {
        
       $row2=mysqli_fetch_array($ressub);
       if($row2['sub_sem']==$title){
             
            

?>                  
        <tbody>
            <?php

            
            
            if($rowex['Semester']==$row2['subject_semester'] && $rowex['stbranch']==trim($row2['sub_branch']) && $rowex['styear']==$row2['subject_year'])
            {
                
                 if((strcasecmp($rowex['subject'],"percentage")!=0) && (strcasecmp($rowex['subject'], "total")!=0)){
                
              ?>
        
        <tr>
            
            <td>
                 
                <?php
                             /*$subsql="SELECT * FROM subjects_table WHERE subject_name LIKE '%".$rowex['subject']."%'";
                             $subres=mysqli_query($conn,$subsql);
                             $subrow=mysqli_fetch_array($subres);
                             if(strpos($rowex['subject'],"/"))
                             {
                                list($substrng3,$remaining3)=explode("/", $rowex['subject']);
                                if()
                            
                             }
                            print_r($subrow['subject_name']);
                             //list($substrng,$remaining)=explode(' ', $subrow['subject_name']);
                           // $str=$subrow['subject_name'];
                            
                            list($func, $field) = array_pad(explode(':', $subrow['subject_name'], 2), 2, null);
               //  echo trim($substrng);
                // if (strpos($substrng, $rowex['subject']) !== false)*/
                                echo $rowex['subject'];


                 
            
             
          
                ?>
                    
                </td>
               
            <td>
                
           <?php
           echo $rowex['noOfClasses'];
           ?>
            </td>
           

            
            
        </tr>
          <?php
      }
      }
          
          ?>
      
        
<?php
}
    }
?>
        </tbody>
    </table>
<?php 
} 
?>


<br>
<?php
if(mysqli_num_rows($prores)>0)
{
    ?>
     <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                
<th>Total/percent</th>
<th>for Attended Classes</th>
                
               

            </tr>
        </thead>
        <?php
             while ($prorow=mysqli_fetch_assoc($prores)) {
           //  print_r($prorow['subject']);
            $roww=mysqli_fetch_array($ressub3);


if(strcasecmp($prorow['subject'],"total")==0)
              {
               // print_r($roww);
      //  echo $roww['sub_sem'];
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
<?php
}
}
?>
<?php 
if(strcasecmp($prorow['subject'],"percentage")==0)
              {
      //  echo $roww['sub_sem'];
              //  print_r($roww);
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
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
?>

<hr>




<h5>4th MONTH ATTENDANCE</h5><br>

    <div id="response" class="<?php if(!empty($type4)) { echo $type1 . " display-block"; } ?>"><font color="green"><?php if(!empty($message4)) { echo $message4; } ?></font></div>
     <div id="response" class="<?php if(!empty($type4)) { echo $type1 . " display-block"; } ?>"><font color="red"><?php if(!empty($errorr)) { echo $errorr; } ?></font></div>

<div style="text-align: center;"><h3><?php echo $m4;?></h3></div>
    <?php
   // $sqlSelect = "SELECT * FROM monthly_attendance";
    //$result = mysqli_query($conn, $sqlSelect);
   $sqlex="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_4' ";
    $sqlex2="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_4' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $reslex=mysqli_query($conn,$sqlex);
    $reslex2=mysqli_query($conn,$sqlex2);
    $rowlex=mysqli_fetch_array($reslex2);
     if(empty($rowlex))
        {?>

       <h3><font color="red">Did not Added the attendance of Month- 4  Yet !</font></h3>
        <?php
    }
$sqlsub2="SELECT * FROM subjects_table WHERE subject_year='".$rowlex['styear']."' AND sub_branch='".$rowlex['stbranch']."' AND subject_semester='".$rowlex['Semester']."'";
$ressub3=mysqli_query($conn,$sqlsub2);
    $ressub2=mysqli_query($conn,$sqlsub2);

    $ropsql="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_4' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."'";
    $resrop=mysqli_query($conn,$ropsql);
    $rop=mysqli_fetch_array($resrop);
    $sqlsub="SELECT * FROM subjects_table WHERE subject_year='".$rop['styear']."' AND sub_branch='".$rop['stbranch']."' AND subject_semester='".$rop['Semester']."' ";
    $ressub=mysqli_query($conn,$sqlsub);
//$row = mysqli_fetch_array($result);

$pro="SELECT * FROM month_attendance WHERE stname='".$_GET['stuname']."' AND month_count='month_4' AND styear='".$_GET['yrs']."' AND Semester='".$_GET['sems']."' ";
$prores=mysqli_query($conn,$pro);
$prow=mysqli_fetch_array($prores);
?>
<center><h4 style="float: right;right: 0px"><?php echo "Month :".$prow['month_name']."   ";?></h4></center>
<?php
//print_r($prow['subject']);
if (mysqli_num_rows($ressub) > 0)
{
    
    

?>
        
    <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                <th>Subject</th>
                <th>Classes Attended</th>
                

            </tr>
        </thead>
<?php
$j=1;

    while ($rowex=mysqli_fetch_array($reslex)) {
        
       $row2=mysqli_fetch_array($ressub);
       if($row2['sub_sem']==$title){
             
            

?>                  
        <tbody>
            <?php

            
            
            if($rowex['Semester']==$row2['subject_semester'] && $rowex['stbranch']==trim($row2['sub_branch']) && $rowex['styear']==$row2['subject_year'])
            {
                
                 if((strcasecmp($rowex['subject'],"percentage")!=0) && (strcasecmp($rowex['subject'], "total")!=0)){
                
              ?>
        
        <tr>
            
            <td>
                 
                <?php
                             /*$subsql="SELECT * FROM subjects_table WHERE subject_name LIKE '%".$rowex['subject']."%'";
                             $subres=mysqli_query($conn,$subsql);
                             $subrow=mysqli_fetch_array($subres);
                             if(strpos($rowex['subject'],"/"))
                             {
                                list($substrng3,$remaining3)=explode("/", $rowex['subject']);
                                if()
                            
                             }
                            print_r($subrow['subject_name']);
                             //list($substrng,$remaining)=explode(' ', $subrow['subject_name']);
                           // $str=$subrow['subject_name'];
                            
                            list($func, $field) = array_pad(explode(':', $subrow['subject_name'], 2), 2, null);
               //  echo trim($substrng);
                // if (strpos($substrng, $rowex['subject']) !== false)*/
                                echo $rowex['subject'];


                 
            
             
          
                ?>
                    
                </td>
               
            <td>
                
           <?php
           echo $rowex['noOfClasses'];
           ?>
            </td>
           

            
            
        </tr>
          <?php
      }
      }
          
          ?>
      
        
<?php
}
    }
?>
        </tbody>
    </table>
<?php 
} 
?>


<br>
<?php
if(mysqli_num_rows($prores)>0)
{
    ?>
     <table class="progress-table-wrap" border="2">
        <thead>
            <tr>
                
                
<th>Total/percent</th>
<th>for Attended Classes</th>
                
               

            </tr>
        </thead>
        <?php
             while ($prorow=mysqli_fetch_assoc($prores)) {
           //  print_r($prorow['subject']);
            $roww=mysqli_fetch_array($ressub3);


if(strcasecmp($prorow['subject'],"total")==0)
              {
               // print_r($roww);
      //  echo $roww['sub_sem'];
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
<?php
}
}
?>
<?php 
if(strcasecmp($prorow['subject'],"percentage")==0)
              {
      //  echo $roww['sub_sem'];
              //  print_r($roww);
        ?>                  
        <tbody>
            <?php
            if($roww['sub_sem']==$title) {
            ?>
            <tr>
<td><?php echo $prorow['subject']; ?></td>
<td><?php echo $prorow['noOfClasses']; ?></td></tr>
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
?>











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