@extends('layouts.app')

@section('content')
<body>
    <div class="d-flex flex-row bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <form action="{{route('hotels.index')}}" method="get">
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
        </div>
            <p class="p-2 bd-highlight"><input type="text" name="name" placeholder="宿名"></p>
            <!--<p class="p-2 bd-highlight"><label>分類<input type="text" name="hotel_type"></label></p>-->
           <button class="p-2 bd-highlight" type="submit">検索</button>
        </form>
        <form action="{{route('hotels.create')}}">
            <button class="p-2 bd-highlight" type="submit" onclick="location.href='/hotel_views/create'">新規登録</button>
        </form>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">宿名</th>
            <th scope="col">住所</th>
            <th scope="col">宿分類</th>
            <th scope="col">残り部屋数</th>
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
            <td>残り部屋数</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <p>{{ $hotels->appends(Request::all())->links() }}</p>
</body>

@endsection
