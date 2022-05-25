@extends('layouts.app')

@section('content')
<a href="../mypage/index">マイページ</a>
<h1>会員ホーム</h1>
<!-- <div class="width"> -->
<div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2 bd-highlight m-5  dropdown">
    <form action="{{route('search')}}" method="get">
<<<<<<< HEAD
        <div class="row">
            <div class="col-md-8">
                <p>宿名<input type="text" name="name" value="{{request('name')}}" placeholder="検索キーワード"></p>
                <button type="button" class="btn btn-outline-primary">search</button>
              <!-- <div class="height"> -->
		<div class="col-md-6">
        <table class="table">
            <tr><th><p>タイプ検索</p></th><td></td></tr>
            <tr><th scope="col"><div class="form-check">
                <input type="checkbox" name="hotel_type[]" id="type0" value="0">
                </div></th>
                <td><label for="type0">シティホテル</label></td>
            </tr>
            <tr><th scope="col"><div class="form-check">
                <input type="checkbox" name="hotel_type[]" id="type1" value="1">
                </div></th>  
                <td><label for="type1">リゾートホテル</label></td>
            </tr>
            <tr><th scope="col"><div class="form-check">
                <input type="checkbox" name="hotel_type[]" id="type2" value="2">
            </div></th><td>
                <label for="type2">ビジネスホテル</label></td>
            </tr>
            <tr><th scope="col"><div class="form-check">
                <input type="checkbox" name="hotel_type[]" id="type3" value="3">
            </div></th><td>
                <label for="type3">旅館</label></td>
            </tr>
            <tr><th scope="col"><div class="form-check">
                <input type="checkbox" name="hotel_type[]" id="type4" value="4">
            </div></th><td>
                <label for="type4">民宿</label><br>
            </tr>
            <tr><th scope="col"><div class="form-check">
                <input type="checkbox" name="hotel_type[]" id="type5" value="5">
            </div></th><td>
            <label for="type5">ペンション</label><br>
        </tr>
    </table>
        </div><!--coslmd6のend-->

        
<!-- </div> -->

        <!-- <p><lebel>予約日<input type="date" name="day"></label></p> -->
    <div class="col-md-6">   
        <table class="table">
            <tr><th scope="col"><div class="form-check"></th>
        <td><p><label ><input type="checkbox" name="max_rooms" value="1">満室を除く</label></p>
            </td></tr></table>
    </div>
</div>

=======
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
		<p>宿名<input type="text" name="name" value="{{request('name')}}" placeholder="検索キーワード"></p>
        <!-- <p><lebel>予約日<input type="date" name="day"></label></p> -->
        <p><label ><input type="checkbox" name="max_rooms" value="1">満室を除く</label></p>
        <button class="p-2 bd-highlight btn btn-outline-primary btn-rounded active h-50" type="submit">検索</button>
</div>
>>>>>>> bec4e986b29126791cd244c53af263602204f229
</form>
</div>

<!-- <style>.table td.fit, 
.table th.fit {
    white-space: nowrap;
    width: 1%;
}
table.table-fit {
    width: auto !important;
    table-layout: auto !important;
}
table.table-fit thead th, table.table-fit tfoot th {
    width: auto !important;
}
table.table-fit tbody td, table.table-fit tfoot td {
    width: auto !important;
}
</style> -->


</div>
<form action="">
<<<<<<< HEAD
<table border="1"class="table">
<tr><th>宿名</th><th>宿タイプ</th><th>部屋数</th></tr>
=======
    
<table class="table table-hover ">
<thead>
<tr><th style="width: 10%;"></th><th style="width: 10%;"></th><th>宿名</th><th>宿タイプ</th><th>部屋数</th></tr>
</thead>
<tbody class="table-hover">
>>>>>>> bec4e986b29126791cd244c53af263602204f229
@foreach ($hotels as $hotel)
<tr>
   
    @if($hotel->id < 6 )
    <td><img src="/images/{{$hotel->id}}.jpg" width="163" height="130" alt=""></td>
    @else<td><img src="/images/6.jpg" width="163" height="130" alt=""></td>
    @endif
    <td>{{$hotel->comment}}</td>
    <td><a href="/reserve/show/{{$hotel->id}}">{{$hotel->name}}</a></td>
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
</tbody>
</table>
</div>

</form>
<p>{{ $hotels->appends(Request::all())->links() }}</p>
</div>
@endsection