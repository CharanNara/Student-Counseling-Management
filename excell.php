<?php
$headings='';
$conn = mysqli_connect('localhost','charan','test1234','counselling_db');
require_once('vendor/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('vendor/spreadsheet-reader-master/SpreadsheetReader.php');
//require_once('vendor/spreadsheet-reader-master/SpreadsheetReader_XLSX.php');
//require_once dirname(__FILE__).'Includes/Classes/PHPExcel/IOFactory.php';
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
   

        //$fileNameNew =uniqid('',true).".".$fileActualExt;
                    $fileDestination='uploads/'.$fileName;
                    move_uploaded_file($fileTempName, $fileDestination);
                    print_r($fileDestination);
        
        $Reader = new SpreadsheetReader($fileDestination);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
             $j=0;$k=0;
            foreach ($Reader as $Row)
            {
          
                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }

                
                $roll = "";
                if(isset($Row[1])) {
                    $roll = mysqli_real_escape_string($conn,$Row[1]);
                }
                $dept = "";
                if(isset($Row[2])) {
                    $dept = mysqli_real_escape_string($conn,$Row[2]);
                }
                $year = "";
                if(isset($Row[3])) {
                    $year = mysqli_real_escape_string($conn,$Row[3]);
                }
                //echo $name." ".$roll." ".$dept;
                if($k==0){
                    $headings=array($name,$roll,$dept,$year);
                   // echo 'ooooooo'.$headings[0].'mmmmmmmmmmmmmmm';
                    $k++;
                }
              //  $sqls="SELECT max(Roll) FROM excell_db";
            //$ress=mysqli_query($conn,$sqls);
            //echo $ress['Roll'];
                if($name!='Name'){
                if (!empty($name) || !empty($roll) || !empty($dept)|| !empty($year)) {
                    
                         if($j>0){
                    $query = "insert into excell_db(Name,Roll,Dept,styear) values('".$name."','".$roll."','".$dept."','".$year."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
                $j++;
                }
            }
            else
            {
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
if(isset($_POST['delet'])){
     $query = "TRUNCATE TABLE excell_db";
                    $result = mysqli_query($conn, $query);
                    echo 'success';
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Sampleee</title>
</head>
<body>
<h2>Import Excel File into MySQL Database </h2>
    
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
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>

    <?php
    $sqlSelect = "SELECT * FROM excell_db";

    $result = mysqli_query($conn, $sqlSelect);
$yrJoin='2017';
$yr=date("Y")-$yrJoin;
echo $yr;
if($yr=='1')
    echo '1st year';
else if($yr=='2')
    echo '2nd year';
else if($yr=='3')
    echo '3rd year';
else if($yr=='4')
    echo '4th year';
 
if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th><?php echo $headings[1];?></th>
                <th><?php echo $headings[2];?></th>
                <th><?php echo $headings[3];?></th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['Name']; ?></td>
            <td><?php  echo $row['Roll']; ?></td>
            <td><?php  echo $row['Dept']; ?></td>
            <td><?php  echo $row['styear']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>
</body>
</html>