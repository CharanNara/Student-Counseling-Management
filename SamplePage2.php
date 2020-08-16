<?php
include 'templates/db_connect.php';
$sql="INSERT INTO student_detail(Roll,Name) VALUES('17H61A05F4','CHARAN')";
$res2=mysqli_query($conn,$sql);
$sql2="SELECT * FROM student_detail WHERE Name='CHARAN'";
$res=mysqli_query($conn,$sql2);
$row=mysqli_fetch_array($res);
echo $row['Name'];
echo $row['contact'];
if(!$res2)
    echo "sorry";
else
    echo "thanks";
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<body style="background-color: #E0FFFF">
  <table border="2">
        <thead>
            <tr>
                
                <th>Subject</th>
                <th>Classes Attended</th>
            </tr>
        </thead>
   
</body>
</html>