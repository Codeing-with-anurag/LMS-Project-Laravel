<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>

<body>
    <center><h1> <b>{{ env('APP_NAME') }}</b> </br> Reset Password </h1></center>
    <h4>Hi , {{ $name }}</h4>
    <h4>Forget your Password ?</h4>
    <p>We recived a request to reset the password for your account.</p>   
    <p>To Reset Password, click on the below:</p><br>
    <a href="{{ $url }}" style="background-color:#007bff !important;border-color:#007bff !important;color:#FFF !important">Reset Password</a>
    <p>Thank you</p>
</body>

</html>
