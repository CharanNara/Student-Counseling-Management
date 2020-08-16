<?php
$result='';
session_start();
if(!isset($_SESSION['hodEmail']))
{
    header("Location: hod-log.php");
}
$usr='';

include 'templates/db_connect.php';
$hodquery="SELECT * FROM hod_table WHERE hod_name='Vishnu Murthy' and hod_branch='".$_SESSION['hbranch']."' ";
$hodres=mysqli_query($conn,$hodquery);
$row2=mysqli_fetch_assoc($hodres);
$res='';
$hodbranch=$_SESSION['hbranch'];
if(isset($_GET['who']))
{
	$whoo=$_GET['who'];
	if($whoo=='Student')
	{
		if(isset($_POST['search'])){
	$usr=$_POST['username'];
	if(!empty($_POST['username']))
	{
	$sql2="SELECT * FROM student_detail WHERE Roll='$usr' ";
	$result=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result)>0)
		$message="Student Found ! Scroll down to View.";
	else
		$err="*** Student not found ***";
}
else
{
	
		$err="Enter The Roll Number of a student";
	

}
	

	
	
	

	
}
         


	}
	
}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php include('templates/hodHeader.php');?>
	<!-- Start Banner Area -->
	<section class="banner-area relative">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<!--<div class="about-content col-lg-12">-->
				<div class="banner-content col-lg-8 col-md-12">
					<br><br><br><br><h1 class="text-white">
						HOD Page
					</h1>
					<b><h4>Search Student Here:</h4></b>
					<div class="input-wrap">
						<form action="" class="form-box d-flex justify-content-between" method="POST">
							<input type="text" placeholder="ENTER ROLL NUMBER" class="form-control" name="username">
							<button type="submit" name="search" class="btn search-btn" value="<?php echo $_POST['username'];?>">Search</button>
						</form>
					</div>
					<center>
						<div id="response" class="text-white" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="red"><?php if(!empty($err)) { echo $err; } ?></font></div>
            <div id="response" class="text-white" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><font color="green"><?php if(!empty($message)) { echo $message; } ?></font></div></center>

				
					<p></p>
					<!--<div class="link-nav">
						<span class="box">
							<a href="index.html">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="elements.html">Director Page</a>
						</span>
					</div>-->
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="img/rocket.png" alt="">
		</div>
	</section>
	<!-- End Banner Area -->
	<hr>
