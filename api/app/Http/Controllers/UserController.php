<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function createUser(){
        return view('users.create');
    }

    public function storeUser(Request $request){
        dd($request->name);
    }
}
