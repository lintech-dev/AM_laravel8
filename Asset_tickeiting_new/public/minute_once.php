
<?php 
include('conn.php');
date_default_timezone_set ("Asia/Calcutta");
$pr_day = date('Y-m-d H:i:s');
$pr_date = date('Y-m-d');
$pr_time = date('H:i:s');
$start_time = "00:00:01";
//$end_time = "23:59:59";
$end_time = "71:59:59";


$sql1 = "SELECT count(*) FROM holidays where holiday_date='$pr_date'";
$result1 = $conn->prepare($sql1);
$result1->execute();
$num = $result1->fetchColumn();

function sum_the_time($time1, $time2) 
{
  $times = array($time1, $time2);
  $seconds = 0;
  foreach ($times as $time)
  {
    list($hour,$minute,$second) = explode(':', $time);
    $seconds += $hour*3600;
    $seconds += $minute*60;
    $seconds += $second;
  }
  $hours = floor($seconds/3600);
  $seconds -= $hours*3600;
  $minutes  = floor($seconds/60);
  $seconds -= $minutes*60;
  return "{$hours}:{$minutes}:{$seconds}";
}

//substract
function sub_the_time($time1, $time2,$time3,$time4) {
  $times = array($time1, $time2);
  $seconds = 0;
  foreach ($times as $time)
  {
    list($hour,$minute,$second) = explode(':', $time);
    $seconds += $hour*3600;
    $seconds += $minute*60;
    $seconds += $second;
  }
  $timex = array($time3, $time4);
  foreach ($timex as $time10)
  {
    list($hour,$minute,$second) = explode(':', $time10);
    $seconds -= $hour*3600;
    $seconds -= $minute*60;
    $seconds -= $second;
  }
  
  $hours = floor($seconds/3600);
  $seconds -= $hours*3600;
  $minutes  = floor($seconds/60);
  $seconds -= $minutes*60;
  return "{$hours}:{$minutes}:{$seconds}";
}

//function for date
 function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }
 
    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }
 
    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();
 
    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Set default diff to 0
      $diffs[$interval] = 0;
      // Create temp time from time1 and interval
      $ttime = strtotime("+1 " . $interval, $time1);
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
        $time1 = $ttime;
        $diffs[$interval]++;
        // Create new temp time from time1 and interval
        $ttime = strtotime("+1 " . $interval, $time1);
      }
    }
 
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
        break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
        // Add s if value is not 1
        if ($value != 1) {
          $interval .= "s";
        }
        // Add value and interval to times array
        $times[] = $value;
        $count++;
      }
    }
 
    // Return string with times
    return implode(":", $times);
  }

  
  
  
  
