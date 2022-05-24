<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Hotel;
class AdminHomecontroller extends Controller
{
    public function index(){
        return view ('home/index');
    }
    public function indexMem(){
        return view ('admin/user_index');
    }
    public function indexHotel(){
        return view ('admin/Hotelindex');
    }
    public function editHotel(){
        return view ('/hotel_views/edit');
    }
   
}
