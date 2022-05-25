@extends('layouts.app')

@section('content')
<div class="text-center">
<h2>管理メニュー</h2>
</div>
<div class="d-flex justify-content-center">
<button  class= "bot2"  onclick="location.href='/hotel_views/index'">宿管理</button>
<button class="bot1" onclick="location.href='/admin/user_index'">会員管理</button>
</div>
@endsection