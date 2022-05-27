<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \DateTime;
use \DateInterval;
use \DatePeriod;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

//validation ignore用
use Illuminate\Validation\Rule;

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
        $query2 = \App\Models\Reservation::query();
        if ($request->checkin_date){
            $query2->where('checkin_date','=', $request->checkin_date);
        }
        $reservations = $query2;
        $remainRooms = '2';
        return view('hotel_views/index', ['hotels' => $hotels ,'reservations' => $reservations, 'remainRooms' => $remainRooms]);
    }

    public function show($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        return view('hotel_views/show', ['hotel' => $hotel]);
    }

    public function create(Request $request)
    {   
        $name = "";
        $address = "";
        $checkin = "";
        $checkout = "";
        $room = "";
        $price = "";
        $comment = "";

        if ($request->has('return')) {
            $checkin = $request->checkin_time;
            $checkout = $request->checkout_time;
            $name = $request->name;
            $address = $request->address;
            $room = $request->max_rooms;
            $price = $request->price;
            $comment = $request->comment;
        }
        $hotel = new \App\Models\Hotel;
        return view('hotel_views/create', ['hotel' => $hotel,'name' => $name,'address'=>$address,'room'=>$room,'price'=>$price,'comment'=>$comment ,'checkin'=>$checkin, 'checkout'=>$checkout]);
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
        $hotel->price = $request->price;
        $hotel->comment = $request->comment;
        $this->validate($request,[
            'name' => 'required|max:50|unique:hotels',
            'hotel_type' => 'required',
            'address' => 'required|max:100',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
            'max_rooms' => 'required',
            'comment' => 'nullable|max:500',
        ]);
        $is_overlapped = false;
        $is_overlapped2 = false;
            if ($hotel->price < 1){
                $is_overlapped = true;
            }
            if ($hotel->max_rooms < 1){
                $is_overlapped2 = true;
            }

        $request['is_overlapped'] = $is_overlapped;
        $request['is_overlapped2'] = $is_overlapped2;

        $this->validate($request,[
            'is_overlapped' => function($attribute, $value, $fail){
                if($value){
                    $fail("金額は0より大きくしてください");
                }
            },
            'is_overlapped2' => function($attribute, $value, $fail){
                if($value){
                    $fail("部屋数は0より大きくしてください");
                }
            },

        ]);
        $this->validate($request,[
            'is_overlapped2' => function($attribute, $value, $fail){
                if($value){
                    $fail("部屋数は0より大きくしてください");
                }
            },

        ]);
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
        $hotel->price = $request->price;
        $hotel->comment = $request->comment;
        return view('hotel_views/storeConfirmation', ['hotel' => $hotel]);
    }

    public function storeCompletion(Request $request)
    {
        if ($request->has('return')) {
            return view('hotel_views/create',['hotel' => $request]);
        }

        $hotel = new \App\Models\Hotel;
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        $hotel->price = $request->price;
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
        $hotel->price = $request->price;
        $hotel->comment = $request->comment;
        $this->validate($request,[
            'name' => ['required','max:50',Rule::unique('hotels')->ignore($hotel->id)],
            'hotel_type' => 'required',
            'address' => 'required|max:100',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
            'max_rooms' => 'required',
            // 'price' => ['required','min:1'],
            'comment' => 'nullable|max:500',
        ]);

        $is_overlapped = false;
        $is_overlapped2 = false;
            if ($hotel->price < 1){
                $is_overlapped = true;
            }
            if ($hotel->max_rooms < 1){
                $is_overlapped2 = true;
            }

        $request['is_overlapped'] = $is_overlapped;
        $request['is_overlapped2'] = $is_overlapped2;

        $this->validate($request,[
            'is_overlapped' => function($attribute, $value, $fail){
                if($value){
                    $fail("金額は0より大きくしてください");
                }
            },
            'is_overlapped2' => function($attribute, $value, $fail){
                if($value){
                    $fail("部屋数は0より大きくしてください");
                }
            },

        ]);
        $this->validate($request,[
            'is_overlapped2' => function($attribute, $value, $fail){
                if($value){
                    $fail("部屋数は0より大きくしてください");
                }
            },

        ]);
        return view('hotel_views/editConfirmation', ['hotel' => $hotel]);
    }

    public function editCompletion(Request $request, $id)
    {
        if ($request->has('return')) {
            return view('hotel_views/edit',['hotel' => $request]);
        }

        $hotel = \App\Models\Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->address = $request->address;
        $hotel->checkin_time = $request->checkin_time;
        $hotel->checkout_time = $request->checkout_time;
        $hotel->max_rooms = $request->max_rooms;
        $hotel->price = $request->price;
        $hotel->comment = $request->comment;
        $hotel->save();
        return view('hotel_views/editCompletion', ['hotel' => $hotel]);
    }

    public function hotels_delete($id)
    {
        $hotel = \App\Models\Hotel::find($id);
        $reservation = DB::table('reservations')->where('hotel_id',$hotel->id)->get();
        $i=0;
        foreach($reservation as $reserve){
        $user =  DB::table('users')->where('id',$reserve->user_id)->get();
        $reservation[$i]->name=$user[0]->name;
        $i++;
        }
        return view('hotel_views/hotelDelete', ['hotel' => $hotel,'reservations' => $reservation]);
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

        $begin = new DateTime($request->checkin_date);
        $end = new DateTime($request->checkout_date);
        $interval = new DateInterval('P1D');
        $period = new DatePeriod($begin, $interval, $end);
        $hotels = $query->orderBy('max_rooms')->get();
        $result_hotels = array();
        $result_rooms = array();
        $is_hotel_full = false;

        foreach($hotels as $hotel){
            // 期間内に予約できる最大の部屋数
            $min_rooms = $hotel->max_rooms;
            $is_hotel_full = false;
            foreach($period as $dt){
                $max_rooms = $hotel->max_rooms;
                // 各ホテルの予約日が一致する予約を取得
                $reservations = Reservation::where('checkin_date', '<=', $dt)->where('checkout_date', '>=', $dt)->where('hotel_id', '=', $hotel->id)->get();
                foreach($reservations as $reservation){
                    $max_rooms -= $reservation->rooms;
                    // 部屋数が足りないならこのホテルは表示しない
                    if($max_rooms <= 0){
                        $is_hotel_full = true;
                        $max_rooms = 0;
                        break;
                    }
                }
                if($is_hotel_full){
                    break;
                }
                if($max_rooms < $min_rooms){
                    $min_rooms = $max_rooms;
                }
            }
            if(!$is_hotel_full){
                $result_hotels[] = $hotel;
                $result_rooms[] = $min_rooms;
            }
        }

        $paginated_hotel = $this->paginate($result_hotels, 5, null, ['path' => Paginator::resolveCurrentPath()]);

        $is_overlapped = false;
            if ($begin > $end){
                $is_overlapped = true;
            }

        $request['is_overlapped'] = $is_overlapped;

        $this->validate($request,[
            'is_overlapped' => function($attribute, $value, $fail){
                if($value){
                    $fail("日付が間違っています");
                }
            },

        ]);

        return view('/user_home/index', ['hotels' => $paginated_hotel, 'remaining_rooms' => $result_rooms]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

}
