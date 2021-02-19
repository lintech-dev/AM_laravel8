
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



<h2 align='center'><u>Invoices Upload</u></h2>


<form name='form1' action='back-invoice-upload' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">
<table align='center'>
<tr>{{ csrf_field() }}</tr>
<tr><td>Manager Mail ID :</td><td><input type='text' id="tag" name='memail' /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Co-Ordinator Mail ID :</td><td><input type='text' id="tag1" name='cemail' /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Cost Center :</td><td><input type='text' name='center' /></td></tr>
<tr><td>&nbsp;</td></tr>
<?php $dates = date('d-m-Y');?>
<tr><td>Date :</td><td><input type='text' name='sdate' value='<?php echo $dates; ?>' readonly /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Vendor Name :</td><td><input type='text' name='vname' /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Foreign Currency :</td><td><input type='text' name='fcurrency' /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>AMT In Foreign Currency :</td><td><input type='text' name='amtfcurrency' /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Attachment :</td><td><input type='file' name='userfile' /></td></tr>
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
