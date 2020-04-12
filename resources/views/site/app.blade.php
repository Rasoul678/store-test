<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.styles')
</head>
<body>
    <div id="container">
        <div id="main">
            @include('site.partials.header')
            @yield('content')
        </div>
    </div>
    @include('site.partials.footer')
    @include('site.partials.scripts')
</body>
</html>
