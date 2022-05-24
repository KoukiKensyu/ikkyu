<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //dd($user);
        return view('mypage/index',['users'=>$user]);
    }
    public function edit_user()
    {
        $user = Auth::user();
        return view('mypage/edit',['user'=>$user]);
    }
    public function update_user(Request $request)
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
    public function search(Request $request)
    {
    $query = User::query();
    if($request->name){
        $query -> where('name', 'LIKE', '%'. $request->name. '%');
    }
    if($request->id){
        $query -> where('id', 'LIKE', '%'. $request->id. '%');
    }
    $users = $query->orderBy('id')->paginate(3);
    return view('/admin/Memindex', ['users' => $users]);
    }
    public function show($id)
    {
        $user = \App\Models\User::find($id);
        return view('/admin/UserIndex', ['user' => $user]);
    }
    public function edit($id)
    {
        $user = \App\Models\User::find($id);
        return view('/admin/UserUpdate', ['user' => $user]);
    }
    public function confirm(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        $user->name  = $request->name;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        return view('/admin/UserUpdate_confirmation', ['user' => $user]);
    }
    public function update(Request $request, $id){
        $user = \App\Models\User::find($id);
        $user->name  = $request->name;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user -> save();
        return redirect('/admin/Memindex');
    }
    public function Dconfirm($id)
    {
        $user = \App\Models\User::find($id);
        return view('/admin/UserDelete', ['user' => $user]);
    }
    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        $user->delete();
        return redirect('/admin/Memindex');
    }
}

