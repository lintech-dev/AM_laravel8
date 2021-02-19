@include('header_public');  
<?php 
include 'conn.php';
?>
<script type="text/javascript" language="javascript" src="{{ URL::asset('Autosearch/jquery-1.9.1.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ URL::asset('Autosearch/jquery-ui.min.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ URL::asset('Autosearch/jquery-ui.min.css') }}">

<script type="text/javascript">
var jq = $.noConflict();
jq(function(){


jq(".auto2").autocomplete({
	source: "Company_Name.php",
	minLength: 3
	});



});
</script>


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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Create New Ticket</h4>   
              
              
              
              
              <form action="{{ URL::asset('crate_tic') }}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token"   value="{{ csrf_token() }}">
                   <table class="table">
		<tbody>
		
		<tr><td>Customer Name</td>
           <td  colspan="3">
           <input type="text" name="cname" class="form-control">
           </td>
           <tr>
        
        <tr><td><span style="color:red">*</span>Mobile Number</td>
           <td  colspan="3">
           <input type="text" name="mobile" class="form-control" required>
           </td>
           <tr>
        
        <tr><td><span style="color:red">*</span>Email-ID</td>
           <td  colspan="3">
           <input type="email" name="email" class="form-control">
           </td>
           <tr>
        
        <tr><td>Company Name</td>
           <td  colspan="3">
           <input type="text" name="company_name" class="form-control auto2">
           </td>
           <tr>
           
        <tr><td>Segment</td>
           <td  colspan="3">
           <select name="segment" class="form-control">
           <option select="">--Select--</option>
           <?php 
           $query = "SELECT * from segment_info";
           $stmt = $conn->query($query);
           while($row = $stmt->fetch())
           {
               $seg_name = $row['seg_name'];
               echo"<option select='$seg_name'>$seg_name</option>";
           }
           ?>
           </select>
           </td>
           <tr>
        
        
        
        <tr><td>Region</td>
           <td  colspan="3">
           <select name="region" class="form-control">
           <option select="">--Select--</option>
           <?php 
           $query1 = "SELECT * from region_info";
           $stmt1 = $conn->query($query1);
           while($row1 = $stmt1->fetch())
           {
               $region_name = $row1['region_name'];
               echo"<option select='$region_name'>$region_name</option>";
           }
           ?>
           </select>
           </td>
           </tr>
        
        <tr><td>Location</td>
           <td  colspan="3">
           <select name="location" class="form-control">
           <option select="">--Select--</option>
           <?php 
           $query2 = "SELECT * from location_info";
           $stmt2 = $conn->query($query2);
           while($row2 = $stmt2->fetch())
           {
               $location_name = $row2['location_name'];
               echo"<option select='$location_name'>$location_name</option>";
           }
           ?>
           </select>
           </td>
           </tr>
           
           <tr><td>Issue Category</td>
           <td  colspan="3">
           <select name="issue_cat" class="form-control">
           <option select="">--Select--</option>
           <?php 
           $query3 = "SELECT * from issuecategory_info";
           $stmt3 = $conn->query($query3);
           while($row3 = $stmt3->fetch())
           {
               $issuecat_name = $row3['issuecat_name'];
               echo"<option select='$issuecat_name'>$issuecat_name</option>";
           }
           ?>
           </select>
           </td>
           </tr>
           <tr><td>Ticket Type</td>
           <td  colspan="3">
           <select name="t_type" class="form-control">
           <option select="">--Select--</option>
           <?php 
           $query4 = "SELECT * from ticket_type_info";
           $stmt4 = $conn->query($query4);
           while($row4 = $stmt4->fetch())
           {
               $ticket_typename = $row4['ticket_typename'];
               echo"<option select='$ticket_typename'>$ticket_typename</option>";
           }
           ?>
           </select>
           </td>
           </tr>
           <tr><td>Upload</td>
           <td  colspan="3"><input type="file" name="userfile[]" id = 'fileUpload'  class='form-control' /></td>
           </tr>   
		   <tr><td>Description</td>
           <td  colspan="3"><textarea rows="4" cols="60" name="remarks" class='form-control' ></textarea></td>
           </tr>
           
           
           
</tbody></table>

<br>
 <input type="submit" value="Submit" class="btn btn-theme">
    </form>

</div>
</div>
</div></section></section>   
   
   @include('footer');
