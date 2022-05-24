<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        //$hotels = \App\Models\Hotel::all(); 検索機能なし
        $query = \App\Models\Hotel::query();
        if($request->name){
                $query -> where('name', 'LIKE', '%'. $request->name. '%');
                }
        if($request->hotel_type){
            $query -> whereIn('hotel_type' ,$request->hotel_type);
        }
        $hotels = $query->orderBy('name')->paginate(5);
        return view('hotel_views/hotelManagement',['hotels' => $hotels]);
    }

    public function show($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        return view('hotel_views/show',['hotel'=> $hotel]);
    }

    public function create()
    {
        return view('hotel_views/create');
    }

    public function postconfirm(Request $request)
    {
        $hotel = new \App\Models\Hotel;
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        return view('hotel_views/storeConfirmation',['hotel'=>$hotel]);

    }

    public function createconfirm(Request $request)
    {
        $hotel = new \App\Models\Hotel;
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        return view('hotel_views/storeConfirmation',['hotel'=>$hotel]);
    }

    public function store(Request $request)
    {
        $hotel = new \App\Models\Hotel;
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        $hotel->save();
        return redirect(route('hotels.index'));
    }

    public function edit($id)
    {
        $hotel =\App\Models\Hotel::find($id);
        return view('hotel_views/edit',['hotel'=> $hotel]);
    }

    public function editconfirm(Request $request, $id)
    {
        $hotel = \App\Models\Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        return view('hotel_views/editConfirmation', ['hotel' => $hotel]);

    }

    public function update(Request $request, $id)
    {
        $hotel = \App\Models\Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        $hotel->save();
        return view('hotel_views/editCompletion', ['hotel' => $hotel]);
    }

    public function destroyconfirm($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        return view('hotel_views/hotelDelete', ['hotel' => $hotel]);
    }

    public function destroy($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        $hotel->delete();
        return redirect('hotel_views/hotelManagement');
        
    }

}
