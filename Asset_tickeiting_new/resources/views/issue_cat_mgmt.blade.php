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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Issue Category Management</h4>

              <form action='insert_issuecat' method="post" enctype="multipart/form-data">
               <input type="hidden" name="_token"   value="{{ csrf_token() }}">
                                 <table class="table">
                      <tbody>

                         <tr><td>Issue Category Name</td>
                         <td  colspan="1"><input type="text" name="issuecategory"  class='form-control' /></td>
                         </tr>

              </tbody></table>

              <br>
               <center><input style="center" type="submit" value="Submit" class="btn btn-theme"></center>
                  </form>



              </div></div></div>
              
                 <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Issue Category Management</h4>

              <table class="table">
              <tr style="background-color:#4ECDC4; color: #ffffff;">
              <th style="text-align:left;"> Sl No </th>
              <th style="text-align:left;"> Issue Category Name </th>

              <th style="text-align:left;"> Delete </th>

              </tr>
              <tr>{{ csrf_field() }}</tr>

              <?php
              include('conn.php');
              $query = "select * from issuecategory_info";
              $stmt = $conn->query($query);
              while($row = $stmt->fetch())
              {
              $id = $row['iss_id'];
              $compname = $row['issuecat_name'];
              ?>
              <tr>
              <input type="hidden" name="id" value="{{ $value->id }}">

              <td style="text-align: left;"> <?php echo"$id";?>  </td>
              <td style="text-align: left;"> <?php echo"$compname";?>  </td>
              <td style="text-align: left;" ><a href="issuecat_del/<?php echo"$id"; ?>" onClick="return confirm('Are you sure do you want to Delete this Issue Category name?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
              <!--  -->
              </tr>
              <?php
              }
              ?>
              </table>

              </div></div></div></section></section>
              
              @include('footer');
