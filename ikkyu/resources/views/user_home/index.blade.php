@extends('layouts.header')

@section('content')

<h1>会員ホーム</h1>
<div class="width">
    <form action="" method="post">
        <div class="height">
		<p>タイプ検索</p>
        <input type="checkbox" name="hotel_type[]" id="type1" value="">
        <label for="type1">タイプ1</label><br>
        <input type="checkbox" name="hotel_type[]" id="type2" value="">
        <label for="type2">タイプ2</label><br>
        <input type="checkbox" name="hotel_type[]" id="type3" value="">
        <label for="type3">タイプ3</label><br>
</div>

        <form action=""></form>
		<p><input type="text" name="keyword" placeholder="検索キーワード"></p>
        <p><lebel>予約日<input type="date" name="day"></label></p>
        <p><input type="text" name="rooms" placeholder="部屋数"></p>
        <button type="submit">検索</button>
</form>
</div>
<table border="1">
<tr><th>宿名</th><th>宿泊日</th><th>部屋数</th></tr>
<tr><td>宿A</td><td>〇月〇日</td><td>〇部屋</td></tr>
<tr><td>宿B</td><td>〇月〇日</td><td>〇部屋</td></tr>
</table>

@endsection