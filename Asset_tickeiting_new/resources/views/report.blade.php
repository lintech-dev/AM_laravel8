<?php
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Kolkata");
//include('Authenticate.php');
//include('connect-string.php');
//$username=$_SESSION['username'];

?>
@include('layouts.app')
<?php include ('conn.php') ?>

     <section id="main-content">
      <section class="wrapper">
        <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
        <!-- BASIC FORM ELELEMNTS -->
         @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif

<div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Report Generation</h4>



<form method="POST" action="report_set">
    @csrf
<!-- Start Date : <input type="text" id="datepicker" name="str_dt">&nbsp;&nbsp; -->
<div class="form-group row">
    <label for="startdate" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

    <div class="col-md-6">
        <input id="datepicker" type="text" class="form-control" name="str_dt" required autofocus>
    </div>
</div>
<!-- End Date: <input type="text" id="datepicker1" name="end_dt"><br><br>  -->

<div class="form-group row">
    <label for="enddate" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

    <div class="col-md-6">
        <input id="datepicker1" type="text" class="form-control" name="end_dt" required autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="companyname" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

    <div class="col-md-6">
      <!--  <input id="segment" type="text" class="form-control" name="segment" autofocus> -->
        <select name="comp_name" class='form-control' >
        <option value="">--Select--</option>
        <?php
        $query1="select comp_id,comp_name from company_info";
        $stmt1 = $conn->query($query1);
        while($row1 = $stmt1->fetch())
        {
          //  $empid = $row1['seg_id'];
            $name = $row1['comp_name'];
            echo"<option value='$name'>$name</option>";
        }
        ?>
        </select>
    </div>
</div>



<div class="form-group row">
    <label for="segment" class="col-md-4 col-form-label text-md-right">{{ __('Segment') }}</label>

    <div class="col-md-6">
      <!--  <input id="segment" type="text" class="form-control" name="segment" autofocus> -->
        <select name="seg" class='form-control' >
        <option value="">--Select--</option>
        <?php
        $query1="select seg_id,seg_name from segment_info";
        $stmt1 = $conn->query($query1);
        while($row1 = $stmt1->fetch())
        {
          //  $empid = $row1['seg_id'];
            $name = $row1['seg_name'];
            echo"<option value='$name'>$name</option>";
        }
        ?>
        </select>
    </div>
</div>
<!-- Company : <input type="text"  name="comp_name">&nbsp;&nbsp;
Segment: <input type="text"  name="seg"><br><br><br><br>
<input type="submit" value="Generate Report" style="width:150px; height:35px;"/></form>  -->
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-theme">
            {{ __('Generate Report') }}
        </button>
    
</form>

</div></div></div></section></section>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker({
       dateFormat: 'yy-mm-dd',
       showOn: "button",
       buttonImage: "img/calendar.gif",
       buttonImageOnly: true,
    });
  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
       dateFormat: 'yy-mm-dd',
       showOn: "button",
       buttonImage: "img/calendar.gif",
       buttonImageOnly: true,
    });
  } );
  </script>

  @include('footer');