<nav id="nav-menu-container">

					<ul class="nav-menu">
						<li><a href="hodPage.php"><font color="#191970">HOME</font></a></li>
						
						<li class="menu-has-children menu-active"><a href=""><font color="#191970">Add Attendance</font></a>
							<ul>
								<li><a href="hod_attendance.php?yr=I Year&br=<?php echo $_SESSION['hbranch'];?>">I YEAR</a></li>
							
								<li><a href="hod_attendance.php?yr=II Year&br=<?php echo $_SESSION['hbranch'];?>">II YEAR</a></li>
							
								<li><a href="hod_attendance.php?yr=III Year&br=<?php echo $_SESSION['hbranch'];?>">III YEAR</a></li>

								<li><a href="hod_attendance.php?yr=IV Year&br=<?php echo $_SESSION['hbranch'];?>">IV YEAR</a></li>
							</ul>
						</li>
						<li class="menu-has-children menu-active"><a href=""><font color="#191970">Add Students</font></a>
							<ul>
								<li><a href="hod-add-student.php?yr=IYear&br=<?php echo $_SESSION['hbranch'];?>">I YEAR</a></li>
							
								<li><a href="hod-add-student.php?yr=IIYear&br=<?php echo $_SESSION['hbranch'];?>">II YEAR</a></li>
							
								<li><a href="hod-add-student.php?yr=IIIYear&br=<?php echo $_SESSION['hbranch'];?>">III YEAR</a></li>

								<li><a href="hod-add-student.php?yr=IVYear&br=<?php echo $_SESSION['hbranch'];?>">IV YEAR</a></li>
							</ul>
						</li>
						<li class="menu-has-children menu-active"><a href=""><font color="#191970">Add Academic Performance</font></a>
							<ul>
								<li><a href="hod_academic.php?yr=I Year&br=<?php echo $_SESSION['hbranch'];?>">I YEAR</a></li>
							
								<li><a href="hod_academic.php?yr=II Year&br=<?php echo $_SESSION['hbranch'];?>">II YEAR</a></li>
							
								<li><a href="hod_academic.php?yr=III Year&br=<?php echo $_SESSION['hbranch'];?>">III YEAR</a></li>

								<li><a href="hod_academic.php?yr=IV Year&br=<?php echo $_SESSION['hbranch'];?>">IV YEAR</a></li>
							</ul>
						</li>
						
					</ul>
					
				</nav><!-- #nav-menu-container -->
				<br>

				<hr>
				<center>
	<div class="section-top-border">
				<h3 class="mb-30" id="tablee"><?php echo $_GET['who']." Details";?></h3>
				
						
						<?php
						if(!$result){
							?>
							<p><font color="green">SEARCH STUDENT IN THE SEARCH BAR</font></p>
							<?php
						}
						else{
						
						while($row = mysqli_fetch_array($result)){
							?>
						

						
							<?php
        	
            if($row["department"]==$row2["hod_branch"]." ")
            {
            	$curr=date("Y")-$row['yearOfJoin'];
        
        if(date("m")>6)
        	$curr++;
       
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

              ?>
							
							
						
						<?php
          }
          ?>
<center><h5>Counselor : <?php echo $row['counselor'];?></h5></center><br>
          <table style=" border-collapse: separate;
    border-spacing: 0 1em;">
          	<tr>
          		<td>Name : </td><td></td><td></td><td></td><td><input type="text" name="searchstudent" value="<?php echo $row['Name'];?>" readonly="true"></td>
          		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          		<td>Roll : </td><td></td><td></td><td></td><td><input type="text" name="searchroll" readonly="true" value="<?php echo $row['Roll'];?>"></td>

          	</tr>

          	<tr>

          		<td>Email : </td><td></td><td></td><td></td><td><input type="text" name="search_email" readonly="true" value="<?php echo strtolower($row['Roll']).'@cvsr.ac.in';?>"></td>
          		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          		<td>Mobile No : </td><td></td><td></td><td></td><td><input type="text" name="search_mob" readonly="true" value="<?php echo $row['contact'];?>"></td>
          		
          	</tr>
          	<tr>
          		<td>Year : </td><td></td><td></td><td></td><td><input type="text" name="searchyear" readonly="true" value="<?php echo $row['styear'];?>"></td>
          		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          		<td>Department/Sec : </td><td></td><td></td><td></td><td><label><?php echo $row['department']." ".$row['section'];?></label></td>
                 
          	</tr>
          	
          	

          </table><hr>
          <h3>Parent Details</h3>
           <table style=" border-collapse: separate;
    border-spacing: 0 1em;">
    <tr>

          		<td>Parent Name : </td><td></td><td></td><td></td><td><input type="text" name="search_parent" readonly="true" value="<?php echo $row['father_name']?>"></td>
          		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          		<td>Mobile No : </td><td></td><td></td><td></td><td><input type="text" name="search_mob" readonly="true" value="<?php echo $row['StudentContact'];?>"></td>
          		
          	</tr>
</table><hr>
<br>
<table style=" border-collapse: separate;
    border-spacing: 0 1em;">
	<tr><th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Attendance Details</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Performance Details</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRAPHICAL REPRESENTATION</th></tr>
	<tr>
		<td>Present Attendance : </td>
          		<?php
                       $sql22="SELECT * FROM month_attendance where month_count IN(SELECT MAX(month_count) FROM month_attendance WHERE Semester IN (SELECT MAX(Semester) FROM month_attendance WHERE styear IN (SELECT MAX(styear) FROM month_attendance))) and Roll='".$row['Roll']."' and subject='Percentage'";
                     $res22=mysqli_query($conn,$sql22);
                      if($row22=mysqli_fetch_array($res22))
                     {
          		?>
          		<td><input type="text" name="searchyear" readonly="true" value="<?php echo $row22['noOfClasses']." %";?>"></td>
          		<?php
                     }
          		?>
          		<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td></td><td>Overall CGPA : </td>
<?php
                        $sql23="SELECT * FROM externals WHERE semester IN (SELECT MAX(semester) FROM externals WHERE styear IN (SELECT MAX(styear) FROM externals)) and sturoll='".$row['Roll']."' and subject='CGPA'";
                        $res23=mysqli_query($conn,$sql23);
                        if($row23=mysqli_fetch_array($res23))
                     {
            	?>
<td><input type="text" name="cgpa" readonly="true" value="<?php echo $row23['grade'];?>"></td>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td><a href="graphrep.php?rollno=<?php echo $row['Roll'];?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SHOW CHART</a></td>
                      <?php
                       
}
                       ?>

          		
          		
                 
          	</tr>
          	
</table><hr><br>
<h3>Backlogs</h3><br>
<?php
$back="SELECT * FROM backlogs WHERE Roll='".$row['Roll']."'";
$backres=mysqli_query($conn,$back);

?>
           <table border="1">
    <tr>
<th>&nbsp;&nbsp;Semester&nbsp;&nbsp;</th><th>&nbsp;&nbsp;SUBJECT&nbsp;&nbsp;</th><th>&nbsp;&nbsp;Cleared Date&nbsp;&nbsp;</th>
          	</tr>
          	
          		<?php
                          while($backrow=mysqli_fetch_array($backres))
                          {
                          	?><tr>
                          		<td><b><?php echo $backrow['semester'];?></b></td>
                          	<td><?php echo $backrow['subject_name'];?><br><?php echo $backrow['subject2'];?><br><?php echo $backrow['subject3'];?><br><?php echo $backrow['subject4'];?><br><?php echo $backrow['subject5'];?><br><?php echo $backrow['subject6'];?></td><td><?php echo $backrow['clear_date'];?><br><?php echo $backrow['date2'];?><br><?php echo $backrow['date3'];?><br><?php echo $backrow['date4'];?><br><?php echo $backrow['date5'];?><br><?php echo $backrow['date6'];?></td></tr>
                          	
                          	<?php
                          }
          		?>
          	
</table>
<br>
<hr>
<form action="hod2.php?who=<?php echo $_GET['who'];?>&roll=<?php echo $row['Roll'];?>" method="POST">
<h5><a href="hod-message.php?roll=<?php echo $row['Roll'];?>&name=<?php echo $row['Name'];?>">SEND A COMMENT TO THIS STUDENT</a></h5>
</form>
						<?php
					}
				}
					?>
						
				

			</div>
		</center>




	<?php include('templates/footer.php');?>

</body>

</html>