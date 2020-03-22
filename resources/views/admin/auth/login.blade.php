<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>Login - {{ config('app.name') }}</title>
    </head>
    <body>
        <div class="container section">
            <div>
                <h1>Sign In</h1>
            </div>
                <div class="row">
                    <form class="col s12"  action="{{ route('admin.login.post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" id="email" name="email" placeholder="Email address" autofocus value="{{ old('email') }}" class="validate">
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" id="password" name="password" placeholder="Password" class="validate">
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <button class="waves-effect waves-light btn" type="submit">SIGN IN</button>
                        </div>

                    </form>
                </div>
        </div>
    </body>
</html>
