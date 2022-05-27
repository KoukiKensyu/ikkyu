@extends('layouts.app')

@section('content')
<style>
    @font-face{
        font-family: ounen;
        src: url(font/Ounen-mouhitsu.otf);
    }
    .ounen{
        font-family: ounen
    }
</style>

<div class="ounen">
<div class="container "> <!--ページ全体を中央寄せ-->
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <form action="{{route('reserve.edit', $hotel[0]->id)}}" method="get">
                <h2 class="display-5"> 宿詳細【<!--{{$hotel[0]->name}}-->四季の宿　富士山】</h2> <!-- 文字大きくdisplay~-->
            </div>
            <div class="col-md-4">
                <div class="text-right ounen">
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
                <img src="https://travelzaurus.com/wp-content/uploads/2016/10/%E6%98%9F%E3%81%AE%E3%82%84%E8%BB%BD%E4%BA%95%E6%B2%A27-1024x682.jpg" class="img-fluid" alt="Wild Landscape" />
                <br>
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
                    <th scope="col">空き部屋数</th>
                    <td>{{$data}}/{{$hotel[0]->max_rooms}}部屋</td>
                    </tr>
                    </tbody><p style="line-height:2rem"></p>
                </table>
                <p style="line-height:2rem"></p>
                
                <div class="d-flex justify-content-evenly">
                    <i class="fas fa-air-freshener fa-2x" ></i>
                    <i class="fas fa-bed fa-2x"></i>
                    <i class="fas fa-broom fa-2x"></i>
                    <i class="fas fa-bus-alt fa-2x"></i>
                    <i class="fas fa-car-alt fa-2x"></i>
                 </div>
            </div>

            <p style="line-height:2rem"></p>

<!--コメント-->
            <h6> 府中市にあるホテルケヤキゲート東京府中は府中公園から徒歩6分で、市街の景色を望むお部屋と無料WiFiを提供しています。浅間山公園から2km、武蔵野の森公園から3.9km、武蔵野公園から4kmの宿泊施設です。24時間対応のフロント、荷物預かり、外貨両替サービスを提供しています。

                ホテルケヤキゲート東京府中のエアコン付きのお部屋にはデスク、ポット、冷蔵庫、セーフティボックス、薄型テレビ、専用バスルーム（シャワー付）が備わります。この宿泊施設のお部屋にはそれぞれベッドリネンとタオルが備わります。
                
                ホテルケヤキゲート東京府中ではビュッフェの朝食を毎日楽しめます。
                
                ホテルケヤキゲート東京府中のそばにはJRA競馬博物館、府中の森公園、府中市美術館などの人気観光スポットがあります。この宿泊施設から最寄りの羽田空港まで29kmです。
                
                カップルに好評のロケーション！関連クチコミスコア：8.6
                
                ホテル ケヤキゲート 東京府中がBooking.comでの予約受付を開始した日：2021年6月10日
                
                宿泊施設の説明文に記載されている距離は、© OpenStreetMapによって算出されています。</h6>
        </div>
    </div>
            <input type="hidden" name="data" value="{{$data}}">
            <div class="text-right">
                <button class="btn btn-outline-danger btn-rounded active" type="submit">予約</button>
</form>
                <button class="btn btn-outline-info btn-rounded active" onclick="location.href='/user_home/index'">戻る</button>
            </div>
</div>
</div>
@endsection