@include('header_public');  



          <section id="main-content">
      <section class="wrapper">
        <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
        <!-- BASIC FORM ELELEMNTS -->
         @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif
         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>View Ticket History/Details</h4>   
              
              
              
              
              <form action="{{ URL::asset('view_tic') }}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token"   value="{{ csrf_token() }}">
                   <table class="table">
		<tbody>
		
		<tr><td><span style="color:red">*</span>Ticket ID</td>
           <td  colspan="3">
           <input type="text" name="ticket_id" class="form-control">
           </td>
           <tr>
        
        <tr><td><span style="color:red">*</span>Mobile Number</td>
           <td  colspan="3">
           <input type="text" name="mobile" class="form-control" required>
           </td>
           <tr>
        
        <tr><td><span style="color:red">*</span>Email-ID</td>
           <td  colspan="3">
           <input type="text" name="email" class="form-control">
           </td>
           <tr>
           
</tbody></table>

<br>
 <input type="submit" value="Search" class="btn btn-theme">
    </form>

</div>
</div>
</div></section></section>   
   
   @include('footer');
