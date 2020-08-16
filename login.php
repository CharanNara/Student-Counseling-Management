<?php
session_start();
if(isset($_GET['who']))
{
if($_GET['who']=='director')
{
    if(session_destroy())
    	header("Location: Director-log.php");
}
elseif($_GET['who']=='hod')
{
  if(session_destroy())
    	header("Location: hod-log.php");
}
elseif($_GET['who']=='staff')
{
  if(session_destroy())
    	header("Location: faculty-log.php");
}
elseif($_GET['who']=='student')
{
  if(session_destroy())
    	header("Location: student-log.php");
}
}
?>