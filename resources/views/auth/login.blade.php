@extends('site.app')
@section('title','Login')
@section('content')


{{--    <section class="section-content padding-y">--}}
{{--        <div class="container mb-4">--}}
{{--            <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">--}}
{{--                <h1 class="mt-3 mb-4 text-center">Login</h1>--}}
{{--                <article class="border-top">--}}
{{--                    <form class="mt-2" action="{{ route('login') }}" method="POST" role="form">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="email"><h5>E-Mail Address</h5></label>--}}
{{--                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                            @error('email')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="password"><h5>Password</h5></label>--}}
{{--                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">--}}
{{--                            @error('password')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group row mr-auto">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        <h6>{{ __('Remember Me') }}</h6>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <button type="submit" class="btn btn-success btn-block"> Login </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </article>--}}
{{--                <div class="border-top text-center">--}}
{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot Your Password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <div class="text-center">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


<div class="text-center" style="margin-top: 100px">
    <form class="form-signin" action="{{ route('login') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <div class="text-center">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></div>
</div>



@endsection