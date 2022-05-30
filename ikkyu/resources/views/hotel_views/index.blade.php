@extends('layouts.app')

@section('content')
<h1>宿管理</h1>
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
<body>
  <div class="d-flex flex-row bd-highlight mb-3">
    <!--<div class="p-2 bd-highlight">-->
    <form action="{{route('hotels.index')}}" method="get">
            
                <!--<p>タイプ検索</p>
                <input type="checkbox"  name="hotel_type[]" id="type0" value="0">
                <label for="type0">シティホテル</label><br>
                <input type="checkbox"  name="hotel_type[]" id="type1" value="1">
                <label for="type1">リゾートホテル</label><br>
                <input type="checkbox"  name="hotel_type[]" id="type2" value="2">
                <label for="type2">ビジネスホテル</label><br>
                <input type="checkbox"  name="hotel_type[]" id="type3" value="3">
                <label for="type3">旅館</label><br>
                <input type="checkbox"  name="hotel_type[]" id="type4" value="4">
                <label for="type4">民宿</label><br>
                <input type="checkbox"  name="hotel_type[]" id="type5" value="5">
                <label for="type5">ペンション</label><br>
        </div>-->
      <div class="d-flex flex-row bd-highlight m-5">
          
      <div><p>宿名<input type="text" name="name"  placeholder="検索キーワード"></p></div>
            <!--<p class="p-2 bd-highlight"><label>分類<input type="text" name="hotel_type"></label></p>-->
      <div class="container">
      <div class="row mb-5">
      <div class="col-8">
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
        <button class="p-2 bd-highlight btn btn-outline-primary btn-rounded active" type="submit">検索</button>
        
    </form>
    <form action="{{route('hotels.create')}}">
      <button class="p-2 bd-highlight btn btn-outline-primary btn-rounded active" type="submit" onclick="location.href='/hotel_views/create'">新規登録</button>
    </form>
  </div>
  </div>
  </div>
    <table class="table">
        <thead class="bg-light">
          <tr>
            <th scope="col">宿名</th>
            <th scope="col">住所</th>
            <th scope="col">宿分類</th>
            <th scope="col">部屋数</th>
          </tr>
        </thead>
        <tbody>
          @foreach($hotels as $hotel)
          <tr>
            <th scope="row"><a href="/hotel_views/show/{{ $hotel->id }}">{{ $hotel->name }}</a></th>
            <td>{{ $hotel->address }}</td>
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
            <!-- TO DO 残り部屋数の計算-->
            <td>{{$hotel->max_rooms}}部屋</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <p>{{ $hotels->appends(Request::all())->links() }}</p>
</body>

@endsection
