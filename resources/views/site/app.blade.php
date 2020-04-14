<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.styles')
</head>
<body>
<div class="mt-5" id="container">
    <div id="main">
        @include('site.partials.header')
        <div class="container">
            @include('flash::message')
        </div>
        @yield('content')
    </div>
</div>
@include('site.partials.footer')
@include('site.partials.scripts')
</body>
</html>
