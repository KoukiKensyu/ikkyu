@extends('layouts.app')

@section('content')
<!--<a href="../mypage/index">マイページ</a>-->
<!-- Jumbotron 
<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');"
>
  <h1 class="mb-3 h2">会員ホーム</h1>

  <p>
    宿泊予約ならひとやすみ<br>
    老舗旅館からビジネスホテルまで簡単検索
  </p>
</div>
 Jumbotron -->
<h1>会員ホーム</h1>
@include('commons/flash')
<style>
    .modal-body{
    margin: 16px auto;
    text-align: center;
    display: block;
}
.form-check-input{
    text-align: left;
    display: inline-block;
}
.btn-outline-primary{
    width: 150px;
    height: 45px;
}
</style>
<!-- <div class="width"> -->
    <div class="d-flex flex-row bd-highlight mb-3">
    <form action="{{route('search')}}" method="get">

            <?php $today = \Carbon\Carbon::now()->format("Y-m-d");?>
    <!-- </div> -->
    <div class="d-flex flex-row bd-highlight m-5">
            <div><p>宿名<input type="text" name="name" value="{{request('name')}}" placeholder="検索キーワード"></p></div>
            <div><p>チェックイン<input type="date" min="{{$today}}" name="checkin_date" value="{{request('checkin_date')}}" required></p></div>
            <div><p>チェックアウト<input type="date" min="{{$today}}" name="checkout_date" value="{{request('checkout_date')}}" required></p></div>
            
    <div class="container">
            <div class="row mb-5">
                <div class="col-5">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testModal">タイプ検索</button>
                </div>
                
            </div>
        </div>
    <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><class="modal-title" id="myModalLabel">宿タイプを検索してください</p>
                    </div>
                    <div class="modal-body">
                    <label for="type0"> <input class="form-check-input" type="checkbox" name="hotel_type[]" id="type0" value="0">
                    シティホテル　<br></label><br>
                    <label for="type1"><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type1" value="1">
                    リゾートホテル<br></label><br>
                    <label for="type2"><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type2" value="2">
                    ビジネスホテル<br></label><br>
                    <label for="type3"><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type3" value="3">
                    旅館　　　　　<br></label><br>
                    <label for="type4"><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type4" value="4">
                    民宿　　　　　<br></label><br>
                    <label for="type5"><input class="form-check-input" type="checkbox" name="hotel_type[]" id="type5" value="5">
                    ペンション　　<br></label><br>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
            <button class=" bd-highlight btn btn-outline-primary btn-rounded active " type="submit">検索</button>
    </div>
    </form>
    </div>
    </div>
    <form action="">
    <div class="table-responsive">
    <table class="table table-hover align-middle">
    <thead class="bg-light">
    <tr><!--<th style="width: 10%;"></th>--><th style="width: 20%;"></th><th>宿名</th><th>宿タイプ</th><th>部屋数</th></tr>
    </thead>
    @foreach ($hotels as $key=>$hotel)
    <?php  $remainRooms = $remaining_rooms[$key];?>    
    <style>
        a {display:block;}
    </style>
    @if($remainRooms >= 1)
    <tbody class=" align-middle ">

    <tr class="align-middle ">
        <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}&bbb={{request('checkin_date')}}&ccc={{request('checkout_date')}}">
        @if($hotel->id < 8 )
        <img src="/images/{{$hotel->id}}.jpg" width="163" height="130" alt="">
        @else<img src="/images/6.jpg" width="163" height="130" alt="">
        @endif
        </a></td>
        <!--<td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}&bbb={{request('checkin_date')}}&ccc={{request('checkout_date')}}"><?php echo nl2br($hotel->comment); ?></a></td>-->
        <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}&bbb={{request('checkin_date')}}&ccc={{request('checkout_date')}}" class="text-primary font-weight-bold fs-5">{{$hotel->name}}</a></td>
        <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}&bbb={{request('checkin_date')}}&ccc={{request('checkout_date')}}">
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


    <td><a href="/reserve/show/{{$hotel->id}}.php?aaa={{$remainRooms}}&bbb={{request('checkin_date')}}&ccc={{request('checkout_date')}}">{{$remainRooms .'部屋/'. $hotel->max_rooms .'部屋'}}</a></td></tr>
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