@extends('layouts.header')

@section('content')
<table border="1">
<tr><th colspan="2">会員情報</th></tr>
<tr><th>会員ID</th><td>0123456789</td></tr>
<tr><th>氏名</th><td>栗山浩一</td></tr>
<tr><th>住所</th><td>160-0022<br>東京都新宿区新宿3-1-13 京王新宿追分ビル4階</td></tr>
<tr><th>電話番号</th><td>0120-70-3727</td></tr>
<tr><th>メールアドレス</th><td>2022php42-teacher001@la-study.com</td></tr>
<tr><th>生年月日</th><td>2001-04-01</td></tr>
<tr><th>予約情報</th><td>[宿名]東横イン　[宿泊予定日]2022年5月20日</td></tr>
</table>
<button onclick="location.href='/home/index'">変更</button>
<button onclick="location.href='/admin/UserDelete'">退会</button>
<button onclick="location.href='/admin/Memindex'">＜戻る</button>

@endsection