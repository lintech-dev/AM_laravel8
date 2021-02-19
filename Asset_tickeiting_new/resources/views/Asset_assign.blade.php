@include('layouts.app')
<?php
/*SESSION_START();
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Kolkata");
$empid_first=$_SESSION['id']; */
?>

<script src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
<script>
        $(document).ready(function (){
            $("#nrequ1").change(function() {
                
                if ($(this).val() == "Asset") {
                        $("#atag1").show();
                        $("#licence").hide();
                        $("#access1").hide();
                        $("#access2").hide();
                        $("#access3").hide();
                        $("#consum1").hide();
                        $("#consum2").hide();
                        $("#compone1").hide();
                        $("#compone2").hide();
                
                    } 
                else if ($(this).val() == "License") {
                	
                    $("#licence").show();
                    $("#atag1").hide();
                    $("#access1").hide();
                    $("#access2").hide();
                    $("#access3").hide();
                    $("#consum1").hide();
                    $("#consum2").hide();
                    $("#compone1").hide();
                    $("#compone2").hide();
            
                }
                else if ($(this).val() == "Accessory") {
                	$("#atag1").hide();
                    $("#licence").hide();
                    $("#access1").show();
                    $("#access2").show();
                    $("#access3").show();
                    $("#consum1").hide();
                    $("#consum2").hide();
                    $("#compone1").hide();
                    $("#compone2").hide();
            
                }

                else if ($(this).val() == "Consumable") {
                	$("#atag1").hide();
                    $("#licence").hide();
                    $("#access1").hide();
                    $("#access2").hide();
                    $("#access3").hide();
                    $("#consum1").show();
                    $("#consum2").show();
                    $("#compone1").hide();
                    $("#compone2").hide();
            
                }

                else if ($(this).val() == "Component") {
                	$("#atag1").hide();
                    $("#licence").hide();
                    $("#access1").hide();
                    $("#access2").hide();
                    $("#access3").hide();
                    $("#consum1").hide();
                    $("#consum2").hide();
                    $("#compone1").show();
                    $("#compone2").show();
            
                }
                });});
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Asset Assigning</h4>

              <form name='form1' action='back-asset-assign-upload' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">
<table class="table">
<tr>{{ csrf_field() }}</tr>
<tr>
<td>Type</td><td>
<select name="type1" id="nrequ1" class='form-control'>
<option value="">--Select--</option>
<option value="Asset">Asset</option>
<option value="License">License</option>
<option value="Accessory">Accessory</option>
<option value="Consumable">Consumable</option>
<option value="Component">Component</option>
</select>
</td><td></td>
</tr>






<tr id="atag1" style="display: none;">
<td>Asset Tag</td><td><input type='text' name='asset_tag' class='form-control'/></td><td></td>
</tr>



<tr id="licence" style="display: none;">
<td>License</td><td><input type='text' id="tag" name='licence' class='form-control'/></td><td></td>
</tr>



<tr id="access1" style="display: none;">
<td>Accessory Name</td><td><input type='text' id="tag" name='accessname' class='form-control' /></td><td></td>
</tr>
<tr id="access2" style="display: none;">
<td>Model No</td><td><input type='text' id="tag" name='modelno' class='form-control'/></td><td></td>
</tr>
<tr id="access3" style="display: none;">
<td>Manufacturer</td><td><input type='text' id="tag" name='manufacturer' class='form-control'/></td><td></td>
</tr>


<tr id="consum1" style="display: none;">
<td>Consumable Name</td><td><input type='text' id="tag" name='Consumable_name' class='form-control'/></td><td></td>
</tr>
<tr id="consum2" style="display: none;">
<td>Model No</td><td><input type='text' id="tag" name='Consumable_modelno' class='form-control'/></td><td></td>
</tr>


<tr id="compone1" style="display: none;">
<td>Component Name</td><td><input type='text' id="tag" name='Component_name' class='form-control'/></td><td></td>
</tr>
<tr id="compone2" style="display: none;">
<td>Serial No</td><td><input type='text' id="tag" name='serialno' class='form-control'/></td><td></td>
</tr>





<tr>
<td>Assign to</td><td><input type='text' id="tag" name='assign_to' class='form-control'/></td><td></td>
</tr>


<tr>
<td>Assign Date</td><td><input type='text' id="datepicker" name='adate' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Quantity</td><td><input type='text' id="tag" name='quantity' class='form-control'/></td><td></td>
</tr>

<tr>
<td>Remarks</td><td>
<textarea rows="4" cols="40" name="remarks" class='form-control'></textarea>
</td><td></td>
</tr>
</table>
<center><input style="center" type="submit" value="Submit" class="btn btn-theme"></center>
</form>



              </div></div></div>


              </section></section>
              
              
              @include('footer');
