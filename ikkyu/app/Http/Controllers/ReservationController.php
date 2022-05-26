<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function create(){
        $reservation = new Reservation();
        return view('reserve/create', ['reservation' => $reservation]);
    }

    public function show($id){
        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
         $data = $_GET["aaa"];
        return view ('reserve/show', ['hotel'=>$hotel, 'data'=>$data]);
    }
    public function edit(Request $request ,$id){
        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
        $data = $request->data;
        $this->validate($request,[
            'name' => ['required','max:50'],
            
        ]);
        return view ('reserve/edit', ['hotel'=>$hotel , 'data'=>$data]);
    }
    public function check(Request $request){
        $reservation = new \App\Models\Reservation();
        $reservation->name = $request->name;
        $reservation->rooms = $request->rooms;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $hotel = DB::table('hotels')->where('id', $request->hotel_id)->get()->toArray();
        $data = $request->data;


        $is_overlapped = false;
        // pick all reservation from user id
        $reservations = DB::table('reservations')->where('user_id', Auth::user()->id)->get();
        //dd($reservations);
        foreach($reservations as $r){
            if (($r->checkin_date >= $reservation->checkin_date && $r->checkin_date <= $reservation->checkout_date) ||
            ($reservation->checkin_date >= $r->checkin_date && $reservation->checkin_date <= $r->checkout_date)){
                $is_overlapped = true;
                break;
            }
        }

        $request['is_overlapped'] = $is_overlapped;

        $this->validate($request,[
            'name' => 'required|max:50',
            'is_overlapped' => function($attribute, $value, $fail){
                if($value){
                    $fail("同じ日付で予約することはできません");
                }
            },

        ]);


        return view ('reserve/check', ['reservation' => $reservation, 'data'=>$data, 'hotel'=>$hotel, 'hotel_name' => $hotel[0]->name, 'hotel_id' => $hotel[0]->id, 'hotel_price' => $hotel[0]->price]);

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
        return view('reserve/confirm', ['reservation' => $reservation,'hotel'=>$hotel, 'user'=>$user,'user_name' => $user[0]->name, 'hotel_name' => $hotel[0]->name, 'hotel_id' => $hotel[0]->id, 'hotel_price' => $hotel[0]->price]);
    }

}
