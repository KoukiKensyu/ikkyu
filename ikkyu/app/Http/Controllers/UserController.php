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
        return view('mypage/index', ['users' => $user]);
    }
    public function edit_user()
    {
        $user = Auth::user();
        return view('mypage/edit', ['user' => $user]);
    }
    public function update_user(Request $request)
    {

        $user = \App\Models\User::find($request->id);
        $user->name  = $request->name;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->birthday = $request->birthday;

        return view('mypage/edit_confirmation', ['user' => $user]);
    }

    public function store(Request $request)
    {

        $user = \App\Models\User::find($request->id);
        $user->name  = $request->name;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->save();
        return redirect('/mypage/index');
    }


    public function search(Request $request)
    {
        $query = User::query();
        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->id) {
            $query->where('id', 'LIKE', '%' . $request->id . '%');
        }
        $users = $query->orderBy('id')->paginate(3);
        return view('/admin/user_index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = \App\Models\User::find($id);
        return view('/admin/user_detail', ['user' => $user]);
    }
    public function edit($id)
    {
        $user = \App\Models\User::find($id);
        return view('/admin/user_edit', ['user' => $user]);
    }
    public function confirm(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        $user->name  = $request->name;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        return view('/admin/user_edit_confirm', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        $user->name  = $request->name;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->save();
        return redirect('/admin/user_index');
    }
    public function delete_confirm($id)
    {
        $user = \App\Models\User::find($id);
        return view('/admin/user_delete', ['user' => $user]);
    }
    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        $user->delete();
        return redirect('/admin/user_index');
    }

    public function delete_user_confirm()
    {
        $user = Auth::user();
        //dd($user);
        return view('mypage/UserDelete', ['users' => $user]);
    }
    public function destroy_user(Request $request)
    {
        $user = \App\Models\User::find($request->id);
        $user -> delete();
        Auth::logout();
        return redirect('/');
    }

}
