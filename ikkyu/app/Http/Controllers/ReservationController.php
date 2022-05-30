<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Validation\Rule;
use \DateTime;

class ReservationController extends Controller
{
    public function create(){
        $reservation = new Reservation();
        return view('reserve/create', ['reservation' => $reservation]);
    }

    public function show($id){
        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
         $data = $_GET["aaa"];
         $bbb = $_GET["bbb"];
         $ccc = $_GET["ccc"];
         if($bbb === ""){
             $bbb = "未入力";
         }
         if($ccc === ""){
            $ccc = "未入力";
        }
        return view ('reserve/show', ['hotel'=>$hotel, 'data'=>$data,'bbb'=>$bbb,'ccc'=>$ccc]);
    }
    public function edit(Request $request ,$id){
        $checkin = $request->bbb;
        $checkout = $request->ccc;

        if ($request->has('return')) {
            $checkin = $request->checkin_date;
            $checkout = $request->checkout_date;
        }

        $hotel = DB::table('hotels')->where('id', $id)->get()->toArray();
        $data = $request->data;
        $bbb = $request->bbb;
        $ccc = $request->ccc;
        return view ('reserve/edit', ['hotel'=>$hotel , 'data'=>$data,'bbb'=>$bbb,'ccc'=>$ccc, 'checkin'=>$checkin, 'checkout'=>$checkout]);
    }
    public function check(Request $request){
        $reservation = new \App\Models\Reservation();
        $reservation->name = $request->name;
        $reservation->rooms = $request->rooms;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $hotel = DB::table('hotels')->where('id', $request->hotel_id)->get()->toArray();
        $data = $request->data;
        $bbb = $request->bbb;
        $ccc = $request->ccc;


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
        $begin = new DateTime($request->checkin_date);
        $end = new DateTime($request->checkout_date);
        if ($begin >= $end){
            $is_overlapped = true;
        }

        $request['is_overlapped'] = $is_overlapped;

        $this->validate($request,[
            'name' => 'required|max:50',
            'is_overlapped' => function($attribute, $value, $fail){
                if($value){
                    $fail("ほかの予約と日付が重複しているかチェックアウト日が間違っています");
                }
            },

        ]);
        $day = $end->diff($begin);

        return view ('reserve/check', ['reservation' => $reservation, 'data'=>$data,'bbb'=>$bbb,'ccc'=>$ccc, 'hotel'=>$hotel, 'hotel_name' => $hotel[0]->name, 'hotel_id' => $hotel[0]->id, 'hotel_price' => $hotel[0]->price, 'day'=>$day]);

    }
    public function confirm(Request $request){
        $reservation = new Reservation;
        $reservation->user_id = $request->user_id;
        $reservation->hotel_id = $request->hotel_id;// TODO change this default value
        $reservation->reserved_date = now();
        $reservation->rooms = $request->rooms;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = $request->checkout_date;
        $reservation->save();
        $price = $request->R_price; 
        $user = DB::table('users')->where('id', $request->user_id)->get()->toArray();
        $hotel = DB::table('hotels')->where('id', $request->hotel_id)->get()->toArray();
        return view('reserve/confirm', ['reservation' => $reservation,'price'=>$price,'hotel'=>$hotel, 'user'=>$user,'user_name' => $user[0]->name, 'hotel_name' => $hotel[0]->name, 'hotel_id' => $hotel[0]->id, 'hotel_price' => $hotel[0]->price]);
    }
    public function cancel_confirmation($id)
    {
        //dd($id);
        $reservation = DB::table('reservations')->where('id',$id)->get();
        $hotel = DB::table('hotels')->where('id',$reservation[0]->hotel_id)->get();
        //dd($hotel);
        $reservation[0]->name=$hotel[0]->name;
        $reservation[0]->price=$hotel[0]->price;
        //dd($reservation);
        $begin = new DateTime($reservation[0]->checkin_date);
        $end = new DateTime($reservation[0]->checkout_date);

        $day = $end->diff($begin);

        $reservation[0]->day=$day;
        return view('mypage/cancel', ['reservations' => $reservation]);
    }

    public function reserve_cancel(Request $request)
    {
        //dd($request->id);
        //$reservation = DB::table('reservations')->where('id',$request->id)->first();
        $reservation = \App\Models\Reservation::find($request->id);
        //dd($reservation);
        $reservation->delete();
        return view('/mypage/cancel_result');
    }
    
}
