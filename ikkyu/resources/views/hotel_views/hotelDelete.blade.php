@extends('layouts.header')

@section('content')


<table border="1">
<tr><th colspan="2">宿詳細情報</th></tr>
<tr><th>宿名</th><td>a</td></tr>
<tr><th>住所</th><td>a</td></tr>
<tr><th>分類</th><td>a</td></tr>
<tr><th>チェックイン/アウト</th><td>00：00～00：01</td></tr>
<tr><th>金額/日</th><td>$$$$$円</td></tr>
<tr><th>部屋数</th><td>57部屋</td></tr>
</table>

<p>この宿情報を削除しますか</p>
<button onclick="location.href='/hotel_views/hotelManagement'">確定</button>
<button onclick="location.href='/hotel_views/show'">＜戻る</button>
@endsection