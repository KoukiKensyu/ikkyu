@extends('layouts.app')

@section('content')
<h2>新規登録</h2>
<form action="{{route('hotels.store')}}"></form>
<table border='1'>
    <tbody>
        <tr>
        <td>宿名</td>
        <td>{{ $hotel->name }}</td>
        </tr>
        <tr>
        <td>住所</td>
        <td>{{ $hotel->address }}</td>
        </tr>
        <tr>
        <td>宿分類</td>
        <td>{{ $hotel->hotel_type }}</td>
        </tr>
        <tr>
        <tr>
        <td>チェックイン/チェックアウト</td>
        <td>{{ $hotel->checkin_time }}/{{ $hotel->checkout_time }}</td>
        </tr>
        <tr>
        <td>部屋数</td>
        <td>{{ $hotel->max_rooms }}</td>
        </tr>
    </tbody>
</table>
<p>この内容で登録しますか？</p>
<button onclick="location.href='/hotel_views/storeCompletion'">確定</button>
<button onclick="location.href='/hotel_views/store'">戻る</button>
@endsection