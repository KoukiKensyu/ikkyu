<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function create(){
        $reservation = new Reservation();
        return view('reserve/create', ['reservation' => $reservation]);
    }

    public function show($id){
        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
        return view ('reserve/show', ['hotel'=>$hotel]);
    }
    public function edit($id){
        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
        return view ('reserve/edit', ['hotel'=>$hotel]);
    }
    public function check(Request $request){
        $reservation = new \App\Models\Reservation();
        $reservation->name = $request->name;
        $reservation->rooms = $request->rooms;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $hotel = DB::table('hotels')->where('id', $request->hotel_id)->get()->toArray();
        return view ('reserve/check', ['reservation' => $reservation,'hotel'=>$hotel, 'hotel_name' => $hotel[0]->name, 'hotel_id' => $hotel[0]->id]);

    }
    public function confirm(Request $request){
        $reservation = new Reservation;
        $reservation->user_id = $request->user_id;
        $reservation->hotel_id = $request->hotel_id;// TODO change this default value
        $reservation->reserved_date = '2014-08-01 23:01:05';
        $reservation->rooms = $request->rooms;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $reservation->save();
        $user = DB::table('users')->where('id', $request->user_id)->get()->toArray();
        $hotel = DB::table('hotels')->where('id', $request->hotel_id)->get()->toArray();
        return view('reserve/confirm', ['reservation' => $reservation,'hotel'=>$hotel, 'user'=>$user,'user_name' => $user[0]->name, 'hotel_name' => $hotel[0]->name, 'hotel_id' => $hotel[0]->id]);
    }

}
