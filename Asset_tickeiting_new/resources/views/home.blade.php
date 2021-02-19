@include('layouts.app')
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
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif
         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Dashboard <?php //echo"$user_segment";?></h4> 




<div class="row mt">

			<div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                  <h2 style="color: #fff;">Pending Tickets</h2>
                  </div>
                 	

              <ul>
              
              <?php
              
              $sql3 = "SELECT count(*) FROM tickets where status='pending'";
              $result3 = $conn->prepare($sql3);
              $result3->execute();
              $nr3 = $result3->fetchColumn();
              
              /* $sql1 = "SELECT count(*) FROM tickets where status='open'";
              $result1 = $conn->prepare($sql1);
              $result1->execute();
              $nr1 = $result1->fetchColumn();
              
              
              $sql2 = "SELECT count(*) FROM tickets where status='close'";
              $result2 = $conn->prepare($sql2);
              $result2->execute();
              $nr2 = $result2->fetchColumn(); */
              
              ?>
      				<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="ticket_req/pending" style="color: #fff;"><?php echo"$nr3 Pending Tickets"; ?>&nbsp;&nbsp;<br><br><u>View All</u></a></h4></li>
              		<!-- <li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="ticket_req/open" style="color: #fff;"><?php echo"$nr1 Open Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="ticket_req/close" style="color: #fff;"><?php echo"$nr2 Close Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li> -->
              </ul>
                </div>
              </div>


			<div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                  <h2 style="color: #fff;">Open & Closed Tickets</h2>
                  </div>
                 	

              <ul>
              
              <?php
              
              
              
              $sql1 = "SELECT count(*) FROM tickets where status='open'";
              $result1 = $conn->prepare($sql1);
              $result1->execute();
              $nr1 = $result1->fetchColumn();
              
              
              $sql2 = "SELECT count(*) FROM tickets where status='close'";
              $result2 = $conn->prepare($sql2);
              $result2->execute();
              $nr2 = $result2->fetchColumn();
              
              ?>
      			
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="ticket_req/open" style="color: #fff;"><?php echo"$nr1 Open Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              		<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="ticket_req/close" style="color: #fff;"><?php echo"$nr2 Close Tickets"; ?>&nbsp;&nbsp;<u>View All</u></a></h4></li>
              </ul>
                </div>
              </div>

			<div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                  <h2 style="color: #fff;">Total Asset Assigned</h2>
                  </div>
                 	

              <ul>
              
              <?php
              
              $sql3 = "SELECT count(*) FROM asset_assign";
              $result3 = $conn->prepare($sql3);
              $result3->execute();
              $nr3 = $result3->fetchColumn();
              
              
              ?>
      				<li><h4 class="mt" style="color: #fff; text-align: justify;"><a href="view_asset_assign/view" style="color: #fff;"><?php echo"$nr3 Total Asset Are Assigned"; ?>&nbsp;&nbsp;<br><br><u>View Details</u></a></h4></li>
              		
              </ul>
                </div>
              </div>


              
</div>

<br>












             </div>
          </div>
          <!-- col-lg-12-->
        </div>
    
     
     
     
         <!-- page start-->
        <div id="morris">
          <div class="row mt">
            
 
 <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Chart </h4>
                <div class="panel-body">
                  <div id="hero-bar" class="graph"></div>
                </div>
              </div>
            </div>
 
 
             <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Chart</h4>
                <div class="panel-body">
                  <div id="hero-donut" class="graph"></div>
                </div>
              </div>
            </div>
   



          </div>
        </div>
        <!-- page end-->
      
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
   
   
   
   
   @include('footer');
   
   <?php 
   
       $sql41 = "select count(*) from tickets where status='pending' AND created_date > DATE_SUB(NOW(), INTERVAL 3 MONTH)";
       $result41 = $conn->prepare($sql41);
       $result41->execute();
       $nr41_pending = $result41->fetchColumn();
       
       
       $sql42 = "select count(*) from tickets where time_taken < '1:0:0' AND created_date > DATE_SUB(NOW(), INTERVAL 3 MONTH)";
       $result42 = $conn->prepare($sql42);
       $result42->execute();
       $nr42_w_sla = $result42->fetchColumn();
       
       $sql43 = "select count(*) from tickets where  time_taken > '1:0:0' AND created_date > DATE_SUB(NOW(), INTERVAL 3 MONTH)";
       $result43 = $conn->prepare($sql43);
       $result43->execute();
       $nr43_o_sla = $result43->fetchColumn();
   
   

   $sql100 = "select count(*) from asset_assign";
   $result100 = $conn->prepare($sql100);
   $result100->execute();
   $asset_a = $result100->fetchColumn();
   
   /*
   $sql101 = "select count(*) from tickets where update_by='110011' AND created_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
   $result101 = $conn->prepare($sql101);
   $result101->execute();
   $varun = $result101->fetchColumn();
   
   $sql102 = "select count(*) from tickets where update_by='113009' AND created_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
   $result102 = $conn->prepare($sql102);
   $result102->execute();
   $satyajit = $result102->fetchColumn();
 */

   ?>
   
   <script type="text/javascript">
   var Script = function () {
	    //morris chart
	    $(function () {
	      // data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type
  Morris.Bar({
	        element: 'hero-bar',
	        data: [
	          {device: 'Pending Tickets', geekbench: <?php echo"$nr41_pending"; ?>},
	          {device: 'Tickets Within SLA', geekbench: <?php echo"$nr42_w_sla"; ?>},
	          {device: 'Tickets Out of SLA', geekbench: <?php echo"$nr43_o_sla"; ?>}
	        ],
	        xkey: 'device',
	        ykeys: ['geekbench'],
	        labels: [''],
	        barRatio: 0.4,
	        xLabelAngle: 35,
	        hideHover: 'auto',
	        barColors: ['#ac92ec']
	      });

	      new Morris.Line({
	        element: 'examplefirst',
	        xkey: 'year',
	        ykeys: ['value'],
	        labels: ['Value'],
	        data: [
	          {year: '2008', value: 20},
	          {year: '2009', value: 10},
	          {year: '2010', value: 5},
	          {year: '2011', value: 5},
	          {year: '2012', value: 20}
	        ]
	      });

	      $('.code-example').each(function (index, el) {
	        eval($(el).text());
	      });
	    });

	}();
</script>

   <script type="text/javascript">
  Morris.Donut({
      element: 'hero-donut',
      data: [
        {label: 'Asset Remaining', value: <?php echo"50"; ?> },
        {label: 'Asset Assigned', value: <?php echo"$asset_a"; ?> },
        
        
      ],
        colors: ['#3498db', '#2980b9', '#34495e'],
      formatter: function (y) { return y + "" }
    });
</script> 



   




