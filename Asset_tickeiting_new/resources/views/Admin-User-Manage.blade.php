
<!DOCTYPE>
<head>
<title>TUV Rheiland</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/default.css"/>
<style type="text/css">
.alert
{
aling: center;
font-size: 18px;
}
</style>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">



@include('header')  
  
    @if(Session:: has('message'))
    <div class="alert" align='center'>
        {{ Session::get('message') }}
        @yield('content')
    </div>
@endif 
  
<div id="content">



<h2 align='center'><u>User Management</u></h2>


<table align='center' class='mystyle' width='570'>
 <col width=150>
 <col width=150>
 <col width=150>
 <col width=120>

<tr><th>User Name</th><th>password</th><th>Role</th><th>Action</th></tr>
<tr>{{ csrf_field() }}</tr>
@foreach($userd as $value)
               <tr>
                   <td style="text-align: left;">{{ $value->username }}</td>
                   <td style="text-align: left;">{{ $value->password }}</td>
                   <td style="text-align: left;">{{ $value->role }}</td>
                  <td style="text-align: center;"><a href="user_mod/{{$value->uids}}"><img src="img/edit.png" style="width: 25px; height: 25px;"></a> &nbsp;&nbsp;
                   <a href="user_delete/{{$value->uids}}""><img src="img/delete1.png" style="width: 25px; height: 25px;"></a></td>
               </tr>
           @endforeach
<!-- <tr bgcolor='#f0f0f0'><td id='permalink_section'>$name</td><td id='permalink_section'>$password</td><td>$role</td><td><a href='./Admin-User-Modify.php?id=$idss' ><img src='./images/edit-icon.png' width='30' height='25'></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./back-delete-user.php?id=$idss' ><img src='./images/delete.png' width='30' height='25'></td></tr> -->
<br>
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
