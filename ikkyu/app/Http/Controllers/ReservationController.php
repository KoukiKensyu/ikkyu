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


    public function store(Request $request){
        $reservation = $request->reservation()->create($request->all());
        $reservation->save();
        return redirect(route('confirm'));
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
        return view ('reserve/check', ['reservation' => $reservation, 'hotel_id' => $request->hotel_id]);
    }
    public function confirm(Request $request){
        $reservation = new Reservation;
        $reservation->user_id = $request->user_id;
        $reservation->plan_id = 1;// TODO change this default value
        $reservation->reserved_date = '2014-08-01 23:01:05';
        $reservation->rooms = $request->rooms;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $reservation->save();
        return view('reserve/confirm');
    }

}
