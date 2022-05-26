@extends('layouts.app')

@section('content')
<!--<a href="../mypage/index">マイページ</a>-->
<h1>会員ホーム</h1>
<!-- <div class="width"> -->
<div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2 bd-highlight m-5  dropdown">
    <form action="{{route('search')}}" method="get">
        <!-- <div class="height">header.blade.phpに縦・横に並べるcssがある -->
		<!-- <p>タイプ検索</p> -->
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    タイプ検索</button>
    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
        <li><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type0" value="0">
        <label for="type0">シティホテル</label></li>
        <li><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type1" value="1">
        <label for="type1">リゾートホテル</label></li>
        <li><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type2" value="2">
        <label for="type2">ビジネスホテル</label></li>
        <li><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type3" value="3">
        <label for="type3">旅館</label></li>
        <li><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type4" value="4">
        <label for="type4">民宿</label></li>
        <li><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type5" value="5">
        <label for="type5">ペンション</label></li>
    </ul>
    </div>
        
<!-- </div> -->
<div class="d-flex flex-row bd-highlight m-5">
		<div><p>宿名<input type="text" name="name" value="{{request('name')}}" placeholder="検索キーワード"></p></div>
        <div><p>チェックイン<input type="date" name="checkin_date" value="{{request('checkin_date')}}" required></p></div>
        <div><p>チェックアウト<input type="date" name="checkout_date" value="{{request('checkout_date')}}" required></p></div>
        <button class="p-2 bd-highlight btn btn-outline-primary btn-rounded active h-50" type="submit">検索</button>
</div>
</form>
</div>
</div>
<form action="">
<div class="table-responsive">
<table class="table table-hover align-middle">
<thead>
<tr><th style="width: 10%;"></th><th style="width: 20%;"></th><th>宿名</th><th>宿タイプ</th><th>部屋数</th></tr>
</thead>
@foreach ($hotels as $key=>$hotel)
<?php  $remainRooms = $remaining_rooms[$key];?>    
<style>
    a {display:block;}
</style>
@if($remainRooms >= 1)
<tbody class=" align-middle ">

<tr class="align-middle ">
    <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}">
    @if($hotel->id < 6 )
    <img src="/images/{{$hotel->id}}.jpg" width="163" height="130" alt="">
    @else<img src="/images/6.jpg" width="163" height="130" alt="">
    @endif
    </a></td>
    <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}"><?php echo nl2br($hotel->comment); ?></a></td>
    <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}" class="text-primary">{{$hotel->name}}</a></td>
    <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}">
    @if($hotel->hotel_type == 0)
        シティホテル
       
    @elseif($hotel->hotel_type == 1)
        リゾートホテル
   
    @elseif($hotel->hotel_type == 2)
        ビジネスホテル
        
    @elseif($hotel->hotel_type == 3)
        旅館
       
    @elseif($hotel->hotel_type == 4)
        民宿
        
    @elseif($hotel->hotel_type == 5)
        ペンション
        
        @endif</a></td>


<td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}">{{$remainRooms .'部屋/'. $hotel->max_rooms .'部屋'}}</a></td></tr>
@endif
@endforeach
</tbody>
</table>
</div>
</div>

</form>
<p>{{ $hotels->appends(Request::all())->links() }}</p>
</div>
@endsection