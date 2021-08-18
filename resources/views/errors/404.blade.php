<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>DigiFarm</title>
    <link rel="stylesheet" href="{{ asset('assets/account/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/account/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/account/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/account/css/custom.css') }}">
</head>

<body>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1>404</h1>
                    <div class="page-description">
                        The page you were looking for could not be found.
                    </div>
                    <div class="page-search">
                        <div class="mt-3">
                            <a class="btn btn-primary" href="{{ url()->previous() }}"><span class="fa fa-arrow-alt-circle-left"></span> Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('assets/account/js/app.min.js') }}"></script>
<script src="{{ asset('assets/account/js/scripts.js') }}"></script>
<script src="{{ asset('assets/account/js/custom.js') }}"></script>
</body>
</html>
