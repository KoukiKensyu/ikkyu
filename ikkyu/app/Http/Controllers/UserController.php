<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//validation ignore用
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //dd($user);
        $reservation = DB::table('reservations')->where('user_id',$user->id)->get();
        $i=0;
        foreach($reservation as $reserve){
        $hotel = DB::table('hotels')->where('id',$reserve->hotel_id)->get();
        //dd($hotel);
        $reservation[$i]->name=$hotel[0]->name;
        $i++;
        }
        return view('mypage/index', ['users' => $user,'reservations' => $reservation]);
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
        $this->validate($request,[
            'name' => ['required','max:50'],
            'address' => 'required|max:100',
            'tel' => 'required|max:20',
            'email' =>  ['required','max:50','email',Rule::unique('users')->ignore($user->id)],//'required|max:20|email|',
            'birthday' => 'required',
        ]);

        return view('mypage/edit_confirmation', ['user' => $user]);
    }

    public function store(Request $request)
    {
        if ($request->has('return')) {
            return view('mypage/edit',['user' => $request]);
        }

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
    public function edit(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        if ($request->has('return')) {
            $user->name  = $request->name;
            $user->address = $request->address;
            $user->tel = $request->tel;
            $user->email = $request->email;
            $user->birthday = $request->birthday;

        }
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
        $this->validate($request,[
            'name' => 'required|max:50',
            'address' => 'required|max:100',
            'tel' => 'required|digits_between:1,20|numeric',
            'email' =>  ['required','max:50','email',Rule::unique('users')->ignore($user->id)],
            'birthday' => 'required',
        ]);
        return view('/admin/user_edit_confirm', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        if ($request->has('return')) {
            return view('admin/user_edit',['user' => $request]);
        }

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

        $reservation = DB::table('reservations')->where('user_id',$id)->get();
        $i=0;
        foreach($reservation as $reserve){
        $hotel = DB::table('hotels')->where('id',$reserve->hotel_id)->get();
        //dd($hotel);
        $reservation[$i]->name=$hotel[0]->name;
        $i++;
        }
        return view('/admin/user_delete', ['user' => $user,'reservations' => $reservation]);
        //user_delete UserDeleteファイルの名前をuser_deleteに変更
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
        $reservation = DB::table('reservations')->where('user_id',$user->id)->get();
        //dd($reservation);
        $i=0;
        foreach($reservation as $reserve){
        $hotel = DB::table('hotels')->where('id',$reserve->hotel_id)->get();
        //dd($hotel);
        $reservation[$i]->name=$hotel[0]->name;
        $i++;
        }
        //dd($reservation);
        return view('mypage/UserDelete', ['users' => $user,'reservations' => $reservation]);
    }
    public function destroy_user(Request $request)
    {
        $user = \App\Models\User::find($request->id);
        $user -> delete();
        Auth::logout();
        return redirect('/');
    }

    public function password_change_completion(){
        return view('mypage/password_change_completion');
    }
}
