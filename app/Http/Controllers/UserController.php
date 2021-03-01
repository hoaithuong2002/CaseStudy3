<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(){
        $users = User::all();
        return view('user.index',compact('users'));
    }
    function create(){
        return view('user.create');
    }
    function store(Request $request){
        $user =new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index');
    }
    function update($id){
        $user =  User::find($id);
        return view('user.edit',compact('user'));
    }
    function edit($id, Request $request){
        $user =  User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('user.index');
    }
    function delete($id){
        $user =User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
