<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

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
}
