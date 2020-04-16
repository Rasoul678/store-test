@extends('site.app')
@section('title','Sign Up')
@section('content')




    <div class="container text-center"  style="max-width: 330px; margin-top: 100px">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
            <form class="form-signup" action="{{ route('register') }}" method="POST" role="form">
                @csrf
                <label for="first_name" class="sr-only">First name</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" name="first_name" id="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <label for="last_name" class="sr-only">Last name</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" name="last_name" id="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <label for="email" class="sr-only">E-Mail Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <label for="password" class="sr-only">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Sign Up </button>
                </div>
            </form>
        <div class="card-body text-center">Have an account? <a href="{{ route('login') }}">Log In</a></div>
    </div>

@endsection
