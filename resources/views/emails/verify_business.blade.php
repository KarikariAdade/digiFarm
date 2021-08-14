<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<h2>Welcome to the site {{$business['name']}}</h2>
<br/>
Your registered email-id is {{$business['email']}} , Please click on the below link to verify your email account.
<br>
NB: Token expires in an hour
<br/>
<a href="{{ route('business.auth.verify.business',[$business['token'], sha1($business['name'])]) }}">Verify Email</a>
</body>
</html>
