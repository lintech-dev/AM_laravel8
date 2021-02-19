<?php
date_default_timezone_set("Asia/Kolkata");
//include('connect-string.php');
include('conn.php');

//$date = date('y-m-d-h:i:sa');

$date = date('y-m-d');

//$csvfile = "Auditlog_$date.csv";
//$fp = file("Auditlog_$date.csv");

$csvfile = "Company-11.csv";
$fp = file("Company-11.csv");

$count_csv_rows = count($fp);
echo"$count_csv_rows<br>";
$file = fopen("$csvfile","r");
fgetcsv($file);
for($i=1;$i<=$count_csv_rows;$i++)
{
    $column = fgetcsv($file);
    $c0 = $column[0];
    
    $c1="Medium";
    
    
    echo"1 $c0, $c1 ,$c2--$id, $c3, $c4,$c5, $c6, $c7<br>";
    
    
    
       $quinsert = $conn->prepare("INSERT INTO company_info(`comp_name`,`priority`) VALUES(:c0,:c1)");
     $quinsert->bindParam(':c0', $c0);
	 $quinsert->bindParam(':c0', $c1);
     $quinsert->execute();
     
    
}
fclose($file);


?>
