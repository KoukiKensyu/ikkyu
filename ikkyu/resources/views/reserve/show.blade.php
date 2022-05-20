@extends('layouts.header')

@section('content')
<h2>宿詳細</h2>
<table border='1'>
    <tbody>
        <tr>
        <td>宿名</td>
        <td>宿1</td>
        </tr>
        <tr>
        <td>住所</td>
        <td>住所1</td>
        </tr>
        <tr>
        <td>チェックイン/チェックアウト</td>
        <td>00：00/00：01</td>
        </tr>
        <tr>
        <td>金額/部屋</td>
        <td>$$$$$円/部屋</td>
        </tr>
        <tr>
        <td>空き部屋</td>
        <td>00/000</td>
        </tr>
    </tbody>
</table>
<button onclick="location.href='store'">予約</button>
<button>戻る</button>
@endsection