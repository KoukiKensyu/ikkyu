<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        //$hotels = \App\Models\Hotel::all(); 検索機能なし
        $query = \App\Models\Hotel::query();
        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->hotel_type) {
            $query->whereIn('hotel_type', $request->hotel_type);
        }
        $hotels = $query->orderBy('name')->paginate(5);
        return view('hotel_views/index', ['hotels' => $hotels]);
    }

    public function show($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        return view('hotel_views/show', ['hotel' => $hotel]);
    }

    public function create()
    {
        $hotel = new \App\Models\Hotel;
        return view('hotel_views/create', ['hotel' => $hotel]);
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
        $hotel->comment = $request->comment;
        return view('hotel_views/storeConfirmation', ['hotel' => $hotel]);
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
        $hotel->comment = $request->comment;
        return view('hotel_views/storeConfirmation', ['hotel' => $hotel]);
    }

    public function storeCompletion(Request $request)
    {

        $hotel = new \App\Models\Hotel;
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        $hotel->comment = $request->comment;
        $hotel->save();
        return view('/hotel_views/storeCompletion');
    }

    public function edit($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        return view('hotel_views/edit', ['hotel' => $hotel]);
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
        $hotel->comment = $request->comment;
        return view('hotel_views/editConfirmation', ['hotel' => $hotel]);
    }

    public function editCompletion(Request $request, $id)
    {
        $hotel = \App\Models\Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        $hotel->comment = $request->comment;
        $hotel->save();
        return view('hotel_views/editCompletion', ['hotel' => $hotel]);
    }

    public function hetels_delete($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        return view('hotel_views/hotelDelete', ['hotel' => $hotel]);
    }

    public function destroy($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        $hotel->delete();
        return redirect('hotel_views/index');
    }
    public function search(Request $request)
    {
        $query = \App\Models\Hotel::query();
        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->hotel_type) {

            $query->whereIn('hotel_type', $request->hotel_type);
        }
        if ($request->max_rooms = 1) {
            $query->where('max_rooms', '>', 0);
        }
        $hotels = $query->orderBy('max_rooms')->paginate(5);
        return view('/user_home/index', ['hotels' => $hotels]);
    }
}
