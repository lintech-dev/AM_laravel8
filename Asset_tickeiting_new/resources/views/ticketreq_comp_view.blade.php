@include('layouts.app');
<?php 
include 'conn.php';
$user_segment = Auth::user()->segment_name;
?>

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
              <h4 class="mb"><i class="fa fa-angle-right"></i>High Priority Tickets</h4>
        <div class="row mt">
        
<?php 
$query = "select * from company_info where priority='High'";
$stmt = $conn->query($query);
while($row = $stmt->fetch())
{
    $id = $row['comp_id'];
    $compname = $row['comp_name'];
    $priority = $row['priority'];
?>
        
        <div class="col-md-4 col-sm-4 mb"><div class="green-panel pn"><div class="green-header">
        <h2 style="color: #fff;"><?php echo"$compname"; ?> Tickets</h2></div>
	      <ul>
              <?php 
              if($user_segment == "WIFI" || $user_segment == "NETWORK" || $user_segment == "FIRE WALL")
              {
               $sql3 = "SELECT count(*) FROM tickets where status='pending' AND company_name='$compname' AND segment='$user_segment'";
              $result3 = $conn->prepare($sql3);
              $result3->execute();
              $nr3 = $result3->fetchColumn();
              
              $sql1 = "SELECT count(*) FROM tickets where status='open' AND company_name='$compname' AND segment='$user_segment'";
              $result1 = $conn->prepare($sql1);
              $result1->execute();
              $nr1 = $result1->fetchColumn();
              
              $sql2 = "SELECT count(*) FROM tickets where status='close' AND company_name='$compname' AND segment='$user_segment'";
              $result2 = $conn->prepare($sql2);
              $result2->execute();
              $nr2 = $result2->fetchColumn();
              
              }
              else
              {
              
                  $sql3 = "SELECT count(*) FROM tickets where status='pending' AND company_name='$compname'";
                  $result3 = $conn->prepare($sql3);
                  $result3->execute();
                  $nr3 = $result3->fetchColumn();
                  
                  $sql1 = "SELECT count(*) FROM tickets where status='open' AND company_name='$compname'";
                  $result1 = $conn->prepare($sql1);
                  $result1->execute();
                  $nr1 = $result1->fetchColumn();
                  
                  $sql2 = "SELECT count(*) FROM tickets where status='close' AND company_name='$compname'";
                  $result2 = $conn->prepare($sql2);
                  $result2->execute();
                  $nr2 = $result2->fetchColumn();
                  
              }
              $pc1 = "pending|$compname";
              $oc1 = "open|$compname";
              $cc1 = "close|$compname";
              ?>
              <!-- <a href="{!! URL::asset("tickets_attachment/$path") !!}" target="_blank">View</a> -->
      				<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$pc1") !!}" style="color: #fff;"><?php echo"$nr3 Pending Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$oc1") !!}" style="color: #fff;"><?php echo"$nr1 Open Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$cc1") !!}" style="color: #fff;"><?php echo"$nr2 Close Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              </ul>
                </div></div>
        
        <?php 
}
        ?>
</div></div></div></div>
    
    
    
    
    
    
    
         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Medium Priority Tickets</h4>
        <div class="row mt">
        