//present day is not a holiday
if($num < 1)
{

//Works within Start time and end time
   if(($pr_time > $start_time) && ($pr_time < $end_time)) //working hours
   {
    
    
    //IT
    
       $query2="select * from tickets where status='pending' order by ticket_id desc";
       $stmt2 = $conn->query($query2);
       while($row2 = $stmt2->fetch())
       {
    
           
           $call_id = $row2['ticket_id'];
           $time_taken8 = $row2['time_taken'];
           $sla5 = $row2['sla'];
           $level= $row2['level'];
   
        if($time_taken8=="")
     {
     $time_taken8 = "00:00:00";
     }
     elseif ($time_taken8=="0:0:0")
     {
     $time_taken8 = "00:00:00";
     }
     $ti = explode(":",$time_taken8);
     $a = $ti[0];
     $b = $ti[1];
     $c = $ti[2];
     echo " ".$a.":".$b.":".$c;
     if(strlen($a)==1)
     {
     $a = "0".$a;
     }
     if(strlen($b)==1)
     {
     $b = "0".$b;
     }
     if(strlen($c)==1)
     {
     $c = "0".$c;
     }
     $time = $a.":".$b.":".$c;
     $xx = "00:00:00";
     $yy = "00:00:00";
     $zz = "00:01:00";
     $t = sum_the_time($time,$zz);
    echo $t;
    
     $lev = "level1";
     $query3 = "update tickets set time_taken=?,level=? where ticket_id = '$call_id'";
     $stmt3 = $conn->prepare($query3);
     $stmt3->execute(array($t,$lev));
     
     
     if(($time_taken8=='1:0:0') && ($level=='level1'))
     {
     	//escalate to level 2
         $query4="select * from tickets where ticket_id ='$call_id'";
         $stmt4 = $conn->query($query4);
         while($row4 = $stmt4->fetch())
         {
     	    /* $callid_id = $row4['ticket_id'];
     	    $created_by = $row4['created_by'];
     	    $created_date = $row4['created_date'];
     		$category = $row4['category'];
     		$sub_category = $row4['sub_category'];
     		$remarks = $row4['remarks'];
     		$status = $row4['status'];
     		$time_taken = $row4['time_taken'];
     		$segment = $row4['segment']; */
     		
             $callid_id = $row4['ticket_id'];
             $cname = $row4['cname'];
             $mobile = $row4['mobile'];
             $email = $row4['email'];
             $segment = $row4['segment'];
             $company_name = $row4['company_name'];
             $region = $row4['region'];
             $location = $row4['location'];
             $issue_cat = $row4['issue_cat'];
             $t_type = $row4['t_type'];
             $remarks = $row4['remarks'];
             
             $ticket_id = $row4['ticket_id'];
             $created_date = $row4['created_date'];
             $status = $row4['status'];
             $closed_date = $row4['closed_date'];
             $time_taken = $row4['time_taken'];
             $sla = $row4['sla'];
             $level = $row4['level'];
             $solution = $row4['solution'];
             $assign_to = $row4['assign_to'];
             $closed_by = $row4['closed_by'];
             $path = $row4['path'];
             $upath = $row4['upath'];
             $update_date = $row4['update_date'];
             $update_by = $row4['update_by'];
             
     		
     		/* $ = $row4[''];
     		$ = $row4[''];
     		$ = $row4['']; */


		/* $query6="select name from users where empid='$created_by'";
     		$stmt6 = $conn->query($query6);
     		while($row6 = $stmt6->fetch())
     		{
     		    $created_by_name = $row6['name'];
     		} */

     		 
     		//$query5="select email from empdirectory where role='IT Admin,User'";
		/* if($category == 'IT')
                 {
                 $query5 = "select email from empdirectory where `department`='Information Technology' AND role like '%IT%'";
                }
                elseif($category == 'SAP')
                { */
                $query5 = "select email from users where `segment_name`='$segment'";
		//}
     		$stmt5 = $conn->query($query5);
     		while($row5 = $stmt5->fetch())
     		{
     		    $to_email = $row5['email'];
     		    
     		    $message = "<html><body><p>Dear Team,</p><p align='left'> Below ticket has been escalated from level1 to level2. Please find the below details of the ticket</p>";
     		    $message .= "<html><body><table border='1px'>";
     		    $message .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
     		    $message .= "<tr><td><b>Created Date & Time</b></td><td>$created_date</td></tr>";
     		    $message .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
     		    $message .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
     		    $message .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
     		    $message .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
     		    $message .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
     		    $message .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
     		    $message .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
     		    $message .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
     		    $message .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
     		    $message .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
     		    $message .= "</table>";
     		    $message .= "<br /><br /><p align='left'>Regards<br></p>";
     		    $message .="<p align='justify'>This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. If you are not the intended recipient you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited</p></body></html>";
     		    
     		    $headers = 'MIME-Version: 1.0' . "\r\n";
     		    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
     		    $headers .= 'From: ';
     		    $subject ="IT Ticket";
     		    //mail($to_email, $subject, $message, $headers);
     		}
     	
     		
     			
     	}
     	
     	$leve2_update = "level2";
     	$query6 = "update tickets set level=? where ticket_id = '$call_id'";
     	$stmt6 = $conn->prepare($query6);
     	$stmt6->execute(array($leve2_update));
     	
     	echo"escalate to level 2";
     	//escalate to level 2
     }
     
    }
    
      
   }
}
   ?>


