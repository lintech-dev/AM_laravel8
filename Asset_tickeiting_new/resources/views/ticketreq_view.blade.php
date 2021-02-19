@include('layouts.app');

          <section id="main-content">
      <section class="wrapper">
        <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
        <!-- BASIC FORM ELELEMNTS -->
         @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif
         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Tickets</h4>
              
        <table class="table">

<tbody>

 <?php
 include 'conn.php';
 $user_segment = Auth::user()->segment_name;

 $idexp = explode("|", $id);
 
 $status_first = $idexp[0];
 $cn_first = $idexp[1];
 
echo"<tr><th> Ticket Id</th><th>Customer Name</th><th>Mobile Number</th><th>Email-ID</th><th>Date</th><th>Segment</th><th>Company Name</th><th>Time taken</th><th>View</th></tr>";

if($user_segment == "WIFI" || $user_segment == "NETWORK" || $user_segment == "FIRE WALL")
{
$query="Select * from  tickets where status='$status_first' AND company_name='$cn_first' AND segment='$user_segment'";
}
else
{
    $query="Select * from  tickets where status='$status_first' AND company_name='$cn_first'";
}
$stmt= $conn->query($query);
    while($row = $stmt->fetch())
    {
        $cname = $row['cname'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $segment = $row['segment'];
        $company_name = $row['company_name'];
        $region = $row['region'];
        $location = $row['location'];
        $issue_cat = $row['issue_cat'];
        $t_type = $row['t_type'];
        $remarks = $row['remarks'];
        
        $ticket_id = $row['ticket_id'];
        $created_date = $row['created_date'];
        $status = $row['status'];
        $closed_date = $row['closed_date'];
        $time_taken = $row['time_taken'];
        $sla = $row['sla'];
        $level = $row['level'];
        $solution = $row['solution'];
        $assign_to = $row['assign_to'];
        $closed_by = $row['closed_by'];
        $path = $row['path'];
        $upath = $row['upath'];
        $update_date = $row['update_date'];
        $update_by = $row['update_by'];

/* $query10="Select name,department from empdirectory where empid='$created_by'";
$stmt10= $conn->query($query10);
    while($row10 = $stmt10->fetch())
    {
        $name = $row10['name'];
        $department = $row10['department'];
    }

$query11="Select name,department from empdirectory_gss where empid='$created_by'";
$stmt11= $conn->query($query11);
    while($row11 = $stmt11->fetch())
    {
        $name11 = $row11['name'];
        $department11 = $row11['department'];
    } */


        echo"<tr><td>$ticket_id</td><td>$cname</td><td>$mobile</td><td>$email</td><td>$created_date</td><td>$segment</td><td>$company_name</td>";
echo"<td>$time_taken</td>";

if($status != 'close')
{
        ?>
        <td><a href='{{ URL::asset("ticket_full_view/$ticket_id") }}'><?php //echo"$status"; ?>view</a></td></tr>
        <?php
}
else
{
?>

<td><a href='{{ URL::asset("ticket_full_view_colse_c/$ticket_id") }}'>view</a></td></tr>
<?php
}


 
    } 
 ?>
                </tbody></table>           
              
            
    
    <link rel="stylesheet" href="{{ URL::asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/resources/demos/style.css') }}">
  <script src="{{ URL::asset('https://code.jquery.com/jquery-1.12.4.js') }}"></script>
  <script src="{{ URL::asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
  		dateFormat: "yy-mm-dd",    
		showOn:"button",
		buttonImage:"img/calendar.gif",
		yearRange: "-10:+2",
		buttonImageOnly:true,
		changeMonth: true,
        changeYear: true
  });
  });
  </script>

  </div>
          </div>
          <!-- col-lg-12-->
        </div>
    
     
      
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
   
   
   @include('footer');
