
<html>
<title>
Mail to sms
</title>
<head>
    <style>
        .alert{
    background: black;
    color: #fff;
    padding:20px;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
<center>
<table style="width: 500px; text-align: left;" border="1px">

@foreach($user_mod as $value)
    <tr><td>User Name</td><td> <input type="text" name="username" value="{{ $value->username }}"></td></tr>
    <tr><td>Password</td><td><input type="password" name="password" value="{{ $value->password }}"></td></tr>
    <tr><td>Role</td><td><input type="text" name="role" value="{{ $value->role }}"></td></tr>
	<tr><td>Email-id</td><td><input type="text" name="email" value="{{ $value->email }}"></td></tr>
	<tr><td>Phone</td><td><input type="text" name="phone" value="{{ $value->phone }}"></td></tr>
    @endforeach
    </table>
</center>
</body>
</html>