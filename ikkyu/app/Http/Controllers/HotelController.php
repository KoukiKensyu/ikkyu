<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function indexHome (){
        $hotels = \App\Models\Hotel::all();
        
        return view('/user_home/index', ['hotels' => $hotels]);
    }

public function search(Request $request)
{
    $query = Hotel::query();
    if($request->name){
        $query -> where('name', 'LIKE', '%'. $request->name. '%');
    }
    if($request->hotel_type){
        
      $query -> whereIn('hotel_type' ,$request->hotel_type);
                }
    if($request->max_rooms = 1){
        $query-> where('max_rooms','>', 0);
    }
    $hotels = $query->orderBy('max_rooms')->paginate(3);
    return view('/user_home/index', ['hotels' => $hotels]);
}
}
