
<!DOCTYPE>
<head>
<title>TUV Rheiland</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/default.css') }}"/>

</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">



@include('header')  
  
  
  
<div id="content">





<br>

<h2 align='center'><u>Deatil View</u></h2>

<table class='mystyle' width='900' style="margin-left: 250px;">
 <col width=200>
 <col width=200>
 <col width=200>
 <col width=150>
 <col width=150>
 @foreach($aview as $value)
<tr><th>Vendor Name :</th><th>{{ $value->vname }}</th></tr>

                  <tr><td>Date :</td><td>{{ $value->dates }}</td></tr>
                  <tr><td>Manager Email_ID :</td><td>{{ $value->managermail }}</td></tr>
                   <tr><td>Co-Ordinator Email-ID :</td><td>{{ $value->coordinatormail }}</td></tr>
                  <tr> <td>Foreign Currency:</td><td>{{ $value->fcurrency }}</td></tr>
				   <tr><td>AMT In Foreign Currency :</td><td>{{ $value->amtfcurrency }}</td></tr>
				   <tr><td>Invoice :</td><td><a href='img/{{$value->attachment}}' target='_blank'>{{ $value->attachment }}</a></td></tr>
				   <tr><td>SAP Order No :</td><td>{{ $value->sap }}</td></tr>
				   <tr><td>Item No :</td><td>{{ $value->itemno }}</td></tr>
				   <tr><td>Remarks :</td><td>{{ $value->remarks }}</td></tr>
				   <tr><td>Status :</td><td>{{ $value->status }}</td></tr>
                  
               
           @endforeach
<!-- <tr bgcolor='#f0f0f0'><td><a href='./Admin-Detailed-View.php?id=$idss1'>$vname1</a></td><td id='permalink_section'><a href='./files/$filename1' target='_blank'>".$filename1."</a></td><td id='permalink_section'>$sap</td><td>$itemno</td><td><a href='Admin-Digi-Update.php?id1=$idss1'>Click OK</a></td></tr> -->
</table>


</div>
  
  
  
  
</div>
<div id="footer">
  <p class="left">Copyright &copy; 2013 <a href="">TUV Rheinland</a> - All Rights Reserved</p>
  <p class="right"><a href="">Designed by Lintechnokrats</a></p>
  <div style="clear:both;">&nbsp;</div>
</div>


</body>
</html>
