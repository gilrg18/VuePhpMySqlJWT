<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', ['users'=>$users]);
    }

    public function createUser(){
        return view('users.create');
    }

    public function storeUser(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users,email',
            'password' => 'required',
        ]);

        $newUser = User::create($data);

        return redirect(route('user.index'));
    }

    public function editUser(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function updateUser(User $user, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users,email,'.$user->id,
            'password' => 'required',
        ]);

        $user-> update($data);
        return redirect(route('user.index'))->with('success', 'User '.$user->id .' Updated Successfully');
    }

    public function deleteUser(User $user){
        $user-> delete();
        return redirect(route('user.index'))->with('success', 'User '.$user->id .' Deleted Successfully');

    }
}


