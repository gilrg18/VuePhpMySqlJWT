<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function createUser(){
        return view('users.create');
    }

    public function storeUser(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'email',
            'password' => 'required',
        ]);

        $newUser = User::create($data);

        return redirect(route('user.index'));
    }
}
