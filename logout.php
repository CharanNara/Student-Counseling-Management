<?php
session_start();
if(isset($_GET['whom']))
{
if($_GET['whom']=='director')
{
 if(isset($_SESSION['dirEmail']))
        unset($_SESSION['dirEmail']);

        header("Location: index.php");  
}
elseif($_GET['whom']=='hod')
{
	if(isset($_SESSION['hodEmail']))
		unset($_SESSION['hodEmail']);
 if(isset($_SESSION['hbranch']))
		unset($_SESSION['hbranch']);
    	header("Location: index.php");
}
elseif($_GET['whom']=='faculty')
{
	if(isset($_SESSION['fuser']))
		unset($_SESSION['fuser']);
    	header("Location: index.php");
}
elseif($_GET['whom']=='student')
{
        if(isset($_SESSION['student']))
        unset($_SESSION['student']);
    	header("Location: index.php");
}
}


?>