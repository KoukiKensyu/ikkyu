<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //dd($user);
        return view('mypage/index',['users'=>$user]);
    }
    public function edit()
    {
        $user = Auth::user();
        return view('mypage/edit',['user'=>$user]);
    }
    public function update(Request $request)
    {
        $user = new User;
        $user->name=$request->name;
        $user->address=$request->address;
        $user->tel=$request->tel;
        $user->email=$request->email;
        $user->birthday=$request->birthday;
        //dd($user);
        return view('mypage/edit_confirmation',['user'=>$user]);
    }

    public function store(Request $request,User $user)
    {
        $user->update($request->all());
        //dd($user);
        return redirect(route('mypage.index',$user));
    }
}
