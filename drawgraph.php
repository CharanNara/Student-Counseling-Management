<?php 
//index.php
include 'templates/db_connect.php';

$query = "SELECT * FROM academic_performance WHERE sturoll='17H61A05F4'";
$result = mysqli_query($conn, $query);



$dataPoints1 = array();

// Loop through results
while ($row = mysqli_fetch_array($result)) { 
    // Add a new array for each iteration
    $dataPoints1[] = array("label" => $row['semester'], 
                   "y" => $row['marks']);
}
$query2 = "SELECT * FROM academic_performance WHERE sturoll='17H61A05F4'";
$result2 = mysqli_query($conn, $query2);
$dataPoints2 = array();

// Loop through results
while ($row2 = mysqli_fetch_array($result2)) { 
    // Add a new array for each iteration
    $dataPoints2[] = array("label" => $row2['semester'],
                   "y" => 30);
}

  
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Performance Graph of Student in Mid-term examinations."
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
<body>
<div id="chartContainer" style="height: 370px; width: 50%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 