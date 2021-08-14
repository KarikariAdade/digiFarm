<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<h1>Your email is not verified or token has expired <br>
</h1>

<form method="POST" action="{{ route('business.auth.token.resend') }}">
    @method('POST')
    @csrf
    @include('layouts.errors')
    <div class="form-group">
        <label>Email Address</label><br>
        <input type="email" name="email" class="form-control" placeholder="Enter your email address">
    </div>
    <button class="btn" type="submit">Resend Verification Code</button>
</form>

</body>
</html>
