<?php
//echo"$ticket_id,$mobile,$email";

include 'conn.php';

$query = "SELECT * from tickets where ticket_id='$ticket_id' AND mobile='$mobile' AND email='$email'";
$stmt = $conn->query($query);
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
    //$ = $row[''];
}
?>

@include('header_public');  



          <section id="main-content">
      <section class="wrapper">
        <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
        <!-- BASIC FORM ELELEMNTS -->
         @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif
         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Ticket Details</h4>   
              
              
              
              
        
                   <table class="table">
		<tbody>
		
		<tr><td>TIcket ID</td>
           <td  colspan="3">
           <?php echo"$ticket_id"; ?>
           </td>
           <tr>
           
           <tr><td>Created Date</td>
           <td  colspan="3">
           <?php echo"$created_date"; ?>
           </td>
           <tr>
		<tr><td>Customer Name</td>
           <td  colspan="3">
           <?php echo"$cname"; ?>
           </td>
           <tr>
        
        <tr><td>Mobile Number</td>
           <td  colspan="3">
           <?php echo"$mobile"; ?>
           </td>
           <tr>
        
        <tr><td>Email-ID</td>
           <td  colspan="3">
           <?php echo"$email"; ?>
           </td>
           <tr>
        
        <tr><td>Segment</td>
           <td  colspan="3">
           <?php echo"$segment"; ?>
           </td>
           <tr>
        
        <tr><td>Company Name</td>
           <td  colspan="3">
           <?php echo"$company_name"; ?>
           </td>
           <tr>
        
        <tr><td>Region</td>
           <td  colspan="3">
           <?php echo"$region"; ?>
           </td>
           </tr>
        
        <tr><td>Location</td>
           <td  colspan="3">
           <?php echo"$location"; ?>
           </td>
           </tr>
           
           <tr><td>Issue Category</td>
           <td  colspan="3">
           <?php echo"$issue_cat"; ?>
           </td>
           </tr>
           <tr><td>Ticket Type</td>
           <td  colspan="3">
           <?php echo"$t_type"; ?>
           </td>
           </tr>
           <tr><td>Upload</td>
           <td  colspan="3">
           <?php echo"$path"; ?>
           </td>
           </tr>   
		   <tr><td>Description</td>
           <td  colspan="3">
           <?php echo"$remarks"; ?>
           </td>
           </tr>
           
           <tr><td colspan="4"><hr></td></tr>
           
           <tr><td>Status</td>
           <td  colspan="3">
           <?php echo"$status"; ?>
           </td>
           </tr>
           
           <tr><td>Attachment</td>
           <td  colspan="3">
           <?php echo"$upath"; ?>
           </td>
           </tr>
           
           <tr><td>Solution</td>
           <td  colspan="3">
           <?php echo"$solution"; ?>
           </td>
           </tr>
           
           <!-- <tr><td></td>
           <td  colspan="3">
           <?php echo"$"; ?>
           </td>
           </tr>
           
           <tr><td></td>
           <td  colspan="3">
           <?php echo"$"; ?>
           </td>
           </tr> -->
           
                      
</tbody></table>

<br>
 

</div>
</div>
</div></section></section>   
   
   @include('footer');
