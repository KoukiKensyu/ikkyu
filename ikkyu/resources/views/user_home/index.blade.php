@extends('layouts.app')

@section('content')
<a href="../mypage/index">マイページ</a>
<h1>会員ホーム</h1>
<!-- <div class="width"> -->
    <form action="{{route('search')}}" method="get">
        <!-- <div class="height">header.blade.phpに縦・横に並べるcssがある -->
		<p>タイプ検索</p>
        <input type="checkbox" name="hotel_type[]" id="type0" value="0">
        <label for="type0">シティホテル</label><br>
        <input type="checkbox" name="hotel_type[]" id="type1" value="1">
        <label for="type1">リゾートホテル</label><br>
        <input type="checkbox" name="hotel_type[]" id="type2" value="2">
        <label for="type2">ビジネスホテル</label><br>
        <input type="checkbox" name="hotel_type[]" id="type3" value="3">
        <label for="type3">旅館</label><br>
        <input type="checkbox" name="hotel_type[]" id="type4" value="4">
        <label for="type4">民宿</label><br>
        <input type="checkbox" name="hotel_type[]" id="type5" value="5">
        <label for="type5">ペンション</label><br>
        
<!-- </div> -->

		<p>宿名<input type="text" name="name" value="{{request('name')}}" placeholder="検索キーワード"></p>
        <!-- <p><lebel>予約日<input type="date" name="day"></label></p> -->
        <p><label ><input type="checkbox" name="max_rooms" value="1">満室を除く</label></p>
        <button type="submit">検索</button>

</form>




</div>
<form action="">
<table border="1">
<tr><th>宿名</th><th>宿タイプ</th><th>部屋数</th></tr>
@foreach ($hotels as $hotel)
<tr><td><a href="/reserve/show/{{$hotel->id}}">{{$hotel->name}}</a></td>
    @if($hotel->hotel_type == 0)
        <td>シティホテル</td>
       
    @elseif($hotel->hotel_type == 1)
        <td>リゾートホテル</td>
   
    @elseif($hotel->hotel_type == 2)
        <td>ビジネスホテル</td>
        
    @elseif($hotel->hotel_type == 3)
        <td>旅館</td>
       
    @elseif($hotel->hotel_type == 4)
        <td>民宿</td>
        
    @elseif($hotel->hotel_type == 5)
        <td>ペンション</td>
        
        @endif
<td>{{$hotel->max_rooms}}</td></tr>
@endforeach
</table>

</form>
<p>{{ $hotels->appends(Request::all())->links() }}</p>
@endsection