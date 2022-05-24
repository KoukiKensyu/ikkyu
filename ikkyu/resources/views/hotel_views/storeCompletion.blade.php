@extends('layouts.app')

@section('content')
<h2>登録が完了しました</h2>

<button onclick="location.href='/hotel_views/create'">続けて登録</button>
<button onclick="location.href='/hotel_views/hotelManagement'">一覧へ</button>
@endsection