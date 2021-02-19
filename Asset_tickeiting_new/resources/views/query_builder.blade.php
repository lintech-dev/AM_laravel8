@include('layouts.app')
<?php
 include 'conn.php';
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Query Builder</h4>
  
  
  
  <form name='form1' action='query_builder_submit' method='post' enctype="multipart/form-data">
<table class="table">
<tr>{{ csrf_field() }}</tr>
<tr>
<td>From Date</td>
<td><input type='text' id="datepicker1" name='fdate' class='form-control'/></td>
<td>To Date</td>
<td><input type='text' id="datepicker2" name='todate' class='form-control'/></td>
</tr>

<tr>
<td>Model No</td><td>
<select name="model" class='form-control'>
<option value="">--Select--</option>
@foreach($model as $value)
 <option value="{{ $value->Model_name }}">{{ $value->Model_name }}</option>
  @endforeach
</select>
</td>
<td>Serial No</td> 
<td>
<select name="serialno" class='form-control'>
<option value="">--Select--</option>
<?php
$query="Select * from assets";
    $stmt= $conn->query($query);
    while($row = $stmt->fetch())
    {
        $serial=$row['serial'];
		echo"<option value='$serial'>$serial</option>";
	}
	?>
</select>
</td>
</tr>
<tr>
<td>Order Number</td>
<td>
<select name="order_number" class='form-control'>
<option value="">--Select--</option>
<?php
$query1="Select * from assets";
    $stmt1= $conn->query($query1);
    while($row1 = $stmt1->fetch())
    {
        $Order_no=$row1['Order_no'];
		echo"<option value='$Order_no'>$Order_no</option>";
	}
	?>
</select>
</td>
<td>Default Location</td>
<td>
<select name="dlocation" class='form-control'>
<option value="">--Select--</option>
@foreach($dloccc as $value)
 <option value="{{ $value->location }}">{{ $value->location }}</option>
  @endforeach
</select>
</td>
</tr>

<tr>
<td>Asset Name</td><td>
<select name="assetname" class='form-control'>
<option value="">--Select--</option>
<?php
$query2="Select * from assets";
    $stmt2= $conn->query($query2);
    while($row2 = $stmt2->fetch())
    {
        $Asset_name=$row2['Asset_name'];
		echo"<option value='$Asset_name'>$Asset_name</option>";
	}
	?>
</select>
</td>
<td>Status</td><td>
<select name="status" class='form-control'>
<option value="">--Select--</option>
@foreach($status as $value1)
 <option value="{{ $value1->Status_name }}">{{ $value1->Status_name }}</option>
  @endforeach
</select>
</td>
</tr>



</table>
<br>
               <center><input style="center" type="submit" value="Submit" class="btn btn-theme"></center>  
  </form>
  
</div></div></div>
              </section></section>


<link rel="stylesheet" href="{{ URL::asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/resources/demos/style.css') }}">
  <script src="{{ URL::asset('https://code.jquery.com/jquery-1.12.4.js') }}"></script>
  <script src="{{ URL::asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
  <script>
  var j = jQuery.noConflict();
  j( function() {
    j( "#datepicker1" ).datepicker({
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
  <script>
  var j = jQuery.noConflict();
  j( function() {
    j( "#datepicker2" ).datepicker({
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
   
  
  @include('footer');
