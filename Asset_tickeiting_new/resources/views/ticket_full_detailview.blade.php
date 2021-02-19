<?php
//echo"$id";

include 'conn.php';

$query = "SELECT * from tickets where ticket_id='$id'";
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

@include('layouts.app');  



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
              
              
              <form action="{{ URL::asset('upd_tic') }}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token"   value="{{ csrf_token() }}">
              
              <input type="hidden" name="ticket_id"   value="<?php echo"$ticket_id";?>">
        
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
           <?php //echo"$path"; ?>
           <a href="{!! URL::asset("tickets_attachment/$path") !!}" target="_blank">View</a>
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
           
           <tr><td>Time Taken</td>
           <td  colspan="3">
           <?php echo"$time_taken"; ?>
           </td>
           </tr>
           
           
           <tr><td>Assigned To</td>
           <td  colspan="3">
           <select name="assign_to" class='form-control'>
           <?php 
           if($status == "open")
           {
               echo"<option value='$assign_to'>$assign_to</option>";
           }
           else
           {
           ?>
           <option value="">--Select--</option>
           <?php
           }
           $query1 = "SELECT * from users";
           $stmt1 = $conn->query($query1);
           while($row1 = $stmt1->fetch())
           {
               $assign_email = $row1['email'];
           
               echo"<option value='$assign_email'>$assign_email</option>";
           }
           
           ?>
           
           
           </select>
           </td>
           </tr>
           <tr><td>Attachment</td>
           <td  colspan="3">
           <input type="file" name="userfile[]" id = 'fileUpload'  class='form-control' />
           </td>
           </tr>
           
           <tr><td>Solution</td>
           <td  colspan="3">
           <?php 
           if($status == "open")
           {
           echo"<textarea rows='4' cols='60' name='solution' class='form-control' >";
           
           $solution_sp_up = explode("|",$solution);
           echo "$solution_sp_up[1]\n\n$solution_sp_up[2]\n\n$solution_sp_up[3]\n\n$solution_sp_up[4]\n\n$solution_sp_up[5]\n\n$solution_sp_up[6]\n\n$solution_sp_up[7]\n\n$solution_sp_up[8]";
           echo"</textarea>";
           }
           else 
           {
               ?>
           <textarea rows="4" cols="60" name="solution" class='form-control' ></textarea>
           <?php 
           }
           ?>
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
 
 <input type="submit" value="Close" name="Close" class="btn btn-theme">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="submit" value="Update" name="Update" class="btn btn-theme">
</form>
</div>
</div>
</div></section></section>   
   
   @include('footer');
