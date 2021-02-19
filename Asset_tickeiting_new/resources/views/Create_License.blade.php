
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Create Licence</h4>



<form name='form1' action='back-licence-upload' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">
<table class="table">
<tr>{{ csrf_field() }}</tr>
<tr>
<td>Softwate Name</td><td>
<input type='text' id="tag" name='software_name' class='form-control'/>
</td><td></td>
</tr>

<tr>
<td>Category Name</td><td>

<select name="cname" class='form-control'>
<option value="">--Select--</option>
@foreach($cat as $value)
 <option value="{{ $value->Category_name }}">{{ $value->Category_name }}</option>
  @endforeach
</select>
</td><td></td>
</tr>

<tr>
<td>Product Key</td><td>
<textarea rows="4" cols="50" name="productkey" class='form-control'></textarea>

</td><td></td>
</tr>


<tr>
<td>seats</td><td>
<input type='text' id="tag" name='seats' class='form-control' />

</td><td></td>
</tr>


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
<td>Manufacturer</td><td>

<select name="manufacturer" class='form-control'>
<option value="">--Select--</option>
@foreach($man as $value)
 <option value="{{ $value->Manufacture_name }}">{{ $value->Manufacture_name }}</option>
  @endforeach
</select>
</td><td></td>
</tr>


<tr>
<td>Licensed to Email</td><td>

<input type='text' id="tag" name='lemail' class='form-control'/>
</td><td></td>
</tr>


<tr>
<td>Reassignable</td><td>

<input type='checkbox' name='reassi'/>
</td><td></td>
</tr>


<tr>
<td>Supplier</td><td>
<select name="supplier" class='form-control'>
<option value="">--Select--</option>
<option value="Supplier 1">Supplier 1</option>
<option value="Supplier 2">Supplier 2</option>
<option value="Supplier 3">Supplier 3</option>
</select>
</td><td></td>
</tr>


<tr>
<td>Order Number</td><td>
<input type='text' id="tag" name='ordernumber' class='form-control'/>

</td><td></td>
</tr>



<tr>
<td>Purchase Cost</td><td>

<input type='text' id="tag" name='pcost' class='form-control'/>
</td><td></td>
</tr>


<tr>
<td>Purchase Date</td><td>

<input type='text' id="datepicker" name='pdate' class='form-control'/>
</td><td></td>
</tr>


<tr>
<td>Expiration Date</td><td>

<input type='text' id="datepicker1" name='edate' class='form-control'/>
</td><td></td>
</tr>



<tr>
<td>Termination Date</td><td>
<input type='text' id="datepicker2" name='tdate' class='form-control'/>

</td><td></td>
</tr>


<tr>
<td>Purchase Order Number</td><td>

<input type='text' id="tag" name='pordernumber' class='form-control'/>
</td><td></td>
</tr>


<tr>
<td>Depreciation</td><td>
<select name="deprication" class='form-control'>
<option value="">--Select--</option>
<option value="Depreciation 1">Depreciation 1</option>
<option value="Depreciation 2">Depreciation 2</option>
<option value="Depreciation 3">Depreciation 3</option>
</select>
</td><td></td>
</tr>


<tr>
<td></td><td>


</td><td></td>
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
   <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
      showOn: "button",
      dateFormat: 'yy-mm-dd',
      buttonImage: "img/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker2" ).datepicker({
      showOn: "button",
      dateFormat: 'yy-mm-dd',
      buttonImage: "img/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker3" ).datepicker({
      showOn: "button",
      dateFormat: 'yy-mm-dd',
      buttonImage: "img/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  } );
  </script>



              @include('footer');