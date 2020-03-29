<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>Login - {{ config('app.name') }}</title>
    </head>
    <body>
    @if (session('logout-msg'))
        <div class="alert alert-success">
            <h5 class="text-center">{{ session('logout-msg') }}</h5>
        </div>
    @else
        <div class="alert alert-warning">
            <h5 class="text-center">Please sign in as admin for accessing dashboard. You know how, right?</h5>
        </div>
    @endif
        <div class="container section">
            <div>
                <h1>Sign In</h1>
            </div>
                <div class="row">
                    <form class="col s12"  action="{{ route('admin.login.post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" id="email" name="email" autofocus value="{{ old('email') }}" class="validate">
                                <label for="email">Admin Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" id="password" name="password" class="validate">
                                <label for="password">Admin Password</label>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <button class="waves-effect waves-light btn" type="submit">Sign In</button>
                            <a class="waves-effect waves-light btn" href="{{ route('home') }}" >Home Page</a>
                        </div>

                    </form>
                </div>
        </div>
    </body>
</html>