<?php 
$query2 = "select * from company_info where priority='Medium'";
$stmt2 = $conn->query($query2);
while($row2 = $stmt2->fetch())
{
    $id2 = $row2['comp_id'];
    $compname2 = $row2['comp_name'];
    $priority2 = $row2['priority'];
?>
        
        <div class="col-md-4 col-sm-4 mb"><div class="green-panel pn"><div class="green-header">
        <h2 style="color: #fff;"><?php echo"$compname2"; ?> Tickets</h2></div>
	      <ul>
              <?php 
              if($user_segment == "WIFI" || $user_segment == "NETWORK" || $user_segment == "FIRE WALL")
              {
               $sql3 = "SELECT count(*) FROM tickets where status='pending' AND company_name='$compname2' AND segment='$user_segment'";
              $result3 = $conn->prepare($sql3);
              $result3->execute();
              $nr3 = $result3->fetchColumn();
              
              $sql1 = "SELECT count(*) FROM tickets where status='open' AND company_name='$compname2' AND segment='$user_segment'";
              $result1 = $conn->prepare($sql1);
              $result1->execute();
              $nr1 = $result1->fetchColumn();
              
              $sql2 = "SELECT count(*) FROM tickets where status='close' AND company_name='$compname2' AND segment='$user_segment'";
              $result2 = $conn->prepare($sql2);
              $result2->execute();
              $nr2 = $result2->fetchColumn();
              }
              else
              {
                  $sql3 = "SELECT count(*) FROM tickets where status='pending' AND company_name='$compname2'";
                  $result3 = $conn->prepare($sql3);
                  $result3->execute();
                  $nr3 = $result3->fetchColumn();
                  
                  $sql1 = "SELECT count(*) FROM tickets where status='open' AND company_name='$compname2'";
                  $result1 = $conn->prepare($sql1);
                  $result1->execute();
                  $nr1 = $result1->fetchColumn();
                  
                  $sql2 = "SELECT count(*) FROM tickets where status='close' AND company_name='$compname2'";
                  $result2 = $conn->prepare($sql2);
                  $result2->execute();
                  $nr2 = $result2->fetchColumn();
              }
              
              $pc2 = "pending|$compname2";
              $oc2 = "open|$compname2";
              $cc2 = "close|$compname2";
               
              ?>
      				<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$pc2") !!}" style="color: #fff;"><?php echo"$nr3 Pending Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$oc2") !!}" style="color: #fff;"><?php echo"$nr1 Open Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$cc2") !!}" style="color: #fff;"><?php echo"$nr2 Close Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              </ul>
                </div></div>
        
        <?php 
}
        ?>
</div></div></div></div>






         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Low Priority Tickets</h4>
        <div class="row mt">
        
<?php 
$query3 = "select * from company_info where priority='Low'";
$stmt3 = $conn->query($query3);
while($row3 = $stmt3->fetch())
{
    $id3 = $row3['comp_id'];
    $compname3 = $row3['comp_name'];
    $priority3 = $row3['priority'];
?>
        
        <div class="col-md-4 col-sm-4 mb"><div class="green-panel pn"><div class="green-header">
        <h2 style="color: #fff;"><?php echo"$compname3"; ?> Tickets</h2></div>
	      <ul>
              <?php 
              if($user_segment == "WIFI" || $user_segment == "NETWORK" || $user_segment == "FIRE WALL")
              {
               $sql3 = "SELECT count(*) FROM tickets where status='pending' AND company_name='$compname3' AND segment='$user_segment'";
              $result3 = $conn->prepare($sql3);
              $result3->execute();
              $nr3 = $result3->fetchColumn();
              
              $sql1 = "SELECT count(*) FROM tickets where status='open' AND company_name='$compname3' AND segment='$user_segment'";
              $result1 = $conn->prepare($sql1);
              $result1->execute();
              $nr1 = $result1->fetchColumn();
              
              $sql2 = "SELECT count(*) FROM tickets where status='close' AND company_name='$compname3' AND segment='$user_segment'";
              $result2 = $conn->prepare($sql2);
              $result2->execute();
              $nr2 = $result2->fetchColumn();
              }
              else 
              {
                  $sql3 = "SELECT count(*) FROM tickets where status='pending' AND company_name='$compname3'";
                  $result3 = $conn->prepare($sql3);
                  $result3->execute();
                  $nr3 = $result3->fetchColumn();
                  
                  $sql1 = "SELECT count(*) FROM tickets where status='open' AND company_name='$compname3'";
                  $result1 = $conn->prepare($sql1);
                  $result1->execute();
                  $nr1 = $result1->fetchColumn();
                  
                  $sql2 = "SELECT count(*) FROM tickets where status='close' AND company_name='$compname3'";
                  $result2 = $conn->prepare($sql2);
                  $result2->execute();
                  $nr2 = $result2->fetchColumn();
              }
               
              $pc3 = "pending|$compname3";
              $oc3 = "open|$compname3";
              $cc3 = "close|$compname3";
              
              ?>
      				<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$pc3") !!}" style="color: #fff;"><?php echo"$nr3 Pending Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$oc3") !!}" style="color: #fff;"><?php echo"$nr1 Open Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="{!! URL::asset("ticket_req_com/$cc3") !!}" style="color: #fff;"><?php echo"$nr2 Close Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              </ul>
                </div></div>
        
        <?php 
}
        ?>
</div></div></div></div>    
     
      
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
   
   
   @include('footer');
