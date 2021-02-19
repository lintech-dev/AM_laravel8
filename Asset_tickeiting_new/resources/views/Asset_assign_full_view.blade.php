@include('layouts.app')
<?php
/*SESSION_START();
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Kolkata");
$empid_first=$_SESSION['id']; */
?>

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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Total Asset Assigned</h4>

              <table class="table">
<tr style="background-color:#4ECDC4; color: #ffffff;">
<th style="text-align:left;"> ID </th>
<th style="text-align:left;"> Type </th>
<th style="text-align:left;"> Assign To </th>
<th style="text-align:left;"> Assign Date </th>
<th style="text-align:left;"> Quantity </th>
<th style="text-align:left;"> View/Update </th>

</tr>
<tr>{{ csrf_field() }}</tr>

<?php
include('conn.php');
$query = "select * from asset_assign";
$stmt = $conn->query($query);
while($row = $stmt->fetch())
{
    $assign_id = $row['assign_id'];
    $type = $row['type'];
    $assigned_to = $row['assigned_to'];
    $assigned_dt = $row['assigned_dt'];
    $quantity = $row['quantity'];
?>
<tr>
<input type="hidden" name="id" value="{{ $value->id }}">

<td style="text-align: left;"> <?php echo"$assign_id";?>  </td>
<td style="text-align: left;"> <?php echo"$type";?>  </td>
<td style="text-align: left;"> <?php echo"$assigned_to";?>  </td>
<td style="text-align: left;"> <?php echo"$assigned_dt";?>  </td>
<td style="text-align: left;"> <?php echo"$quantity";?>  </td>
<!-- <a href="{!! URL::asset("tickets_attachment/$path") !!}" target="_blank">View</a> -->
<td style="text-align: left;" ><a href="{!! URL::asset("Asset_assi/$assign_id") !!}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>

<!--  -->
</tr>
<?php
}
?>
</table>
</div></div></div>

              </section></section>
              
              @include('footer');
