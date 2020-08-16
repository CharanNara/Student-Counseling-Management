<?php 
//index.php
include 'templates/db_connect.php';
session_start();
if(!isset($_SESSION['hodEmail']))
{
    header("Location: hod-log.php");
}
$dataPoints1 = array();
$dataPoints2 = array();
//I SEMESTER
$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='I Year' and semester='I-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
$c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='I Year' and semester='I-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}
  
//II-SEMESTER
$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='I Year' and semester='II-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
$c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='I Year' and semester='II-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}

//III SEMESTER

$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='II Year' and semester='I-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
$c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='II Year' and semester='I-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}

//IV-SEMESTER 

$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='II Year' and semester='II-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
$c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='II Year' and semester='II-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}

//V SEMESTER
$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='III Year' and semester='I-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
$c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='III Year' and semester='I-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}

//VI SEMESTER

$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='III Year' and semester='II-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
 $c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='III Year' and semester='II-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}

//VII SEMESTER

$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='IV Year' and semester='I-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
$c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='IV Year' and semester='I-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}

//VIII SEMESTER

$query = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid1' and styear='IV Year' and semester='II-Semester'";
$result = mysqli_query($conn, $query);

// Loop through results
if($result){
  $c=0;
while ($row = mysqli_fetch_array($result)) { 
$c++;
if($row['subject']=='TOTAL'){
  $sem=$row['styear']." ".$row['semester'];
    // Add a new array for each iteration
  $c--;
  $mr=$row['marks']/$c;
    $dataPoints1[] = array("label" => $sem, 
                   "y" => $mr);
}
}
}

$query2 = "SELECT * FROM academic_performance WHERE sturoll='".$_GET['rollno']."' and examtype='mid2' and styear='IV Year' and semester='II-Semester'";
$result2 = mysqli_query($conn, $query2);
if($result2){
  $c=0;
// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
  $c++;
if($row2['subject']=='TOTAL'){
  $sem2=$row2['styear']." ".$row2['semester'];
    // Add a new array for each iteration
  $c--;
  $mr2=$row2['marks']/$c;
    $dataPoints2[] = array("label" => $sem2, 
                   "y" => $mr2);
}
}
}
?>
<!DOCTYPE HTML>
<html>
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
  <title>HOD Page</title>

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
  <?php 
$s="SELECT * FROM student_detail WHERE Roll='".$_GET['rollno']."' ";
$re=mysqli_query($conn,$s);
$ro=mysqli_fetch_array($re);
  ?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Performance Graph of  <?php echo $ro['Name'];?>  in Mid-term examinations."
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "Mid1",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "Mid2",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
 
}
</script>
</head>
<body><br /><br /><br /><br /><br /><br />
  <center>
<div id="chartContainer" style="height: 370px; width: 50%;"></div>
<br><br>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</center>
</body>
</html> 