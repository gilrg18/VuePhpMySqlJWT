<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>User</h1>
    <div>
        @if(session()->has('success'))
        <ul>
            <li>{{session('success')}}</li>
        </ul>    
        @endif
        @if(session()->has('unauthorized'))
        <ul>
            <li>{{session('unauthorized')}}</li>
        </ul>
        @endif
    </div>
    <div>
    <button onclick="window.location.href='{{ route('user.logout') }}'">Log out</button>
        <div>
            <a href="{{route('user.create')}}">Add User</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>Password</th>
                <th>Admin</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->is_admin}}</td>
                    <td>
                    <button onclick="window.location.href='{{ route('user.edit', ['user' => $user]) }}'">Edit</button>
                    </td>    
                    <td>
                        <form method="post" action="{{route('user.delete', ['user' => $user])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>             
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>