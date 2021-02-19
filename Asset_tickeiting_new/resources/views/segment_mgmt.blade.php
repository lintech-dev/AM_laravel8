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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Segment Management</h4>

              <form action='insert_seg' method="post" enctype="multipart/form-data">
               <input type="hidden" name="_token"   value="{{ csrf_token() }}">
                                 <table class="table">
                      <tbody>

              <!--        <tr><td><span style="color:red">*</span>On behalf of</td>
                         <td  colspan="3">
                         <select name="created_by" class='form-control' >
                         <option value="">--Select--</option>
                         <option value="<?php // echo"$empid_first"; ?>">Self</option> <?php // take session value of login empid?> -->
                         <?php
                      /*   $query1="select empid,name from empdirectory";
                         $stmt1 = $conn->query($query1);
                         while($row1 = $stmt1->fetch())
                         {
                             $empid = $row1['empid'];
                             $name = $row1['name']; */
                      //       echo"<option value='$empid'>$name</option>";
                  //       }
                         ?>
                  <!--       </select>
                         </td>
                         <tr>

                          <tr><td><span style="color:red">*</span>Category</td>
                         <td  colspan="3">
                         <select name="category" id="drop_1" class='form-control' >
                         <option value="">--Select--</option>     -->
                         <?php
                      /*   $query1="select category from ticket_cat";
                         $stmt1 = $conn->query($query1);
                         while($row1 = $stmt1->fetch())
                         {
                             $category = $row1['category']; */
                          //   echo"<option value='$category'>$category</option>";
                      //   }
                         ?>
                <!--         </select>
                         </td>
                         </tr>
                         <tr id="s_cate"><td><span style="color:red">*</span>Sub category</td>
                         <td  colspan="3">
                          <span id="result_1" style="display: none;"></span>
                              <span id="wait_2" style="display: none;">
                              <img alt="Please Wait" src="ajax-loader.gif"/>
                              </span>
                              <span id="result_1"></span>

                         <a href="javascript: void(0)" onclick="window.open('add_sub_cat', 'windowname1','width=500, height=200');return false;">New</a>
                         </td>
                         </tr>
                         <tr><td>Remarks</td>
                         <td  colspan="3"><textarea rows="4" cols="60" name="remarks" class='form-control' ></textarea></td>
                       </tr> -->

                         <tr><td>Segment Name</td>
                         <td  colspan="1"><input type="text" name="segment"  class='form-control' /></td>
                         </tr>

              </tbody></table>

              <br>
               <center><input style="center" type="submit" value="Submit" class="btn btn-theme"></center>
                  </form>



              </div></div></div>


<div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Segment Management</h4>
              
              <table class="table">
              <tr style="background-color:#4ECDC4; color: #ffffff;">
              <th style="text-align:left;"> Sl No </th>
              <th style="text-align:left;"> Segment Name </th>

              <th style="text-align:left;"> Delete </th>

              </tr>
              <tr>{{ csrf_field() }}</tr>

              <?php
              include('conn.php');
              $query = "select * from segment_info";
              $stmt = $conn->query($query);
              while($row = $stmt->fetch())
              {
              $id = $row['seg_id'];
              $compname = $row['seg_name'];
              ?>
              <tr>
              <input type="hidden" name="id" value="{{ $value->id }}">

              <td style="text-align: left;"> <?php echo"$id";?>  </td>
              <td style="text-align: left;"> <?php echo"$compname";?>  </td>
              <td style="text-align: left;" ><a href="segment_del/<?php echo"$id"; ?>" onClick="return confirm('Are you sure do you want to Delete this Segment name?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
              <!--  -->
              </tr>
              <?php
              }
              ?>
              </table>

</div></div></div>
              </section></section>

              @include('footer');