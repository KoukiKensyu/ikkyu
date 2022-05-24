@extends('layouts.app')

@section('content')
<h2 class="display-6">管理メニュー</h2>
<!-- <button class="bot1" onclick="location.href='/admin/Memindex'">会員管理</button> 
<button  class= "bot2" onclick="location.href='/hotel_views/hotelManagement'" >宿管理</button>-->
<button type="button" class="btn btn-outline-primary btn-rounded active btn-lg" data-mdb-ripple-color="dark" onclick="location.href='/admin/Memindex'">会員管理</button>
<button type="button" class="btn btn-outline-primary btn-rounded active btn-lg" data-mdb-ripple-color="dark" onclick="location.href='/hotel_views/hotelManagement'">宿管理</button>
@endsection