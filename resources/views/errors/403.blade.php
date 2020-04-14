@extends('site.app')
@section('title') 403 @endsection
@section('content')
      <div class="container">
            <h1 class="text-center mt-5" style="font-size: 80px; font-weight: bold">403</h1>
            <h3 class="text-center mt-5 mb-5">Sorry<br> {{$exception->getMessage() ?: 'You are Not Authorized!'}}</h3>
            <a class="btn btn-secondary btn-lg d-block w-25 m-auto" href="{{ redirect()->back()->getTargetUrl() }}" role="button">Back</a>
      </div>
@endsection
