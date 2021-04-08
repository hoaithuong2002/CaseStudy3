<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();
        $users = DB::table('users')->paginate(4);
        return view('back-end.user.index', compact('users'));
    }

    function create()
    {
        return view('back-end.user.create');
    }

    function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success('Congratulations on your successful creation!!!');
        return redirect()->route('user.index');
    }

    function update($id)
    {
        $user = User::find($id);
        return view('back-end.user.edit', compact('user'));
    }

    function edit($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('You have successfully updated your information!!!');
        return redirect()->route('user.index');
    }

    function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->success('You have remove to public!');
        return redirect()->route('user.index');
    }

    public function search(Request $request)
    {
        $search = $request->keyword;
        $users = DB::table('users')->where('name', 'LIKE', "%$search%")->paginate(4);
        return view('back-end.user.index', compact('users'));
    }

}
