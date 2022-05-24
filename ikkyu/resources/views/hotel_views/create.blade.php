@extends('layouts.app')

@section('content')
<h2>新規登録</h2>
<form action="{{route('hotels.postconfirm')}}" method="post">
    @csrf
    <table border='1'>
        <tbody>
            <tr>
                <td>宿名</td>
                <td><input type="text" name="name" value="{{$hotel->name}}"></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><input type="text" name="address" value="{{$hotel->address}}"></td>
            </tr>
            <tr>
                <td>宿分類</td>
                <td><select name="hotel_type" >
                <option value="0">0:シティホテル</option>
                <option value="1">1:リゾートホテル</option>
                <option value="2">2:ビジネスホテル</option>
                <option value="3">3:旅館</option>
                <option value="4">4:民宿</option>
                <option value="5">5:ペンション</option>
                </select></td>
            </tr>
            <tr>
                <td>チェックイン/チェックアウト</td>
                <td><input type="time" name="checkin_time" value="$hotel->checkin_time">/<input type="time" name="checkout_time" value="$hotel->checkout_time"></td>
            </tr>
            <tr>
                <td>部屋数</td>
                <td><input type="number" name="max_rooms" value="$hotel->max_rooms">部屋</td>
            </tr>
        </tbody>
    </table>
<button type="submit">登録確認へ</button>
<button onclick="location.href='/hotel_views/hotelManagement'">戻る</button>
</form>
@endsection