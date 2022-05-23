<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
}

