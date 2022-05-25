<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;
use Validator;
use Auth;
class AdminLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:administrator', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('auth.administrator_login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'password' => 'required|min:8'
      ]);
      //dd($request);
      // Attempt to log the user in
      if (Auth::guard('administrator')->attempt(['name' => $request->name, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        //dd('Success');
        return redirect()->intended(route('administrator.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('name', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('administrator')->logout();
        return redirect('/');
    }

    protected function guard(){
      return Auth::guard('administrator');
    }
}
