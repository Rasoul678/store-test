<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 px-4 bg-dark position-fixed min-vh-100">
            @include('admin.partials.sidebar')
        </div>
        <div class="col offset-2">
            @include('flash::message')
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
