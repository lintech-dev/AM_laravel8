
<!DOCTYPE>
<head>
<title>TUV Rheiland</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/default.css"/>

</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">



@include('header')  
  
  
  
<div id="content">



<h2 align='center'><u>Closed Invoices</u></h2>

<table class='mystyle' width='900'>
 <col width=200>
 <col width=200>
 <col width=200>
 <col width=150>
 <col width=150>
<tr><th>Vendor Name</th><th>Invoice</th><th>Manager Email</th><th>Foreign Cureency</th><th>SAP Doc No </th></tr>
<tr>{{ csrf_field() }}</tr>
  @foreach($closed as $value)
               <tr>
                   <td style="text-align: left;"><a href="Admin-Detailed/{{$value->id}}">{{ $value->vname }}</a></td>
                   <td style="text-align: left;"><a href='img/{{$value->attachment}}' target='_blank'>{{ $value->attachment }}</a></td>
                   <td style="text-align: left;">{{ $value->managermail }}</td>
                   <td style="text-align: left;">{{ $value->fcurrency }}</td>
				   <td style="text-align: left;">{{ $value->sap }}</td>
                   <!-- <td style="text-align: center;"><a href="user_update/{{$value->id}}"><img src="img/edit.png" style="width: 30px; height: 30px;"></a></td>
                   <td style="text-align: center;"><a href=""><img src="img/delete1.png" style="width: 30px; height: 30px;"></a></td> -->
               </tr>
           @endforeach
           
<!-- <tr bgcolor='#f0f0f0'><td><a href='./Admin-Detailed-View.php?id=$idss'>$vname</a></td><td id='permalink_section'><a href='./files/$filename' target='_blank'>".$filename."</a></td><td id='permalink_section'>$memail</td><td>$fcurrency</td><td>$digi</td></tr> -->

</table>
<br>



</div>
  
  
  
  
</div>
<div id="footer">
  <p class="left">Copyright &copy; 2013 <a href="">TUV Rheinland</a> - All Rights Reserved</p>
  <p class="right"><a href="">Designed by Lintechnokrats</a></p>
  <div style="clear:both;">&nbsp;</div>
</div>


</body>
</html>
