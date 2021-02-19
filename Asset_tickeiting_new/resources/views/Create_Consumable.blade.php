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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Create Consumable</h4>



<form name='form1' action='back-counsmable-upload' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">
<table class="table">
<tr>{{ csrf_field() }}</tr>
<tr>
<td>Company</td><td>
<select name="company" class='form-control'>
<option value="">--Select--</option>
<option value="Company 1">Company 1</option>
<option value="Company 2">Company 2</option>
<option value="Company 3">Company 3</option>
</select>
</td><td></td>
</tr>


<tr>
<td>Consumable Name</td><td>
<select name="cons_name" class='form-control'>
<option value="">--Select--</option>
<option value="Consumable Name 1">Consumable Name 1</option>
<option value="Consumable Name 2">Consumable Name 2</option>
<option value="Consumable Name 3">Consumable Name 3</option>
</select>
</td><td></td>
</tr>


<tr>
<td>Category</td><td>
<select name="category" class='form-control'>
<option value="">--Select--</option>
@foreach($cat as $value)
 <option value="{{ $value->Category_name }}">{{ $value->Category_name }}</option>
  @endforeach
</select>
</td><td></td>
</tr>


<tr>
<td>Manufacturer</td><td>
<select name="Manufacturer" class='form-control'>
<option value="">--Select--</option>
@foreach($man as $value)
 <option value="{{ $value->Manufacture_name }}">{{ $value->Manufacture_name }}</option>
  @endforeach
</select>
</td><td></td>
</tr>


<tr>
<td>Location</td><td>
<select name="location" class='form-control'>
<option value="">--Select--</option>
<option value="Banglore">Banglore</option>
</select>
</td><td></td>
</tr>



<tr>
<td>Model No</td><td><input type='text' id="tag" name='modelnumber' class='form-control'/></td><td></td>
</tr>


<tr>
<td>Item No</td><td><input type='text' id="tag" name='itemnumber' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Order Number</td><td><input type='text' id="tag" name='ordernumber' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Purchase Date</td><td><input type='text' id="datepicker" name='pdate' class='form-control'/></td><td></td>
</tr>


<tr>
<td>Purchase Cost</td><td><input type='text' id="tag" name='pcost' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Quantity</td><td><input type='text' id="tag" name='quantity' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Min. Quantity</td><td>
<input type='text' id="tag" name='minquantity' class='form-control'/>
</td><td></td>
</tr>

<tr>
<td>Upload </td><td><input type='file' name='userfile' class='form-control'/></td><td></td>
</tr>

</table>
<center><input style="center" type="submit" value="Submit" class="btn btn-theme"></center>
</form>



</div></div></div>
              </section></section>
              


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      showOn: "button",
      dateFormat: 'yy-mm-dd',
      buttonImage: "img/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  } );
  </script>

@include('footer')
