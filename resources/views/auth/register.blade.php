@extends('site.app')
@section('title','Sign Up')
@section('content')


    <section class="section-content padding-y">
        <div class="container">
            <div class="col-md-8 col-lg-6 col-xl-6 mx-auto">
                <h1 class="text-center mb-4">Sign up</h1>
                <article class="border-top">
                    <form action="{{ route('register') }}" method="POST" role="form">
                        @csrf
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="first_name"><h5>First name</h5></label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }} " required autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="last_name"><h5>Last name</h5></label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email"><h5>E-Mail Address</h5></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="password"><h6>Password</h6></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class=" col form-group">
                                <label for="password_confirmation"><h6>Confirm Password</h6></label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block"> Sign Up </button>
                        </div>
{{--                        <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy.</small>--}}
                    </form>
                </article>
                <div class="border-top card-body text-center">Have an account? <a href="{{ route('login') }}">Log In</a></div>
            </div>
        </div>
    </section>
@endsection
