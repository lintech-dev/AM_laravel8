@include('layouts.app')

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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Add Asset</h4>
  
  
  
  <form name='form1' action='back-asset-upload' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">
<table class="table">
<tr>{{ csrf_field() }}</tr>
<tr>
<td>Asset Tag</td><td><input type='text' id="tag" name='atag' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Model</td><td>
<select name="model" class='form-control'>
<option value="">--Select--</option>
@foreach($model as $value)
 <option value="{{ $value->Model_name }}">{{ $value->Model_name }}</option>
  @endforeach
</select>
</td><td><a href="#">New</a></td>
</tr>

<tr>
<td>Status</td><td>
<select name="status" class='form-control'>
<option value="">--Select--</option>
@foreach($status as $value1)
 <option value="{{ $value1->Status_name }}">{{ $value1->Status_name }}</option>
  @endforeach
</select>
</td><td><a href="#">New</a></td>
</tr>

<tr>
<td>Serial</td><td><input type='text' id="tag" name='serial' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Asset Name</td><td><input type='text' id="tag" name='assetname' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Purchase Date</td><td><input type='text' id="datepicker" name='purchase_date' class='form-control' /></td><td></td>
</tr>

<tr>
<td>Supplier</td><td>
<select name="supplier" class='form-control'>
<option value="">--Select--</option>
@foreach($supor as $value)
 <option value="{{ $value->Supplier_name }}">{{ $value->Supplier_name }}</option>
  @endforeach
<!-- <option value="Supplier 1">Supplier 1</option>
<option value="Supplier 2">Supplier 2</option>
<option value="Supplier 3">Supplier 3</option> -->
</select>
</td><td><a href="#">New</a></td>
</tr>

<tr>
<td>Order Number</td><td><input type='text' id="tag" name='order_number' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Purchase Cost</td><td><input type='text' id="tag" name='purchase_cost' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Warranty</td><td><input type='text' id="tag" name='warrenty' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Notes</td><td><input type='text' id="tag" name='notes' class='form-control' /></td><td></td>
</tr>

<tr>
<td>Default Location</td>
<td>
<select name="dlocation" class='form-control'>
<option value="">--Select--</option>
@foreach($dloccc as $value)
 <option value="{{ $value->location }}">{{ $value->location }}</option>
  @endforeach
</select>
</td>
<td><a href="#">New</a></td>
</tr>

<tr>
<td></td><td><input type="checkbox" name="requesttable" value="requesttable"> Requestable</td><td></td>
</tr>

<tr>
<td>Upload </td><td><input type='file' name='userfile' class='form-control' /></td><td></td>
</tr>

</table>
<br>
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
  
  @include('footer');
