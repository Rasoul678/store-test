<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h1>Welcome to the site {{$user->full_name}}</h1>
<br/>
<h2>You can know visit our <a href="{{route('home')}}">Online Store</a></h2>

</body>

</html>