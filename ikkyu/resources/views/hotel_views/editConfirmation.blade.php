@extends('layouts.header')

@section('content')
<h2>新規登録</h2>
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
        <td>宿分類</td>
        <td>リゾートホテル</td>
        </tr>
        <tr>
        <tr>
        <td>チェックイン/チェックアウト</td>
        <td>00：00/00：01</td>
        </tr>
        <tr>
        <td>金額/部屋</td>
        <td>$$$$$円/部屋</td>
        </tr>
        <tr>
        <td>部屋数</td>
        <td>57部屋</td>
        </tr>
    </tbody>
</table>
<p>この内容で登録しますか？</p>
<button onclick="location.href='/hotel_views/editCompletion'">確定</button>
<button onclick="location.href='/hotel_views/edit'">戻る</button>
@endsection