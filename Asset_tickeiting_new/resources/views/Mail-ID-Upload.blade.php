
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



<h2 align='center'><u>Add New Mail-ID</u></h2>
<form name='form1' action='back_mailid_upload' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">

<table align='center'>
<tr>{{ csrf_field() }}</tr>
<tr><td>Email ID :</td><td><input type='text' name='emailid' /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td colspan='2' align='center'><input type='submit' name='submit' value='submit'></td></tr>
</table>
</form>

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
