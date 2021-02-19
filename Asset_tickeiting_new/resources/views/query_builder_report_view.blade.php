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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Query Builder View</h4>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  
   <table id="example" class="display" style="width:100%">
                <thead>
               

 <tr>
 <th>ID</th>
 <th>Created Date</th>
 <th>Asset Tag</th>
 <th>QR BAR Code</th>
 <th>Model No</th>
 <th>Status</th>
 <th>Serial No</th>
 <th>Asset Name</th>
 <th>Purchase Date</th>
 <th>Supplier</th>
 <th>Order No</th>
<th>Purchase Cost</th>
 <th>Warranty</th>
  <th>Location</th>
  <th>Requestable</th>
 </tr>
 </thead>
                <tbody>
@foreach($results as $value)
        <tr>
        
        <td>{{$value->Asset_Id}}</td>
        <td>{{$value->created_date}}</td>
        <td>{{$value->Asset_Tag}}</td>
        <td>{{$value->QR_BAR_code}}</td>
        <td>{{$value->Model}}</td>
        <td>{{$value->Status}}</td>
        <td>{{$value->serial}}</td>
        <td>{{$value->Asset_name}}</td>
        <td>{{$value->Purchase_dt}}</td>
        <td>{{$value->Supplier}}</td>
        <td>{{$value->Order_no}}</td>
        <td>{{$value->Purchase_cost}}</td>
        <td>{{$value->Warranty}}</td>
        <td>{{$value->Location}}</td>
        <td>{{$value->Requestable}}</td>
        </tr>
        
         @endforeach
                 </tbody>
              </table>
			  
			  
			  
  
  
</div></div></div>
              </section></section>

<script type="text/javascript">
var j = jQuery.noConflict();
j(document).ready(function() {
    j('#example').DataTable( {
        dom: 'Bfrtip',
	"ordering": false,
	"pageLength": 50,
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
    } );
} );
</script>


   
  
  @include('footer');
