<html>
<head>
    <title>

    </title>
</head>
<body>
<form method="POST" action="{{ route('business.auth.login.business') }}">
    @csrf
    @method('POST')
{{--    @include('layouts.errors')--}}
    <div class="form-group form-focus">
        <input type="email" class="form-control floating" name="email">
        <label class="focus-label">Email</label>
    </div>
    <div class="form-group form-focus">
        <input type="password" class="form-control floating" name="password">
        <label class="focus-label">Password</label>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
