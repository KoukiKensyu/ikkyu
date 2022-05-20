<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomecontroller extends Controller
{
    public function index(){
        return view ('home/index');
    }
    public function indexMem(){
        return view ('admin/Memindex');
    }
    public function indexHotel(){
        return view ('admin/Hotelindex');
    }
    public function show(){
        return view ('reserve/show');
    }
    public function store(){
        return view ('reserve/store');
    }
    public function check(){
        return view ('reserve/check');
    }
    public function confirm(){
        return view ('reserve/confirm');
    }
}
