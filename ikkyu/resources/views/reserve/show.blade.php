@extends('layouts.app')

@section('content')
<!--<style>
    @font-face{
        font-family: ounen;
        src: url(font/Ounen-mouhitsu.otf);
    }
    .ounen{
        font-family: ounen
    }
</style>

<div class="ounen">-->

<div class="container "> <!--ページ全体を中央寄せ-->
    <form action="{{route('reserve.edit', $hotel[0]->id)}}" method="get">
        <div class="container">
            <div class="row ">
                <div class="col-md-8">
                    <h2 class="display-5"> 宿詳細【{{$hotel[0]->name}}】</h2> <!-- 文字大きくdisplay~-->
                </div>

                <div class="col-md-4"> <!-- 右側にボタン-->
                    <div class="text-right">
                        <button class="btn btn-outline-danger btn-rounded active" type="submit">予約</button>
                        
                        <button type="button" class="btn btn-outline-info btn-rounded active" onclick="location.href='/user_home/index'">戻る</button>
                    </div>
                </div>
                <p style="line-height:2rem"></p>
                <p style="line-height:2rem"></p>
            </div>
        </div>
            
                    
        <div class="d-flex justify-content-center">
            <div class="row ">

            <!--宿画像-->
                <div class="col-md-6">
                        <img src="/images/{{$hotel[0]->id}}.jpg"  class="img-fluid" alt="Wild Landscape">
                        
                    <br>
                    <p style="line-height:2rem">
                </div>
                
            <!--テーブル-->
                <div class="col-md-6">
                    <p style="line-height:2rem">
                    <table border='1' class="table table-bordered"  >
                        <tbody>
                        <tr>
                        <th scope="col">宿名</th>
                        <td>{{$hotel[0]->name}}</td>
                        </tr>
                        <tr>
                        <th scope="col">住所</th>
                        <td>{{$hotel[0]->address}}</td>
                        </tr>
                        <tr>
                        <th scope="col">チェックイン/チェックアウト</th>
                        <td>{{$hotel[0]->checkin_time}}/{{$hotel[0]->checkout_time}}</td>
                        </tr>
                        <tr>
                        <th scope="col">金額/部屋</th>
                        <td>{{$hotel[0]->price}}円/部屋</td>
                        </tr>
                        <tr>
                            <th>空き部屋検索日程</th>
                            <td>{{$bbb}}～{{$ccc}}</td>
                        </tr>
                        <tr>
                        <th scope="col">空き部屋数</th>
                        <td>{{$data}}/{{$hotel[0]->max_rooms}}部屋</td>
                        </tr>
                        </tbody><p style="line-height:2rem"></p>
                    </table>
                    <p style="line-height:2rem"></p>
                    
                    <!--<div class="d-flex justify-content-evenly">
                        <table border='1' class="table  table-borderless"  >
                        <tr><td><i class="fas fa-air-freshener fa-2x" ></i></td><td>掃除付き</td>
                        <i class="fas fa-bed fa-2x"></i>
                        <i class="fas fa-broom fa-2x"></i>
                        <i class="fas fa-bus-alt fa-2x"></i>
                        <i class="fas fa-car-alt fa-2x"></i>
                        <p>駐車場有・掃除付き</p>
                        </table>

                    </div>-->
                </div>

                <p style="line-height:2rem"></p>

    <!--コメント-->
                <h6> {{$hotel[0]->comment}}</h6>
            </div>
        </div>


                <input type="hidden" name="data" value="{{$data}}">
                <input type="hidden" name="bbb" value="{{$bbb}}">
                <input type="hidden" name="ccc" value="{{$ccc}}">
                <!--<div class="text-right">
                <button class="btn btn-outline-danger btn-rounded active" type="submit">予約</button>-->
    </form>
<!--                <button class="btn btn-outline-info btn-rounded active" onclick="location.href='/user_home/index'">戻る</button>
            </div>-->
</div>
</div>

<!-- <h2>宿詳細</h2>
    <form action="{{route('reserve.edit', $hotel[0]->id)}}" method="get">
        <table border='1' class="table table-bordered" >
            <tbody>
                <tr>
                <th scope="col">宿名</th>
                <td>{{$hotel[0]->name}}</td>
                </tr>
                <tr>
                <th scope="col">住所</th>
                <td>{{$hotel[0]->address}}</td>
                </tr>
                <tr>
                <th scope="col">チェックイン/チェックアウト</th>
                <td>{{$hotel[0]->checkin_time}}/{{$hotel[0]->checkout_time}}</td>
                </tr>
                <tr>
                <th scope="col">金額/部屋</th>
                <td>{{$hotel[0]->price}}円/部屋</td>
                </tr>
                <tr>
                    <th>空き部屋検索日程</th>
                    <td>{{$bbb}}～{{$ccc}}</td>
                </tr>
                <tr>
                <th scope="col">空き部屋</th>
                <td>{{$data}}/{{$hotel[0]->max_rooms}}</td>
                </tr>
            </tbody>
        </table> -->
        
<!--<div class="d-flex justify-content-end text-right">
        <button class="btn btn-outline-danger btn-rounded active" type="submit">予約</button>
    </form>
    <button type="button" class="btn btn-outline-info btn-rounded active" onclick="location.href='/user_home/index'">戻る</button>
</div>-->
@endsection