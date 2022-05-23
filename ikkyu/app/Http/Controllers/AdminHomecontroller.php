<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Hotel;
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
    public function show($id){
        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
        return view ('reserve/show', ['hotel'=>$hotel]);
    }
    public function edit($id){
        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
        return view ('reserve/edit', ['hotel'=>$hotel]);
    }
    public function check(){
        return view ('reserve/check');
    }
    public function confirm(){
        return view ('reserve/confirm');
    }
    public function showHotel(){
        return view ('/hotel_views/show');
    }
    public function editHotel(){
        return view ('/hotel_views/edit');
    }

   
}
