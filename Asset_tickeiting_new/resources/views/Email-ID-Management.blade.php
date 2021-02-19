
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



<h2 align='center'><u>Email-ID Management</u></h2>

<table class='mystyle' align='center' width='400'>
 <col width=40>
 <col width=300>
 <col width=60>


<tr><th>Sl No</th><th>Email-ID</th><th>Delete</th></tr>

<tr>{{ csrf_field() }}</tr>
@foreach($email_data as $value)
               <tr>
                   <td style="text-align: left;">{{ $value->id }}</td>
                   <td style="text-align: left;">{{ $value->emails }}</td>
                  <td style="text-align: center;"><a href="user_update/{{$value->id}}"><a href=""><img src="img/delete1.png" style="width: 25px; height: 25px;"></a></td>
               </tr>
           @endforeach
<!-- <tr bgcolor='#f0f0f0'><td>$j</td><td id='permalink_section'>$emails</td><td id='permalink_section'><a href='Delete-MailID.php?id=$idss'><img src='./images/delete.png' width='40' height='25'></a></td></tr> -->

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
