@extends('layouts.header')

@section('content')
<h2>管理メニュー</h2>
<button class="bot1" onclick="location.href='/admin/Memindex'">会員管理</button>
<button  class= "bot2"  onclick="location.href='/hotel_views/hotelManagement'">宿管理</button>
@endsection