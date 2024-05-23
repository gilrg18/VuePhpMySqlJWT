<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Welcome</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('login')}}">
        @csrf
        @method('post')
        <div>
            <label>Email<label>
            <input type = "text" name="email" placeholder="email"/>
        </div>
        <div>
            <label>Password<label>
            <input type = "password" name="password" placeholder="password"/>
        </div>
        <div>
            <input type="submit" value="Log in"/>
        </div>

    </form>
</body>
</html>