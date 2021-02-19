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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Create Accessory</h4>


<form name='form1' action='back-acessory-upload' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">
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
<td>Accessory Name</td><td><input type='text' id="tag" name='aname' class='form-control' /></td><td></td>
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
<td>Supplier</td><td>
<select name="Supplier" class='form-control'>
<option value="">--Select--</option>
 @foreach($sup as $value)
 <option value="{{ $value->Supplier_name }}">{{ $value->Supplier_name }}</option>
  @endforeach
</select>
</td><td></td>

</tr>

<tr>
<td>Manufacturer</td><td>
<select name="Manufacturer" class='form-control'>
<option value="">--Select--</option>
<option value="Manufacture 1">Manufacture 1</option>
<option value="Manufacture 2">Manufacture 2</option>
<option value="Manufacture 3">Manufacture 3</option>
</select>
</td><td></td>
</tr>

<tr>
<td>Location</td><td>
<select name="location" class='form-control'>
<option value="">--Select--</option>
<option value="Bangalore">Bangalore</option>
</select>
</td><td></td>
</tr>

<tr>
<td>Model No</td><td><input type='text' id="tag" name='modelno' class='form-control'/></td><td></td>
</tr>


<tr>
<td>Order Number</td><td><input type='text' id="tag" name='ordernumber' class='form-control' /></td><td></td>
</tr>

<tr>
<td>Purchase Date</td><td><input type='text' id="tag" name='pdate' class='form-control'/></td><td></td>
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

              @include('footer');