<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User</h1>
    <div>
        @if(session()->has('success'))
            <div>{{session('success')}}</div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>Password</th>
                <th>Edit</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                    <button onclick="window.location.href='{{ route('user.edit', ['user' => $user]) }}'">Edit</button>
                    </td>                
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>