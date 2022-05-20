@extends('layouts.app')

@section('content')
<h2>予約が完了しました</h2>
<table border='1'>
    <tbody>
        <tr>
        <td>宿名</td>
        <td>宿1</td>
        </tr>
        <tr>
        <td>氏名</td>
        <td>新宿太郎</td>
        </tr>
        <tr>
        <td>部屋数</td>
        <td>2</td>
        </tr>
        <tr>
        <td>日程</td>
        <td>00/00/00～00/00/01</td>
        </tr>
        <tr>
        <td>金額</td>
        <td>$$$$$円</td>
        </tr>
    </tbody>
</table>
<button onclick="location.href='/user_home/index'">ホーム</button>
@endsection