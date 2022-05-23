@extends('layouts.app')

@section('content')
<body>
    <div class="d-flex flex-row bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <form action="" method="post">
                <p>タイプ検索</p>
                <input type="checkbox" name="hotel_type[]" id="type1" value="">
                <label for="type1">タイプ1</label><br>
                <input type="checkbox" name="hotel_type[]" id="type2" value="">
                <label for="type2">タイプ2</label><br>
                <input type="checkbox" name="hotel_type[]" id="type3" value="">
                <label for="type3">タイプ3</label><br>
            </form>
        </div>
        <form action="">
            <p class="p-2 bd-highlight"><input type="text" name="keyword" placeholder="宿名"></p>
            <p class="p-2 bd-highlight"><label>分類<input type="text" name="hotel_type"></label></p>
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
            <th scope="col">分類</th>
            <th scope="col">残り部屋数</th>
          </tr>
        </thead>
        <tbody>
          @foreach($hotels as $hotel)
          <tr>
            <th scope="row"><a href="/hotel_views/{{ $hotel->id }}">{{ $hotel->name }}</a></th>
            <td>{{ $hotel->address }}</td>
            <td>{{ $hotel->hotel_type }}</td>
            <td>残り部屋数</td> <!--計算-->
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
@endsection
